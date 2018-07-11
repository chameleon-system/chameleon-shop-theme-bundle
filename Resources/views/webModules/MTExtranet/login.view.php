<?php
/** @var $sModuleSpotName string */
use ChameleonSystem\CoreBundle\ServiceLocator;

$translator = ServiceLocator::get('translator');

$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddMapper(new TPkgExtranetMapper_Login());
$oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRenderer->AddSourceObject('sSpotName', $sModuleSpotName);
$oViewRenderer->AddSourceObject('sMessageConsumer', $sModuleSpotName.'-form');
$oViewRenderer->AddSourceObject('sTitle', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.action_login'));
$oViewRenderer->AddSourceObject('sText', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.login_help'));
$oViewRenderer->AddSourceObject('sRegisterLinkTitle', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.question_register'));
$oViewRenderer->AddSourceObject('sForgetPasswordLinkTitle', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.question_reset_password'));
?>

<div class="snippetFormLoginStandardContainer">
    <?=$oViewRenderer->Render('/common/userInput/form/formLoginStandard.html.twig'); ?>
</div>