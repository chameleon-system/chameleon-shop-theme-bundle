<?php
/** @var $oUserData TdbDataExtranetUser */
/** @var $oShippingAddress TdbDataExtranetUserAddress */
/** @var $oBillingAddress TdbDataExtranetUserAddress */
/** @var $bShipToBillingAddress bool */
?>

    <div class="col-xs-12 col-md-3">
        <?php
            $oViewRenderer = new ViewRenderer();
            $oViewRenderer->AddSourceObject('oShippingAddressList', $oUserData->GetFieldDataExtranetUserAddressList());
            $oViewRenderer->AddSourceObject('selectedAddressId', $oShippingAddress->id);
            $oViewRenderer->AddSourceObject('sAddressName', TdbDataExtranetUserAddress::FORM_DATA_NAME_SHIPPING);
            $oViewRenderer->generateSourceObjectForObjectList(
                'aAddressList', 'oShippingAddressList', 'oAddressObject', 'pkgExtranet/address/addressBasketItem.html.twig',
                array('TPkgExtranetMapper_Address', 'chameleon_system_shop.mapper.orderwizard.address_selection')
            );
            echo $oViewRenderer->Render('pkgExtranet/address/addressBasketSelection.html.twig');
        ?>
    </div>
    <div class="col-xs-12 col-md-9">
        <div class="shipping">
            <h3><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_shipping_address')); ?></h3>
            <div class="helptext"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_shipping_address_help')); ?></div>
            <?php
                $oViewRenderer = new ViewRenderer();
                $oViewRenderer->AddMapper(new TPkgExtranetMapper_AddressForm());
                $oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
                $oViewRenderer->AddSourceObject('sCustomMSGConsumer', TdbDataExtranetUserAddress::FORM_DATA_NAME_SHIPPING);
                $oViewRenderer->AddSourceObject('sFieldNamesPrefix', TdbDataExtranetUserAddress::FORM_DATA_NAME_SHIPPING);
                $oViewRenderer->AddSourceObject('sWizardModuleModuleSpot', '[{sModuleSpotName}]');
                $oViewRenderer->AddSourceObject('oAddressObject', $oShippingAddress);

                echo $oViewRenderer->Render('/common/userInput/address/shipping-packstation.html.twig');
            ?>
        </div>

        <?php

            include __DIR__.'/ChangeShipToBillingAddress.inc.php';

            if ('1' != $bShipToBillingAddress) {
                ?>
                <div class="billing">
                    <h3><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_billing_address')); ?></h3>
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
        ?>
    </div>
