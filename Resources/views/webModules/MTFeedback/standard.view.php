<?php

use ChameleonSystem\CoreBundle\ServiceLocator;

$oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_core.mapper.feedback_standard_form');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_core.mapper.feedback_additional_fields');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRenderer->AddSourceObject('oFeedbackModuleConfiguration', $oTableRow);
$oViewRenderer->AddSourceObject('sSpotName', $sModuleSpotName);
$oViewRenderer->AddSourceObject('oFeedbackErrorList', $oError);
$oViewRenderer->AddSourceObject('aFieldInput', $aInput);
echo $oViewRenderer->Render('/common/userInput/form/formContact.html.twig');
