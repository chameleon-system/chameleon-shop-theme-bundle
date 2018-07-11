<?php

/** @var $oOrder TdbShopOrder */
/** @var $aCallTimeVars array */
$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddSourceObject('oObject', $oOrder);

$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.order.order_user_data');

echo $oViewRenderer->Render('/pkgShop/shopOrder/mails/billingAddress.html.twig');
