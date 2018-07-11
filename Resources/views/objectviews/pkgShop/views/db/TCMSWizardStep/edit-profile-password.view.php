<?php

$oExtranetConfig = &TdbDataExtranet::GetInstance();
$oViewRender = new ViewRenderer();
$oViewRender->AddMapper(new TCMSWizardStepMapper_UserProfilePassword());
$oViewRender->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRender->AddSourceObject('sSpotName', $oExtranetConfig->fieldExtranetSpotName);
$oViewRender->AddSourceObject('oObject', $oStep);
$oViewRender->AddSourceObject('sWizardModuleModuleSpot', MTCMSWizardCore::URL_PARAM_MODULE_SPOT);
$oViewRender->AddSourceObject('sCustomMSGConsumer', 'editProfilePassword');
echo  $oViewRender->Render('/common/userInput/form/formUserProfilePassword.html.twig');
