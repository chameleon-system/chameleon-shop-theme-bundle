<?php
  header('Content-type: text/plain');
  $aFields = array(
    'art_number',
    'art_name',
    'long_description',
    'image_url',
    'deep_link',
    'old_price',
    'price',
    'currency',
    'delivery_costs',
    'category',
    'brand',
    'gender_age',
    'color',
    'color',
    'clothing_size',
    'additional_image_url',
    'additional_image_url',
    'additional_image_url',
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

  $oLocal = &TCMSLocal::GetActive();

  echo implode("\t", $aTmpFields)."\n";
  $data['oArticleList']->GoToStart();
  while ($oArticle = &$data['oArticleList']->Next()) { /*@var $oArticle TdbShopArticle */
      if (!$oArticle->HasVariants()) {
          $aRawData = $aFields;
          $sCatPath = '';
          $oPrimaryCategory = $oArticle->GetPrimaryCategory();
          if ($oPrimaryCategory) {
              $sCatPath = $oPrimaryCategory->GetCategoryPathAsString('/');
              $oRootCat = $oPrimaryCategory->GetRootCategory();
              $sRootCatName = $oRootCat->GetName();
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

          $sDescription = $oArticle->GetTextFieldPlain('description_short');
          if (!empty($sDescription)) {
              $sDescription .= "\n";
          }
          $sDescription .= $oArticle->GetTextFieldPlain('description');

          $dShipping = 5;
          if ($oArticle->dPrice >= 100) {
              $dShipping = 0;
          }

          $sColor = '';
          $sSize = '';
          if ($oArticle->IsVariant()) {
              $oColor = $oArticle->GetActiveVaraintValue('color');
              if ($oColor) {
                  $sColor = $oColor->GetName();
              }

              $oSize = $oArticle->GetActiveVaraintValue('size');
              if ($oSize) {
                  $sSize = $oSize->GetName();
              }
          }

          $aRawData = array(
        'art_number' => viewEscapeCSVField($oArticle->fieldArticlenumber),
        'art_name' => viewEscapeCSVField($sArticleName),
        'long_description' => viewEscapeCSVField($sDescription),
        'image_url' => '',
        'deep_link' => viewEscapeCSVField($oArticle->GetDetailLink(true)),
        'old_price' => viewEscapeCSVField($oArticle->fieldPriceReference),
        'price' => viewEscapeCSVField($oLocal->FormatNumber($oArticle->dPrice, 2)),
        'currency' => viewEscapeCSVField('EUR'),
        'delivery_costs' => viewEscapeCSVField($oLocal->FormatNumber($dShipping, 2)),
        'category' => viewEscapeCSVField($sCatPath),
        'brand' => viewEscapeCSVField($sManufacturer),
        'gender_age' => viewEscapeCSVField($sRootCatName),
        'color' => viewEscapeCSVField($sColor),
        'clothing_size' => viewEscapeCSVField($sSize),
      );

          $oSmallImage = $oArticle->GetImagePreviewObject('detailpagezoom');
          if ($oSmallImage) {
              $oSmallImageObject = $oSmallImage->GetImageThumbnailObject();
              if ($oSmallImageObject) {
                  $aRawData['image_url'] = viewEscapeCSVField($oSmallImageObject->GetFullURL());
              }
          }

          $aValues = array_values($aRawData);
          echo implode("\t", $aValues)."\n";
      }
  }
