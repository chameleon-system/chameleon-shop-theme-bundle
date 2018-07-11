<?php

/** @var $oOrder TdbShopOrder */
/** @var $aCallTimeVars array */
$oViewRenderer = new ViewRenderer();
$oViewRenderer->setShowHTMLHints(false);
$oViewRenderer->AddSourceObject('oObject', $oOrder);
$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.order.order_user_data');

echo $oViewRenderer->Render('/pkgShop/shopOrder/mails/billingAddress.txt.twig');
