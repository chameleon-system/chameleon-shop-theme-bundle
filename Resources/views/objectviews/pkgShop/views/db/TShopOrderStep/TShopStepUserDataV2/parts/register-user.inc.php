<?php
/** @var $oUserData TdbDataExtranetUser */
/** @var $oShippingAddress TdbDataExtranetUserAddress */
/** @var $oBillingAddress TdbDataExtranetUserAddress */
/** @var $bShipToBillingAddress tinyint */
?>
<div class="shipping">
    <h2 class="headline3"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_shipping_address')); ?></h2>
    <div class="helptext"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_shipping_address_help')); ?></div>
    <?php
        $oViewRenderer = new ViewRenderer();
        $oViewRenderer->AddMapper(new TPkgExtranetMapper_AddressForm());
        $oViewRenderer->AddMapper(new TPkgExtranetMapper_FormLoginAndPassword());
        $oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
        $oViewRenderer->AddSourceObject('sCustomMSGConsumer', TdbDataExtranetUserAddress::FORM_DATA_NAME_SHIPPING);
        $oViewRenderer->AddSourceObject('sFieldNamesPrefix', TdbDataExtranetUserAddress::FORM_DATA_NAME_SHIPPING);
        $oViewRenderer->AddSourceObject('sWizardModuleModuleSpot', '[{sModuleSpotName}]');
        $oViewRenderer->AddSourceObject('oAddressObject', $oShippingAddress);
        $oViewRenderer->AddSourceObject('oUser', $oUserData);
        echo $oViewRenderer->Render('/common/userInput/form/formUserRegistrationCheckout.html.twig');

    ?>
</div>

<?php

include dirname(__FILE__).'/ChangeShipToBillingAddress.inc.php';

if ('1' != $bShipToBillingAddress) {
    ?>
    <div class="billing">
        <h2 class="headline3"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_billing_address')); ?></h2>
        <div class="helptext"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_billing_address_help')); ?></div>
        <?php
            $oViewRenderer = new ViewRenderer();
    $oViewRenderer->AddMapper(new TPkgExtranetMapper_AddressForm());
    $oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
    $oViewRenderer->AddSourceObject('sCustomMSGConsumer', TdbDataExtranetUserAddress::FORM_DATA_NAME_BILLING);
    $oViewRenderer->AddSourceObject('sFieldNamesPrefix', TdbDataExtranetUserAddress::FORM_DATA_NAME_BILLING);
    $oViewRenderer->AddSourceObject('sWizardModuleModuleSpot', '[{sModuleSpotName}]');
    $oViewRenderer->AddSourceObject('oAddressObject', $oBillingAddress);
    echo $oViewRenderer->Render('/common/userInput/address/billing.html.twig'); ?>
    </div>
    <?php
}
