<?php

/** @var $sKey string */
/** @var $bPasswordChanged bool */
/** @var $oPasswordChangeUser TdbDataExtranetUser */
/** @var $bPasswordChangeKeyValid bool */
$oActivePage = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_core.active_page_service')->getActivePage();

$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddMapper(new TPkgExtranetMapper_ChangePassword());
$oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRenderer->AddSourceObject('sCustomMSGConsumer', TdbDataExtranetUser::MSG_FORM_FIELD);
$oViewRenderer->AddSourceObject('sTitle', \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.reset_password_header'));
$oViewRenderer->AddSourceObject('sText', \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.reset_password_help'));
$oViewRenderer->AddSourceObject('sSpotName', $data['sModuleSpotName']);
$oViewRenderer->AddSourceObject('sToken', $data['sKey']);
$oViewRenderer->AddSourceObject('bPasswordChanged', $bPasswordChanged);
$oViewRenderer->AddSourceObject('bPasswordChangeKeyValid', $bPasswordChangeKeyValid);
$oViewRenderer->AddSourceObject('oPasswordChangeUser', $oPasswordChangeUser);
$oViewRenderer->AddSourceObject('sTargetURL', $oActivePage->GetRealURLPlain());
echo $oViewRenderer->Render('common/userInput/form/formChangeForgotPassword.html.twig');
