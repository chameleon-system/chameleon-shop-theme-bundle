<?php

/** @var $oShop TdbShop */
/** @var $oPaymentHandler TdbShopPaymentHandler */
/** @var $aCallTimeVars array */
$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddMapper(new TPkgShopPaymentHandlerMapper_IPaymentDebit());
$oViewRenderer->AddSourceObject('oPaymentHandler', $oPaymentHandler);
$oViewRenderer->AddSourceObject('sPaymentMethodId', (isset($aCallTimeVars['iPaymentMethodId'])) ? ($aCallTimeVars['iPaymentMethodId']) : (''));
echo $oViewRenderer->Render('/pkgShop/shippingAndPayment/handler/debit.html.twig');
