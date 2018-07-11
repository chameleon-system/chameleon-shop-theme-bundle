<?php

/** @var $oOrder TdbShopOrder */
/** @var $aCallTimeVars array */
/**
 * @var ViewRenderer $oViewRenderer
 */
$oViewRenderer = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->setShowHTMLHints(false);

$oViewRenderer->AddSourceObject('oObject', $oOrder);

$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop_currency.mapper.shop_currency_mapper');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.order.order_payment');

echo $oViewRenderer->Render('/pkgShop/shopOrder/mails/paymentInfo.txt.twig');
