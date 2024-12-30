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
    <div class="col-xs-12 col-md-3">
        <div class="ConfirmStepInfoBlock">
            <div class="shippingConfirmStepInfoBlock ConfirmStepInfoBlockBox">
                <h3><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_shipment')); ?></h3>
                <div class="shippingtype innerBox">
                    <?php
                    $oShippingGroups = TdbShopShippingGroupList::GetAvailableShippingGroups();
                    ?>
                    <h4><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_shipment_type')); ?>
                        (<a href="<?=$sLinkShipping; ?>"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_edit')); ?></a>)
                    </h4>
                    <?php
                    $oShipping = $oBasket->GetActiveShippingGroup();
                    echo TGlobal::OutHTML($oShipping->fieldName);
                    ?>
                </div>
            </div>


        </div>
    </div>
    <div class="col-xs-12 col-md-9">
		<div class="row ConfirmStepInfoBlock">
			<div class="col-xs-12 col-md-6">
				<div class="shippingConfirmStepInfoBlock ConfirmStepInfoBlockBox" style="margin-bottom: 0px; float: none;">
					<div class="shippingadr innerBox">
						<h4><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.shipping_address')); ?>
							(<a href="<?=$sLinkShippingAddress; ?>"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_edit')); ?></a>)
						</h4>
					</div>
					</div>
			</div>

			<div class="col-xs-12 col-md-6">
				<div class="billingConfirmStepInfoBlock ConfirmStepInfoBlockBox" style="margin-bottom: 0px; float: none;">
					<div class="shippingtype innerBox">
						<h4><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_payment_type')); ?>
							(<a href="<?=$sLinkShipping; ?>"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_edit')); ?></a>)
						</h4>
					</div>
				</div>
			</div>
		</div>
        <?php
        $oViewRenderer = new ViewRenderer();
        $oViewRenderer->AddMapper(new TPkgShopCurrencyMapper());
        $oViewRenderer->AddMapper(new TPkgShopBasketMapper_BasketSummary());
        $oViewRenderer->AddMapper(new TPkgShopBasketMapper_BasketItems());
        $oViewRenderer->AddMapper(new TPkgShopMapper_SystemPageLinks());
        $oViewRenderer->AddSourceObject('oBasket', $oBasket);
        echo $oViewRenderer->Render('/pkgShop/shopBasket/shopBasketCheckoutConfirmStep.html.twig');
        ?>
        <div class="row">
            <form name="user" method="post" accept-charset="UTF-8" action="<?=$oStep->GetStepURL(); ?>">
                <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($sSpotName); ?>]" value="ExecuteStep"/>
                <input type="hidden" class="cmsaction" name="<?=MTShopOrderWizardCore::URL_PARAM_STEP_METHOD; ?>" value=""/>

                <div class="col-xs-12 col-md-6">
                    <?php if ($bShowNewsletterSignup) {
            ?>
                    <div class="newsletter">
                        <div class="form-group">
                            <label class="checkbox"><input type="checkbox" value="1" <?php if ($newsletter) {
                echo 'checked="checked"';
            } ?> name="aInput[newsletter]"/> <?=\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_newsletter'); ?>
                            </label>
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
                            <label class="checkbox"><input type="checkbox" value="true" name="aInput[agb]"/> <?=\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans($sText, array('%sAGB%' => $sAGBLink)); ?>
                            </label>
                        </div>
                        [{CMSMSG-<?=MTShopBasketCore::MSG_CONSUMER_NAME; ?>-agb}]
                        <?php
                            echo $oPaymentMethod->renderConfirmOrderBlock($oUser);
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <button id="primarypaymentbutton" class="btn btn-large btn-success btn-block" type="submit"><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_order')); ?></button>
                    <div class="cssFont5">
                        (<?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.checkout.confirm_info_mail')); ?>)
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

