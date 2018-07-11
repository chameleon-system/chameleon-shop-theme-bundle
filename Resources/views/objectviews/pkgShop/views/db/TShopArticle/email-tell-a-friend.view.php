<?php
/**
 * shows an article preview inc category.
 */
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/
?>
<div class="product">
  <h3><?=TGlobal::OutHTML($oArticle->GetName()); ?></h3>
  <?=$oArticle->RenderPreviewThumbnail('cover-list', 'simple'); ?>
  <a href="<?=$oArticle->GetToBasketLinkForExternalCalls(); ?>">in den Warenkorb</a><br />
</div>