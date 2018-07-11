<?php
/** @var $oShop TdbShop */
/** @var $oUser TdbDataExtranetUser */
/** @var $oExtranetConfig TdbDataExtranet */
/** @var $umode string - the user mode (register, guest...) */

/** @var $oStep TdbShopOrderStep */
/** @var $sSpotName string */
/** @var $aCallTimeVars array */

/** @var $oStepNext TdbShopOrderStep */
/** @var $oStepPrevious TdbShopOrderStep */
/** @var $sBackLink string */
$sDescription = $oStep->GetDescription();

//$sSpotName = $oStep->GetName();
$oMessageManager = TCMSMessageManager::GetInstance();
?>

    <h1><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_headline_shipping')); ?></h1>

        <script type="text/javascript">
            //<![CDATA[
            function SetSelectedAddress(sAddressId, sAddressName) {
                document.user.<?=MTShopOrderWizardCore::URL_PARAM_STEP_METHOD; ?>.value = 'ChangeSelectedAddress';
                document.user.elements['aUserAddressShipping[id]'].value = sAddressId;
                document.user.submit();
            }
            //]]>

        </script>
        <form name="user" method="post" accept-charset="UTF-8" action="<?=$oStep->GetStepURL(); ?>" class="form-horizontal">
            <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($sSpotName); ?>]" value="ExecuteStep"/>
            <input type="hidden" class="cmsaction" name="<?=MTShopOrderWizardCore::URL_PARAM_STEP_METHOD; ?>" value=""/>

            <?php
            if (!$oUser->IsLoggedIn()) {
                if ('register' == $umode) {
                    // register new user
                    require dirname(__FILE__).'/parts/register-user.inc.php';
                } else {
                    // order as guest
                    require dirname(__FILE__).'/parts/guest-user.inc.php';
                }
            } else {
                // edit existing data
                require dirname(__FILE__).'/parts/update-user.inc.php';
            }

            if ($oUser->IsLoggedIn()) {
                ?>
            <div class="row">
                <div class="col-xs-12 col-md-3">&nbsp;</div>
                <div class="col-xs-12 col-md-9">
            <?php
            } ?>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-lg-3">
                            <?php if (false === $oUser->IsLoggedIn()) {
                ?>
                                <a href="<?=$sBackLink; ?>" class="btn btn-default btn-lg btn-block"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_previous_step')); ?></a>
                            <?php
            } else {
                ?>
                                &nbsp;
                                    <?php
            } ?>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-lg-3 pull-right">
                            <button id="primarypaymentbutton" type="submit" class="btn btn-lg btn-success btn-block" ><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_next_step')); ?></button>
                        </div>
                    </div>
                    <?php if ($oUser->IsLoggedIn()) {
                ?>
                        </div>
                    </div>
                    <?php
            } ?>

        </form>


