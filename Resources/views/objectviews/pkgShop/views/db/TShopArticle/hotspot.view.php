<?php
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/

  $oLocal = TCMSLocal::GetActive();
  $oManufacturer = $oArticle->GetFieldShopManufacturer();
?>
<div class="TShopArticle"><div class="hotspot">
  <h2><span class="manufacturer"><?=TGlobal::OutHTML($oManufacturer->fieldName); ?></span><br />
  <a class="productName" href="<?=$oArticle->GetDetailLink(); ?>">"<?=TGlobal::OutHTML($oArticle->GetName()); ?>"</a></h2>
  <span class="price"><?=$oLocal->FormatNumber($oArticle->dPrice, 2); ?> &euro;</span><br />
  <br />
  <a href="<?=$oArticle->GetDetailLink(); ?>" class="detailLink" title="<?=TGlobal::OutHTML($oArticle->GetName()); ?>">mehr Infos</a>
</div></div>