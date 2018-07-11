<?php

/** @var $oOrder TdbShopOrder */
/** @var $aCallTimeVars array */
$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddSourceObject('oObject', $oOrder);

$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop_currency.mapper.shop_currency_mapper');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.order.order_payment');

$oPayment = $oOrder->GetPaymentHandler();
$sPaymentHtml = $oPayment->Render('order-complete', 'Customer', array('oLastOrder' => $oOrder));
$oViewRenderer->AddSourceObject('sPaymentHtml', $sPaymentHtml);

echo $oViewRenderer->Render('/pkgShop/shopOrder/mails/paymentInfo.html.twig');
