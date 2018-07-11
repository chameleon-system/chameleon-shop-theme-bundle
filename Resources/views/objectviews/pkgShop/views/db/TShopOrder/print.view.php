<div class="printOrder">
  <h2><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.order.headline')); ?></h2>

  <?php
    $oLocal = &TCMSLocal::GetActive();
    $oSal = &$oOrder->GetFieldAdrBillingSalutation();
    $sSal = 'Herr';
    if (!is_null($oSal)) {
        $sSal = $oSal->fieldName;
    }
  ?>

  <br />
  <strong><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.order.order_date')); ?>:</strong> <?=$oLocal->FormatDate($oOrder->fieldDatecreated, TCMSLocal::DATEFORMAT_SHOW_DATE); ?><br />
  <strong><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.order.customer_number')); ?>:</strong> <?=TGlobal::OutHTML($oOrder->fieldCustomerNumber); ?><br />
  <strong><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.order.order_number')); ?>:</strong> <?=TGlobal::OutHTML($oOrder->fieldOrdernumber); ?><br />

  <?php
    /*@var $oOrder TdbShopOrder*/
    /*@var $aCallTimeVars array*/
    echo $oOrder->Render('mailArticleList', 'Customer');
?>
  <div style="width:300px;float:left;"><?=$oOrder->Render('mailBillingAddress', 'Customer'); ?></div>
  <div style="width:300px;float:left;"><?=$oOrder->Render('mailShippingAddress', 'Customer'); ?></div>
  <div style="height:0px;font-size:0px;line-height:0px;clear:both;">&nbsp;</div>
<?php
    echo $oOrder->Render('mailPaymentInfo', 'Customer');

  ?>
  <div class="hideonPrint" style="padding-top:20px;">
    <br />
    <a href="#" onclick="window.print()"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.layout.footer_print_page')); ?></a>
  </div>
</div>