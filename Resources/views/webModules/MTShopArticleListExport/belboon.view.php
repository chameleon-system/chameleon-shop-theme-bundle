<?php
  header('Content-type: text/plain');
  $aFields = array(
    'Merchant_ProductNumber', // Die Produkt-/Artikelnummer ist Ihr interner, eindeutiger Produktschlüssel
    'Product_Title',
    'Manufacturer',
    'Brand',
    'Price',
    'Price_old',
    'Currency',
    'DeepLink_URL',
    'Into_Basket_URL',
    'Image_Small_URL', // URL (absolut) zu einem kleinen Bild des Produkts (idealerweise max. 100x100 Pixel)
    'Image_Small_HEIGHT',
    'Image_Small_WIDTH',
    'Image_Large_URL', // URL (absolut) zu einem großen Bild des Produkts (idealerweise min. 250x250 Pixel, besser größer)
    'Image_Large_HEIGHT',
    'Image_Large_WIDTH',
    'Merchant_Product_Category',
    'Product_Description_Short',
    'Product_Description_Long',
    'Availability',
  );

  // ------------------------------------------------------------------------
  function viewEscapeCSVField($sValue)
  {
      // ------------------------------------------------------------------------
      $sValue = str_replace("\n", ' ', $sValue);
      $sValue = str_replace("\t", ' ', $sValue);
      $sValue = str_replace('"', '""', $sValue);
      $sValue = '"'.$sValue.'"';

      return $sValue;
  }
  // ------------------------------------------------------------------------

  $aTmpFields = array();
  foreach ($aFields as $sFieldName) {
      $aTmpFields[] = viewEscapeCSVField($sFieldName);
  }

  echo implode("\t", $aTmpFields)."\n";
  while ($oArticle = &$data['oArticleList']->Next()) { /*@var $oArticle TdbShopArticle */
      if (!$oArticle->HasVariants()) {
          $aRawData = $aFields;
          $sCatPath = '';
          $oPrimaryCategory = $oArticle->GetPrimaryCategory();
          if ($oPrimaryCategory) {
              $sCatPath = $oPrimaryCategory->GetCategoryPathAsString(' -> ');
          }

          $sManufacturer = '';
          $oManufacturer = $oArticle->GetFieldShopManufacturer();
          if ($oManufacturer) {
              $sManufacturer = $oManufacturer->GetName();
          }

          $sStockMessage = '';
          $oStockMessage = $oArticle->GetFieldShopStockMessage();
          if ($oStockMessage) {
              $sStockMessage = $oStockMessage->GetShopStockMessage();
          }

          // basket-rightbox = small
          // detailpagezoom

          //$oArticle->getp
          $sArticleName = $oArticle->GetNameSEO();
          if ($oArticle->IsVariant() && !empty($oArticle->fieldNameVariantInfo)) {
              $sArticleName .= ' - '.$oArticle->fieldNameVariantInfo;
          }

          $aRawData = array(
        'Merchant_ProductNumber' => viewEscapeCSVField($oArticle->fieldArticlenumber), // Die Produkt-/Artikelnummer ist Ihr interner, eindeutiger Produktschlüssel
        'Product_Title' => viewEscapeCSVField($sArticleName),
        'Manufacturer' => viewEscapeCSVField($sManufacturer),
        'Brand' => viewEscapeCSVField($sManufacturer),
        'Price' => viewEscapeCSVField($oArticle->dPrice),
        'Price_old' => viewEscapeCSVField($oArticle->fieldPriceReference),
        'Currency' => viewEscapeCSVField('EUR'),
        'DeepLink_URL' => viewEscapeCSVField($oArticle->GetDetailLink(true)),
        'Into_Basket_URL' => viewEscapeCSVField($oArticle->GetToBasketLinkForExternalCalls()),
        'Image_Small_URL' => '', // URL (absolut) zu einem kleinen Bild des Produkts (idealerweise max. 100x100 Pixel)
        'Image_Small_HEIGHT' => '',
        'Image_Small_WIDTH' => '',
        'Image_Large_URL' => '', // URL (absolut) zu einem großen Bild des Produkts (idealerweise min. 250x250 Pixel, besser größer)
        'Image_Large_HEIGHT' => '',
        'Image_Large_WIDTH' => '',
        'Merchant_Product_Category' => viewEscapeCSVField($sCatPath),
        'Product_Description_Short' => viewEscapeCSVField($oArticle->GetTextFieldPlain('description_short')),
        'Product_Description_Long' => viewEscapeCSVField($oArticle->GetTextFieldPlain('description')),
        'Availability' => viewEscapeCSVField($sStockMessage),
      );

          $oSmallImage = $oArticle->GetImagePreviewObject('basket-rightbox');
          if ($oSmallImage) {
              $oSmallImageObject = $oSmallImage->GetImageThumbnailObject();
              if ($oSmallImageObject) {
                  $aRawData['Image_Small_URL'] = viewEscapeCSVField($oSmallImageObject->GetFullURL());
                  $aRawData['Image_Small_WIDTH'] = viewEscapeCSVField($oSmallImageObject->aData['width']);
                  $aRawData['Image_Small_HEIGHT'] = viewEscapeCSVField($oSmallImageObject->aData['height']);
              }
          }

          $oZoomImage = $oArticle->GetImagePreviewObject('detailpagezoom');
          if ($oZoomImage) {
              $oZoomImageObject = $oZoomImage->GetImageThumbnailObject();
              if ($oZoomImageObject) {
                  $aRawData['Image_Large_URL'] = viewEscapeCSVField($oZoomImageObject->GetFullURL());
                  $aRawData['Image_Large_WIDTH'] = viewEscapeCSVField($oZoomImageObject->aData['width']);
                  $aRawData['Image_Large_HEIGHT'] = viewEscapeCSVField($oZoomImageObject->aData['height']);
              }
          }
          $aValues = array_values($aRawData);
          echo implode("\t", $aValues)."\n";
      }
  }
