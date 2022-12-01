<?php
  /*@var $oShopBundleArticle TdbShopBundleArticle*/
  /*@var $aCallTimeVars array*/

  $oArticle = $oShopBundleArticle->GetFieldBundleArticle();

?>
<div class="TShopBundleArticle"><div class="standard">
  <?=$oShopBundleArticle->fieldAmount; ?> x
  <?php
    if (!$oArticle->fieldVirtualArticle) {
        echo '<a href="'.$oArticle->GetDetailLink().'">'.$oArticle->GetName().'</a>';
    } else {
        echo $oArticle->GetName();
    }
  ?>
</div></div>
