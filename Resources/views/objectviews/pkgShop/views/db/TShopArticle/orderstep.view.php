<?php
/**
 * shows an article preview inc category.
 */
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/
?>
<div class="productCartMini"><?=$oArticle->RenderPreviewThumbnail('basket', 'simple'); ?></div>
  <?php if (!empty($sMessages)) {
    echo $sMessages;
} ?>
