<?php
/** @var $oShop TdbShop */
/** @var $oBasket TShopBasket */
/** @var $oUser TdbDataExtranetUser */
/** @var $oExtranetConfig TdbDataExtranet */

/** @var $oStep TdbShopOrderStep */
/** @var $sSpotName string */
/** @var $aCallTimeVars array */

/** @var $oStepNext TdbShopOrderStep */
/** @var $oStepPrevious TdbShopOrderStep */
/** @var $sBackLink string */
/** @var $sLinkUserData string */
/** @var $sLinkShippingAddress string */
/** @var $sLinkShipping string */
/** @var $newsletter boolean - set to true if the user checked the "signup to newsletter" option */
$oMessageManager = TCMSMessageManager::GetInstance();
$sDescription = $oStep->GetDescription();

?>

<h1><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_headline')); ?></h1>
<?php
if ($oMessageManager->ConsumerHasMessages(MTShopBasketCore::MSG_CONSUMER_NAME.'-agb')) {
    echo '<div class="cmsmessage messageerror mainmessage">'.TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_error')).'</div>';
}
?>
[{CMSMSG-<?= MTShopBasketCore::MSG_CONSUMER_NAME; ?>}]
<?php if (!empty($sDescription)) {
    ?>
<div class="description"><?=$sDescription; ?></div><?php
} ?>
<div class="row">
    <div class="col-xs-12 col-sm-3">
        <div class="ConfirmStepInfoBlock">
            <div class="shippingConfirmStepInfoBlock ConfirmStepInfoBlockBox">
                <h2 class="headline3"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_shipment')); ?></h2>

                <div class="shippingadr innerBox">
                    <h3 class="headline4"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.shipping_address')); ?>
                        (<a href="<?=$sLinkShippingAddress; ?>"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_edit')); ?></a>)
                    </h3>
                    <?php
                    $oShippingAddress = $oUser->GetShippingAddress();
                    $oViewRenderer = new ViewRenderer();
                    $oViewRenderer->AddMapper(new TPkgExtranetMapper_Address());
                    $oViewRenderer->AddSourceObject('oAddressObject', $oShippingAddress);
                    echo $oViewRenderer->Render('/pkgExtranet/address/address.html.twig');
                    ?>
                </div>
                <div class="shippingtype innerBox">
                    <?php
                    $oShippingGroups = TdbShopShippingGroupList::GetAvailableShippingGroups();
                    ?>
                    <h3 class="headline4"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_shipment_type')); ?>
                        (<a href="<?=$sLinkShipping; ?>"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_edit')); ?></a>)
                    </h3>
                    <?php
                    $oShipping = $oBasket->GetActiveShippingGroup();
                    echo TGlobal::OutHTML($oShipping->fieldName);
                    ?>
                </div>
            </div>

            <div class="billingConfirmStepInfoBlock ConfirmStepInfoBlockBox">
                <h2 class="headline3"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_payment')); ?></h2>

                <div class="shippingadr innerBox">
                    <h3 class="headline4"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.billing_address')); ?>
                        (<a href="<?=$sLinkShippingAddress; ?>"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_edit')); ?></a>)</h3>
                    <?php
                    $oBillingAddress = $oUser->GetBillingAddress();
                    $oViewRenderer = new ViewRenderer();
                    $oViewRenderer->AddMapper(new TPkgExtranetMapper_Address());
                    $oViewRenderer->AddSourceObject('oAddressObject', $oBillingAddress);
                    echo $oViewRenderer->Render('/pkgExtranet/address/address.html.twig');
                    ?>
                </div>


                <div class="shippingtype innerBox">
                    <h3 class="headline4"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_payment_type')); ?>
                        (<a href="<?=$sLinkShipping; ?>"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_edit')); ?></a>)
                    </h3>
                    <?php
                    $oPaymentMethod = $oBasket->GetActivePaymentMethod();
                    echo TGlobal::OutHTML($oPaymentMethod->fieldName);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-9">
        <?php
        $oViewRenderer = new ViewRenderer();
        $oViewRenderer->addMapperFromIdentifier('chameleon_system_shop_currency.mapper.shop_currency_mapper');
        $oViewRenderer->AddMapper(new TPkgShopBasketMapper_BasketSummary());
        $oViewRenderer->AddMapper(new TPkgShopBasketMapper_BasketItems());
        $oViewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.system_page_links');
        $oViewRenderer->AddSourceObject('oBasket', $oBasket);
        echo $oViewRenderer->Render('/pkgShop/shopBasket/shopBasketCheckoutConfirmStep.html.twig');
        ?>
        <div class="row">
            <form name="user" method="post" accept-charset="UTF-8" action="<?=$oStep->GetStepURL(); ?>">
                <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($sSpotName); ?>]" value="ExecuteStep"/>
                <input type="hidden" class="cmsaction" name="<?=MTShopOrderWizardCore::URL_PARAM_STEP_METHOD; ?>" value=""/>

                <div class="col-xs-12 col-sm-8">
                    <?php if ($bShowNewsletterSignup) {
            ?>
                    <div class="newsletter">
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" value="1" <?php if ($newsletter) {
                echo 'checked="checked"';
            } ?> name="aInput[newsletter]"/> <?=\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_newsletter'); ?>
                                </label>
                            </div>
                        </div>
                    </div>
                    <?php
        } ?>
                    <div class="agb confirmStepAgb">
                        <?php
                        $sAGBLink = $oShop->GetLinkToSystemPageAsPopUp(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_agb'), 'agb-popup', null, false, 750);
                        $sText = 'chameleon_system_chameleon_shop_theme.checkout.confirm_agb_block';
                        ?>
                        <div class="form-group">
                            <div class="checkbox">
                                <label><input type="checkbox" value="true" name="aInput[agb]"/> <?=\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans($sText, array('%sAGB%' => $sAGBLink)); ?>
                                </label>
                            </div>
                        </div>
                        [{CMSMSG-<?=MTShopBasketCore::MSG_CONSUMER_NAME; ?>-agb}]
                        <?php
                            echo $oPaymentMethod->renderConfirmOrderBlock($oUser);
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <button id="primarypaymentbutton" class="btn btn-lg btn-success btn-block" type="submit"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_order')); ?></button>
                    <div class="cssFont5">
                        (<?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_info_mail')); ?>)
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

