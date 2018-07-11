<?php

  /**
   * @var array $data
   */

  /**
   * @param string $sValue
   *
   * @return string
   */
  function viewEscapeCSVField($sValue)
  {
      $sValue = str_replace("\n", ' ', $sValue);
      $sValue = str_replace("\t", ' ', $sValue);
      $sValue = str_replace('"', '""', $sValue);
      $sValue = trim($sValue);

      return $sValue;
  }

  header('Content-type: text/plain');
  $aFields = array(
    'beschreibung',
    'id',
    'link',
    'preis',
    'titel',
    'zustand',
    'bild_url',
    'ean',
    'gewicht',
    'isbn',
    'marke',
    'mpn',
    'versand',
    'währung',
  );

  echo implode("\t", $aFields)."\n";
  /**
   * @var $oArticle TdbShopArticle
   */
  while ($oArticle = &$data['oArticleList']->Next()) {
      $sInfoText = $oArticle->GetTextFieldPlain('description_short');
      if (!empty($sInfoText)) {
          $sInfoText .= "\n";
      }
      $sInfoText .= $oArticle->GetTextFieldPlain('description');

      $sManufacturer = '';
      $oManufacturer = &$oArticle->GetFieldShopManufacturer();
      if (!is_null($oManufacturer)) {
          $sManufacturer = $oManufacturer->fieldName;
      }
      $oImages = &$oArticle->GetFieldShopArticleImageList();

      $aData = array();
      $aData['link'] = viewEscapeCSVField($oArticle->GetDetailLink(true));
      $aData['titel'] = viewEscapeCSVField($oArticle->GetName());
      $aData['beschreibung'] = viewEscapeCSVField($sInfoText);
      $aData['preis'] = viewEscapeCSVField($oArticle->dPrice);
      $aData['währung'] = viewEscapeCSVField('EUR');
      $aData['id'] = viewEscapeCSVField($oArticle->id);
      $aData['ean'] = viewEscapeCSVField($oArticle->fieldArticlenumber);
      $aData['isbn'] = viewEscapeCSVField($oArticle->fieldArticlenumber);
      $aData['marke'] = viewEscapeCSVField($sManufacturer);
      $newDate = mktime(0, 0, 0, date('n') + 1, date('j'), date('Y'));
      $aData['verfallsdatum'] = viewEscapeCSVField(date('Y-m-d', $newDate));
      $aData['verfallsdatum'] = viewEscapeCSVField('');
      $aData['gewicht'] = viewEscapeCSVField($oArticle->fieldSizeWeightFormated);
      $aData['mpn'] = viewEscapeCSVField('');
      $aData['versand'] = viewEscapeCSVField('');
      $aData['zustand'] = viewEscapeCSVField('Neu');

      $aImageUrls = array();
      $iMaxImageCount = 10;
      while ($iMaxImageCount > 0 && ($oImg = &$oImages->Next())) {
          --$iMaxImageCount;
          $oCMSImage = $oImg->GetImage(0, 'cms_media_id');
          $aImageUrls[] = $oCMSImage->GetFullURL();
      }
      $aData['bild_url'] = viewEscapeCSVField(implode(',', $aImageUrls));

      $newDate = mktime(0, 0, 0, date('n'), date('j') + 30, date('Y'));
      $sDate = date('Y-m-d', $newDate);
      $aData['verfallsdatum'] = viewEscapeCSVField($sDate);

      reset($aFields);
      $bIsFirst = true;
      foreach ($aFields as $sFieldName) {
          if (array_key_exists($sFieldName, $aData)) {
              if ($bIsFirst) {
                  $bIsFirst = false;
              } else {
                  echo "\t";
              }
              $aData[$sFieldName] = str_replace(array('"', "\t"), array("'", ' '), $aData[$sFieldName]);
              if (empty($aData[$sFieldName])) {
                  $aData[$sFieldName] = ' ';
              }
              echo $aData[$sFieldName];
          }
      }
      echo "\n";
  }
