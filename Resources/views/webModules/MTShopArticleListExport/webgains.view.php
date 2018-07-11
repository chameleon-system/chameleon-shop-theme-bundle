<?php
  header('Content-type: text/plain');
  $aFields = array(
    'Produktname',
    'Deeplink',
    'Produkt-Kategorie',
    'Produktbeschreibung',
    'Preis',
    'Aktionspreis',
    'Aktionspreis gueltig bis',
    'Bezahlmoeglichkeiten',
    'Produkt-Nummer',
    'Produktbild',
    'Verfuegbarkeit',
    'Lieferzeit',
    'Lieferkosten',
    'Versandlaender',
    'ISBN',
    'EAN',
    'Herstellernummer',
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

          $dPrice = $oArticle->dPrice;
          $dAktionspreis = 0;
          if ($oArticle->fieldPriceReference > 0) {
              $dAktionspreis = $oArticle->dPrice;
              $dPrice = $oArticle->fieldPriceReference;
          }

          $aRawData = array(
        'Produktname' => viewEscapeCSVField($sArticleName),
        'Deeplink' => viewEscapeCSVField($oArticle->GetDetailLink(true)),
        'Produkt-Kategorie' => viewEscapeCSVField($sCatPath),
        'Produktbeschreibung' => viewEscapeCSVField($sDescription),
        'Preis' => viewEscapeCSVField($dPrice),
        'Aktionspreis' => viewEscapeCSVField($dAktionspreis),
        'Aktionspreis gueltig bis' => '',
        //'Bezahlmoeglichkeiten' => '',
        'Produkt-Nummer' => viewEscapeCSVField($oArticle->fieldArticlenumber),
        'Produktbild' => '',
        'Verfuegbarkeit' => viewEscapeCSVField($sStockMessage),
        'Lieferzeit' => '',
        'Lieferkosten' => viewEscapeCSVField($dShipping),
        'Versandlaender' => '',
        'Hersteller' => viewEscapeCSVField($sManufacturer),
        'Farbe' => viewEscapeCSVField($sColor),
        'Größe' => viewEscapeCSVField($sSize),
      );

          $oSmallImage = $oArticle->GetImagePreviewObject('detailpagezoom');
          if ($oSmallImage) {
              $oSmallImageObject = $oSmallImage->GetImageThumbnailObject();
              if ($oSmallImageObject) {
                  $aRawData['Produktbild'] = viewEscapeCSVField($oSmallImageObject->GetFullURL());
              }
          }

          $aValues = array_values($aRawData);
          echo implode("\t", $aValues)."\n";
      }

//    echo implode("\t", array_values($aData))."\n";
  }
