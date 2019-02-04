<?php

use ChameleonSystem\CoreBundle\Service\ActivePageServiceInterface;
use ChameleonSystem\CoreBundle\ServiceLocator;
use ChameleonSystem\ExtranetBundle\Interfaces\ExtranetConfigurationInterface;

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

if (empty($sSuccessURL)) {
    /**
     * @var $activePageService ActivePageServiceInterface
     */
    $activePageService = ServiceLocator::get('chameleon_system_core.active_page_service');
    $sSuccessURL = $activePageService->getLinkToActivePageRelative();
}
$oViewRenderer->AddSourceObject('sLoginSuccessURL', $sSuccessURL);

/**
 * @var $extranetConfig ExtranetConfigurationInterface
 */
$extranetConfig = ServiceLocator::get('chameleon_system_extranet.extranet_config');
$loginUrl = $extranetConfig->getLink(ExtranetConfigurationInterface::PAGE_LOGIN);
if (null !== $loginUrl && '' !== $loginUrl) {
    $oViewRenderer->AddSourceObject('loginFormAction', $loginUrl);
}

?>

<div class="snippetFormLoginStandardContainer">
    <?=$oViewRenderer->Render('/common/userInput/form/formLoginStandard.html.twig'); ?>
</div>