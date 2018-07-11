<?php

use ChameleonSystem\CoreBundle\ServiceLocator;

$translator = ServiceLocator::get('translator');

$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddSourceObject('sTitle', $translator->trans('chameleon_system_chameleon_shop_theme.order_login.action_register'));
$oViewRenderer->AddSourceObject('sText', $translator->trans('chameleon_system_chameleon_shop_theme.order_login.new_customer_help'));
echo $oViewRenderer->Render('/common/textBlock/textBlockSmallHeadline.html.twig');

$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddMapper(new TPkgExtranetMapper_UserForm());
$oViewRenderer->AddMapper(new TPkgExtranetMapper_FormLoginAndPassword());
$oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRenderer->AddSourceObject('sCustomMSGConsumer', TdbDataExtranetUser::MSG_FORM_FIELD);
$oViewRenderer->AddSourceObject('sFieldNamesPrefix', 'aUser');
$oViewRenderer->AddSourceObject('sWizardModuleModuleSpot', $sModuleSpotName);
$oViewRenderer->AddSourceObject('oUser', TdbDataExtranetUser::GetInstance());
$sUserRegistrationForm = $oViewRenderer->Render('/common/userInput/form/formUserRegistration.html.twig');

$oFormRenderer = new ViewRenderer();
$oFormRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oFormRenderer->AddSourceObject('sName', 'register');
$oFormRenderer->AddSourceObject('sSpotName', $sModuleSpotName);
$oFormRenderer->AddSourceObject('sFunction', 'Register');
$oFormRenderer->AddSourceObject('sCustomFormHTML', $sUserRegistrationForm);
$oFormRenderer->AddSourceObject('sSubmitTitle', $translator->trans('chameleon_system_chameleon_shop_theme.order_login.action_register'));
echo $oFormRenderer->Render('/common/userInput/form/simpleFormWrapperHorizontal.html.twig');
