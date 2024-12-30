<?php

/** @var $oUserData TdbDataExtranetUser */
/** @var $oShippingAddress TdbDataExtranetUserAddress */
/** @var $oBillingAddress TdbDataExtranetUserAddress */
/** @var $bShipToBillingAddress tinyint */

// allows the user to select if he wants to ship to the billing address

$oViewRenderer = new ViewRenderer();
$oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRenderer->AddSourceObject('isDhlPackstation', $oShippingAddress->fieldIsDhlPackstation);
$oViewRenderer->AddSourceObject('isShipToBillingAddress', '1' == $bShipToBillingAddress);
$oViewRenderer->AddSourceObject('useShippingAsBillingAddress', TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.user_use_shipping_as_billing_address')));
if ($bShipToBillingAddress) {
    $oViewRenderer->AddSourceObject('sChangeShippingButtonText', TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.user_use_shipping_not_as_billing_address')));
} else {
    $oViewRenderer->AddSourceObject('sChangeShippingButtonText', TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.user_use_shipping_as_billing_address')));
}
$oMessageManager = TCMSMessageManager::GetInstance();
$sMessage = $oMessageManager->RenderMessages(TdbDataExtranetUserAddress::FORM_DATA_NAME_BILLING);
$oViewRenderer->AddSourceObject('errorMessage', $sMessage);

echo $oViewRenderer->Render('/common/userInput/form/formShipToBillingAddress.html.twig');
