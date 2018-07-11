<div class="TShopArticle"><div class="showcase">


<?php
  /**
   * shows an article preview inc category.
   */
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/
  $oLocal = &TCMSLocal::GetActive();
  $oPreviewObject = &$oArticle->GetImagePreviewObject('cover-large'); /* @var $oPreviewObject TdbShopArticlePreviewImage */
  $oPrimaryCategory = $oArticle->GetPrimaryCategory();
  $oManufacturer = $oArticle->GetFieldShopManufacturer();

  $aNameParts = array();
  if ($oManufacturer) {
      $aNameParts[] = $oManufacturer->fieldName;
  }
  $aNameParts[] = $oArticle->fieldName;
  if ($oPrimaryCategory) {
      $aNameParts[] = $oPrimaryCategory->GetProductNameExtensions();
  }
?>
  <h2 class="smallHeadline"><?=TGlobal::OutHTML(implode(' ', $aNameParts)); ?></h2>
  <div style="margin-top: 15px;" class="previewImage"><?=$oPreviewObject->Render('standard', 'Customer'); ?></div>
  <?php if (!empty($sMessages)) {
    echo $sMessages;
} ?>
</div></div>