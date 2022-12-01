<?php
  /**
   * shows an article preview inc category.
   */
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/
  $oStockMessage = $oArticle->GetFieldShopStockMessage();
  if (!is_null($oStockMessage)) {
      /*$oShopStockMessageTrigger =& $oStockMessage->GetFieldShopStockMessageTrigger(); /**@var $oShopStockMessageTrigger TdbShopStockMessageTrigger
      if (!is_null($oShopStockMessageTrigger)) echo $oShopStockMessageTrigger->fieldCssClass;
      else echo $oStockMessage->fieldName;*/ ?>
<div class="TShopArticle"><div class="shipping-time-info <?=$oStockMessage->fieldClass; ?>">
  <?=$oStockMessage->GetShopStockMessage(); ?>
</div></div>
<?php
  }
?>

