<?php
  /**
   * shows an article preview inc category.
   */
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/
  $oLocal = TCMSLocal::GetActive();
?>
<?=$oArticle->GetName(); ?> für <?=$oLocal->FormatNumber($oArticle->dPrice, 2); ?> EUR
Anzeigen: <?=$oArticle->GetDetailLink(true); ?>
Jetzt kaufen: <?=$oArticle->GetToBasketLinkForExternalCalls(); ?>
