<?php

/*@var $oStep TdbCmsWizardStep*/

$oShop = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_shop.shop_service')->getActiveShop();
$oUser = TdbDataExtranetUser::GetInstance();
$oBillingAddress = $oUser->GetBillingAddress();
$oUserAddresses = $oUser->GetUserAddresses();
$oViewRender = new ViewRenderer();
$oViewRender->AddMapper(new TPkgExtranetMapper_AddressForm());
$oViewRender->AddMapper(new TCMSWizardStepMapper_UserAddressType());
$oViewRender->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRender->AddSourceObject('bIsBillingAddress', true);
$oViewRender->AddSourceObject('oAddressObject', $oBillingAddress);
$oViewRender->AddSourceObject('oUserAddressList', $oUserAddresses);
$oViewRender->AddSourceObject('sFieldNamesPrefix', 'aUserAddressBilling');
$oViewRender->AddSourceObject('sCustomMSGConsumer', TdbDataExtranetUserAddress::FORM_DATA_NAME_BILLING);
$oViewRender->AddMapper(new TCMSWizardStepMapper_UserAddressForm());
$oViewRender->AddSourceObject('oObject', $oStep);
if ($oShop->fieldAllowMultipleBillingAddresses) {
    $oViewRender->AddSourceObject('bAddressTypeIsBilling', true);
    $oViewRender->AddSourceObject('sSpotName', $sSpotName);
    $oViewRender->generateSourceObjectForObjectList(
        'aAddressList', // target name
        'oUserAddressList', // from
        'oAddressObject', // as
        '/pkgExtranet/address/addressSelector.html.twig', // with this view
        array('TPkgExtranetMapper_Address', 'TPkgExtranetMapper_AddressSelector') // using the following mappers
    );
}
echo  $oViewRender->Render('/common/userInput/form/formUserAddressBillingWizardStep.html.twig');
