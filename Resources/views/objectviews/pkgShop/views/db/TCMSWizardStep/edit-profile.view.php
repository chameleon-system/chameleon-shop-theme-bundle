<?php

$oExtranetConfig = TdbDataExtranet::GetInstance();
$oViewRender = new ViewRenderer();
$oViewRender->AddMapper(new TCMSWizardStepMapper_UserProfileEmail());
$oViewRender->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRender->AddSourceObject('sSpotName', $oExtranetConfig->fieldExtranetSpotName);
$oViewRender->AddSourceObject('oObject', $oStep);
$oViewRender->AddSourceObject('sWizardModuleModuleSpot', MTCMSWizardCore::URL_PARAM_MODULE_SPOT);
$oViewRender->AddSourceObject('sCustomMSGConsumer', 'editProfileEmail');
echo  $oViewRender->Render('/common/userInput/form/formUserProfileEmail.html.twig');
