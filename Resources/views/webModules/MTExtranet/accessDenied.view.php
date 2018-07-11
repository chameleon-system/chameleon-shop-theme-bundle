<?php
/**
 * @var $sModuleSpotName string
 * @var $sSuccessUrl     string
 */
$translator = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator');

$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddMapper(new TPkgExtranetMapper_Login());
$oViewRenderer->addMapperFromIdentifier('chameleon_system_chameleon_shop_theme.mapper.form_style_defaults');
$oViewRenderer->AddSourceObject('sSpotName', $sModuleSpotName);
$oViewRenderer->AddSourceObject('sMessageConsumer', $sModuleSpotName.'-form');
$oViewRenderer->AddSourceObject('sTitle', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.action_login'));
$oViewRenderer->AddSourceObject('sText', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.login_help'));
$oViewRenderer->AddSourceObject('sRegisterLinkTitle', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.question_register'));
$oViewRenderer->AddSourceObject('sForgetPasswordLinkTitle', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.question_reset_password'));

if (empty($sSuccessURL)) {
    $activePageService = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_core.active_page_service');
    $sSuccessURL = $activePageService->getLinkToActivePageRelative();
}
$oViewRenderer->AddSourceObject('sLoginSuccessURL', $sSuccessURL);

?>

<div class="snippetFormLoginStandardContainer">
    <?=$oViewRenderer->Render('/common/userInput/form/formLoginStandard.html.twig'); ?>
</div>