<div class="row">
	<div class="amazonSelectAddress col-xs-12 col-md-6">
		<?php
        if (null === $amazonConfig) {
            echo 'error loading amazon widget';
        } else {
            $oViewRenderer = new ViewRenderer();
            $oViewRenderer->AddMapper(new \ChameleonSystem\AmazonPaymentBundle\mappers\AmazonWidgetMapper());
            $oViewRenderer->AddSourceObject('basket', $oBasket);
            $oViewRenderer->AddSourceObject('config', $amazonConfig);
            echo $oViewRenderer->Render('/pkgshoppaymentamazon/widgets/address.html.twig');
        }
        ?>
	</div>
	<div class="col-xs-12 col-md-6">
		<?php
        echo $oStep->fieldDescription;
        ?>
	</div>
	<div class="col-xs-12">
		<form name="address" method="post" accept-charset="UTF-8" action="<?=$oStep->GetStepURL(); ?>" class="form-horizontal">
			<input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($sSpotName); ?>]" value="ExecuteStep"/>

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <a href="<?=$sBackLink; ?>" class="btn btn-default btn-lg btn-block"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_previous_step')); ?></a>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3 pull-right">
                    <button id="primarypaymentbutton" disabled="disabled" type="submit" class="btn btn-large btn-success btn-block" ><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.checkout.user_next_step')); ?></button>
                </div>
            </div>
		</form>
	</div>
</div>
