<?php
/** @var $oActiveOrderStep TdbShopOrderStep */
/** @var $sModuleSpotName string */
$viewRenderer = new ViewRenderer();
$viewRenderer->AddMapper(new TCMSWizardStepListMapper_Basket());
$viewRenderer->AddSourceObject('oStepList', $oSteps);
$viewRenderer->AddSourceObject('oActiveStep', $oActiveOrderStep);
echo $viewRenderer->Render('/common/navigation/navigationStep.html.twig');

?>
[{CMSMSG-<?=$sModuleSpotName; ?>}]
[{CMSMSG-<?=TShopStepShipping::MSG_PAYMENT_METHOD; ?>}]
<?php
echo $oActiveOrderStep->Render($data['sModuleSpotName'], array('sBasketRequestURL' => $data['sBasketRequestURL'], 'oSteps' => $oSteps));
