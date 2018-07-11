<?php

$aTemplateDummyData = array();

$aSteps = array();

$oStep = new stdClass();
$oStep->sTitle = 'Warenkorb';
$oStep->sSeoTitle = '';
$oStep->bIsActive = true;
$oStep->sIconClass = '';
$oStep->sIconUrl = '/bundles/chameleonsystemchameleonshoptheme/images/sprite/navigationStepBasketCartActive.png';
$oStep->sLink = 'http://www.esono.de';
$aSteps[] = $oStep;

$oStep = new stdClass();
$oStep->sTitle = 'Anmeldung';
$oStep->sSeoTitle = 'SEO Anmeldung';
$oStep->bIsActive = false;
$oStep->sIconClass = '';
$oStep->sIconUrl = '/bundles/chameleonsystemchameleonshoptheme/images/sprite/navigationStepBasketLogin.png';
$oStep->sLink = 'http://www.esono.de';
$aSteps[] = $oStep;

$oStep = new stdClass();
$oStep->sTitle = 'Lieferung';
$oStep->sSeoTitle = 'SEO Lieferung';
$oStep->bIsActive = false;
$oStep->sIconClass = 'i i-navigationStepBasketShipping';
$oStep->sIconUrl = '';
$oStep->sLink = 'http://www.esono.de';
$aSteps[] = $oStep;

$oStep = new stdClass();
$oStep->sTitle = 'Bezahlung';
$oStep->sSeoTitle = 'SEO Bezahlung';
$oStep->bIsActive = false;
$oStep->sIconClass = 'i i-navigationStepBasketPayment';
$oStep->sIconUrl = '';
$oStep->sLink = 'http://www.esono.de';
$aSteps[] = $oStep;

$oStep = new stdClass();
$oStep->sTitle = 'Bestätigung';
$oStep->sSeoTitle = 'SEO Bestätigung';
$oStep->bIsActive = false;
$oStep->sIconClass = 'i i-navigationStepBasketConfirm';
$oStep->sIconUrl = '';
$oStep->sLink = 'http://www.esono.de';
$aSteps[] = $oStep;

$aTemplateDummyData['aSteps'] = $aSteps;

return $aTemplateDummyData;
