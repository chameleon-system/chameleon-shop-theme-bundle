<?php

/** @var $sModuleSpotName string */
$sText = (isset($bSendPasswordFormSubmitted) && true === $bSendPasswordFormSubmitted) ? ($oExtranetConfig->GetTextField('fpwd_end')) : ($oExtranetConfig->GetTextField('fpwd_intro'));

$sError = '';
if (isset($bError) && true === $bError) {
    $sError = (isset($sErrorMsg)) ? ($sErrorMsg) : (TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.error_send_password_unknown_mail')));
}

$sName = (isset($Name)) ? ($Name) : ('');

$oTextBlockRenderer = new ViewRenderer();
$oTextBlockRenderer->AddSourceObject('sTitle', $oExtranetConfig->fieldFpwdTitle);
$oTextBlockRenderer->AddSourceObject('sText', $sText);
$sTextBlock = $oTextBlockRenderer->Render('/common/textBlock/textBlockSmallHeadline.html.twig');

if (!isset($bSendPasswordFormSubmitted) || false === $bSendPasswordFormSubmitted) {
    $oForgotPasswordRenderer = new ViewRenderer();

    $extranetConfig = TdbDataExtranet::GetInstance();
    if (true === $extranetConfig->fieldLoginIsEmail) {
        $emailFieldName = 'name';
    } else {
        $emailFieldName = 'email';
    }
    $oForgotPasswordRenderer->AddSourceObject('sName', $emailFieldName);

    $translator = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator');
    $oForgotPasswordRenderer->AddSourceObject('sPlaceholder', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.form_email'));

    $oForgotPasswordRenderer->AddSourceObject('sName', 'name');
    $oForgotPasswordRenderer->AddSourceObject('sValue', $sName);
    $oForgotPasswordRenderer->AddSourceObject('sError', $sError);
    $sForgotPassword = $oForgotPasswordRenderer->Render('/common/userInput/form/text.html.twig');

    $oFormRenderer = new ViewRenderer();
    $oFormRenderer->AddSourceObject('sName', 'forgot-password');
    $oFormRenderer->AddSourceObject('sSpotName', $sModuleSpotName);
    $oFormRenderer->AddSourceObject('sFunction', 'SendPassword');
    $oFormRenderer->AddSourceObject('sCustomFormHTML', $sTextBlock.$sForgotPassword);
    $oFormRenderer->AddSourceObject('sSubmitTitle', $translator->trans('chameleon_system_chameleon_shop_theme.extranet.action_send_password'));

    $sHTML = $oFormRenderer->Render('/common/userInput/form/simpleFormWrapper.html.twig');
} else {
    $sHTML = $sTextBlock;
}
echo $sHTML;
