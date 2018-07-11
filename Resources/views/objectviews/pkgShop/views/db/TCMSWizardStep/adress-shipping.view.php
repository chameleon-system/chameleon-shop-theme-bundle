<?php

/*@var $oStep TdbCmsWizardStep*/

$oShop = TdbShop::GetInstance();
$oUser = TdbDataExtranetUser::GetInstance();
$oShippingAddress = $oUser->GetShippingAddress();
$oBillingAddress = $oUser->GetBillingAddress();
$oUserAddresses = $oUser->GetUserAddresses();
$oViewRender = new ViewRenderer();
$oViewRender->AddMapper(new TPkgExtranetMapper_AddressForm());
$oViewRender->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRender->AddSourceObject('oAddressObject', $oShippingAddress);
$oViewRender->AddSourceObject('oUserAddressList', $oUserAddresses);
$oViewRender->AddSourceObject('sFieldNamesPrefix', 'aUserAddressShipping');
$oViewRender->AddSourceObject('sCustomMSGConsumer', TdbDataExtranetUserAddress::FORM_DATA_NAME_SHIPPING);
$oViewRender->AddMapper(new TCMSWizardStepMapper_UserAddressForm());
$oViewRender->AddSourceObject('oObject', $oStep);
$oViewRender->AddMapper(new TCMSWizardStepMapper_UserAddressType());
$bAddressIsAlsoBillingAddress = ($oShippingAddress->id == $oBillingAddress->id) ? true : false;
$oViewRender->AddSourceObject('bIsBillingAddress', $bAddressIsAlsoBillingAddress);
if ($oShop->fieldAllowMultipleShippingAddresses) {
    $oViewRender->AddSourceObject('bAddressTypeIsBilling', false);
    $oViewRender->AddSourceObject('sSpotName', $sSpotName);
    $oViewRender->generateSourceObjectForObjectList(
        'aAddressList', // target name
        'oUserAddressList', // from
        'oAddressObject', // as
        '/pkgExtranet/address/addressSelector.html.twig', // with this view
        array('TPkgExtranetMapper_Address', 'TPkgExtranetMapper_AddressSelector') // using the following mappers
    );
}
echo  $oViewRender->Render('/common/userInput/form/formUserAddressShippingWizardStep.html.twig');
