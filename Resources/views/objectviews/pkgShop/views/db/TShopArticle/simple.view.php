<?php
  /**
   * shows an article preview inc category.
   */
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/
  $oParentArticle = $oArticle;
  $oPrimaryCategory = $oArticle->GetPrimaryCategory();
  if ($oParentArticle->IsVariant()) {
      $oParentArticle = $oArticle->GetFieldVariantParent();
  }
  $oLocal = TCMSLocal::GetActive();
  $oUser = TdbDataExtranetUser::GetInstance();
  $sBlockId = $oArticle->id;
  if ($oArticle->IsVariant()) {
      $sBlockId = $oArticle->fieldVariantParentId;
  }

  $oVariantList = $oArticle->GetVariantsForVariantTypeName('color');
  if (!is_null($oVariantList)) {
      $oPreviousVariant = null;
      $oNextVariant = null;
      // we need to fetch a link that shows us the next variant and the previous variant...
      if ((!$oArticle->IsVariant()) && ($oVariantList->Length() > 0)) {
          $oArticle = $oVariantList->Current();
          $oVariantList->GoToStart();
      }
      // find position in list
      if ($oVariantList->Length() > 1) {
          // if we have a filter, make sure we pick the right color
          $oActiveFilter = TdbPkgShopListfilter::GetActiveInstance();
          if ($oActiveFilter) {
              $aFilter = $oActiveFilter->GetFilterValuesForFilterType('color');
              if ($aFilter && is_array($aFilter)) {
                  $oColor = $oArticle->GetActiveVaraintValue('color');
                  if (!in_array($oColor->fieldName, $aFilter)) {
                      // no match... so find one
                      $oVariantList->GoToStart();
                      $bFound = false;
                      while (!$bFound && ($oCurrentVariant = $oVariantList->Next())) {
                          $oColor = $oCurrentVariant->GetActiveVaraintValue('color');
                          if (in_array($oColor->fieldName, $aFilter)) {
                              $bFound = true;
                              $oArticle = $oCurrentVariant;
                          }
                      }
                      $oVariantList->GoToStart();
                  }
              }
          }

          $bFound = false;
          while (!$bFound && ($oCurrentVariant = $oVariantList->Next())) {
              if ($oCurrentVariant->IsSameAs($oArticle)) {
                  $bFound = true;
                  $oNextVariant = $oVariantList->Next();
                  if (false === $oNextVariant) {
                      $oVariantList->GoToStart();
                      $oNextVariant = $oVariantList->Current();
                  }
              } else {
                  $oPreviousVariant = $oCurrentVariant;
              }
          }
          if ($bFound && is_null($oPreviousVariant)) {
              $oVariantList->GoToEnd();
              $oPreviousVariant = $oVariantList->Previous();
          }
      }
  }

  $oPreviewObject = $oArticle->GetImagePreviewObject($aCallTimeVars['imageSizeIdentifier']); /* @var $oPreviewObject TdbShopArticlePreviewImage */

  $sBlockCSSClass = '';
  if (array_key_exists('sBlockCSSClass', $aCallTimeVars)) {
      $sBlockCSSClass = $aCallTimeVars['sBlockCSSClass'];
  }

  $aTransferParametersForView = array();
  if (array_key_exists('imageSizeIdentifier', $aCallTimeVars)) {
      $aTransferParametersForView['imageSizeIdentifier'] = $aCallTimeVars['imageSizeIdentifier'];
  }
  if (array_key_exists('sBlockCSSClass', $aCallTimeVars)) {
      $aTransferParametersForView['sBlockCSSClass'] = $aCallTimeVars['sBlockCSSClass'];
  }

?>
<table>
    <tr>
        <td width="30%">text</td>
        <td width="10%">fsdfgkj ljglsdj glsdjgsdj g</td>
        <td width="60%">dadasdadas</td>
    </tr>
</table>
<div style="width: 100% ;">
    <div style="width: 500px;border: 1em solid red;">10</div>
    <div style="width: 900px;border: 1em solid red;">80</div>
    <div style="width: 1500px;border: 1em solid red;">10</div>
</div>
<hr>
<div style="width: 100% ;">
    <div style="width: 10em;border: 1em solid red;">10</div>
    <div style="width: 80em;border: 1em solid red;">80</div>
    <div style="width: 10em;border: 1em solid red;">10</div>
</div>
<hr>
<div style="width: 100%">
    <div style="width: 10%;border: 1px solid red;">10</div>
    <div style="width: 80%;border: 1px solid red;">80</div>
    <div style="width: 10%;border: 1px solid red;">10</div>
</div>