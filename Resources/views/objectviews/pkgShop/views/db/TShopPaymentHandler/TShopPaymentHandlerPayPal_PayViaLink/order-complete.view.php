<?php

/** @var $oShop TdbShop */
/** @var $oPaymentHandler TShopPaymentHandlerPayPal_PayViaLink */
/** @var $aUserPaymentData array */
/** @var $aCallTimeVars array */
$oTextBlock = TdbPkgCmsTextBlock::GetInstanceFromSystemName('order-complete-paypal-text');
$oLastOrder = (array_key_exists('oLastOrder', $aCallTimeVars)) ? ($aCallTimeVars['oLastOrder']) : (null);
$oViewRender = new ViewRenderer();
$oViewRender->AddMapper(new TPkgShopPaymentHandlerMapper_PayPalViaLinkOrderCompleted());
$oViewRender->AddSourceObject('oOrder', $oLastOrder);
$oViewRender->AddSourceObject('oTextBlock', $oTextBlock);
$oViewRender->AddSourceObject('oPaymentHandler', $oPaymentHandler);
$oViewRender->AddSourceObject('sPaymentMethodId', '');
echo  $oViewRender->Render('/pkgShop/shippingAndPayment/paypalPostOrderPayPalLink.html.twig');
