<?php

/** @var $oArticleList TdbShopArticleList */
/** @var $sViewIdentKey string */
$sWriteReviewHtml = '';
$sLoginHtml = '';
$oMsgManager = TCMSMessageManager::GetInstance();
$bFieldErrors = false;
$aFields = array('author_name', 'rating', 'title', 'comment');
foreach ($aFields as $sField) {
    if (!$bFieldErrors && $oMsgManager->ConsumerHasMessages(TdbShopArticleReview::MSG_CONSUMER_BASE_NAME.'-'.$sField)) {
        $bFieldErrors = true;
    }
}
$oGlobal = TGlobal::instance();
$translator = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator');
$bShowLoginBox = $oGlobal->GetUserData('LoginWriteReview');
$bShowWriteReviewBox = $oGlobal->GetUserData('WriteReview');
if (!$bAllowWriteReview) {
    $oExtranet = TdbDataExtranet::GetInstance();
    $activePageService = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_core.active_page_service');
    $oViewRender = new ViewRenderer();
    $oViewRender->AddMapper(new TPkgExtranetMapper_Login());
    $oViewRender->AddSourceObject('formDefaultLabelClass', 'col-xs-4 col-md-3');
    $oViewRender->AddSourceObject('formDefaultInputClass', 'col-xs-8 col-md-8');
    $oViewRender->AddSourceObject('formDefaultHelpClass', 'col-xs-offset-4 col-xs-8 col-md-offset-3 col-md-8');
    $oViewRender->AddSourceObject('formDefaultSubmitClass', 'col-xs-offset-4 col-xs-8 col-md-offset-3 col-md-8');
    $oViewRender->AddSourceObject('sSpotName', $oExtranet->fieldExtranetSpotName);
    $oViewRender->AddSourceObject('sMessageConsumer', $_moduleID.'_in_write_review');
    $oViewRender->AddSourceObject('sLoginSuccessURL', $activePageService->getLinkToActivePageRelative(array('WriteReview' => '1')).'#WriteReview');
    $oViewRender->AddSourceObject('sLoginFailureURL', $activePageService->getLinkToActivePageRelative(array('LoginWriteReview' => '1')).'#WriteReview');
    $oViewRender->AddSourceObject('sTitle', $translator->trans('chameleon_system_chameleon_shop_theme.review.action_login'));
    $oViewRender->AddSourceObject('sText', $translator->trans('chameleon_system_chameleon_shop_theme.review.login_required'));
    $oViewRender->AddSourceObject('sRegisterLinkTitle', $translator->trans('chameleon_system_chameleon_shop_theme.review.action_register'));
    $oViewRender->AddSourceObject('sForgetPasswordLinkTitle', $translator->trans('chameleon_system_chameleon_shop_theme.review.forgot_password'));
    $sLoginHtml = $oViewRender->Render('/common/userInput/form/formLoginStandard.html.twig');
} else {
    $oUser = TdbDataExtranetUser::GetNewInstance();
    $oViewRender = new ViewRenderer();
    $oViewRender->AddMapper(new TPkgShopArticleReviewMapper_Write());
    $oViewRender->AddSourceObject('formDefaultLabelClass', 'col-xs-4 col-md-3');
    $oViewRender->AddSourceObject('formDefaultInputClass', 'col-xs-8 col-md-8');
    $oViewRender->AddSourceObject('formDefaultHelpClass', 'col-xs-offset-4 col-xs-8 col-md-offset-3 col-md-8');
    $oViewRender->AddSourceObject('formDefaultSubmitClass', 'col-xs-offset-4 col-xs-8 col-md-offset-3 col-md-8');
    $oViewRender->AddSourceObject('sSpotName', $_moduleID);
    $oViewRender->AddSourceObject('oUser', $oUser);
    $oViewRender->AddSourceObject('aUserReviewData', $aUserData);
    $sWriteReviewHtml = $oViewRender->Render('/common/userInput/form/formWriteReviewStandard.html.twig');
}

$oViewRender = new ViewRenderer();
$oViewRender->AddMapper(new TPkgShopArticleReviewMapper_Module());
$oViewRender->AddMapper(new TPkgShopMapper_ArticleRatingOverview());
$oViewRender->AddSourceObject('oReviewList', $oReviewList);
$oViewRender->AddSourceObject('sShowAllReviews', $translator->trans('chameleon_system_chameleon_shop_theme.review.action_show_all'));
$oViewRender->AddSourceObject('bAllowWriteReview', $bAllowWriteReview);
$oViewRender->AddSourceObject('oObject', $oActiveArticle);
$oViewRender->AddSourceObject('oReviewModuleConfiguration', $oModuleConfiguration);
$oViewRender->AddSourceObject('sLoginHtml', $sLoginHtml);
$oViewRender->AddSourceObject('sWriteReviewHtml', $sWriteReviewHtml);
$oViewRender->AddSourceObject('bFieldErrors', $bFieldErrors);
if ('1' != $bShowLoginBox) {
    $oViewRender->AddSourceObject('sLoginHideOnJS', 'hideOnJS');
}
if ('1' != $bShowWriteReviewBox) {
    $oViewRender->AddSourceObject('sWriteReviewHideOnJS', 'hideOnJS');
}
$oViewRender->generateSourceObjectForObjectList(
    'aRatingItemList', // target name
    'oReviewList', // from
    'oArticleReview', // as
    '/pkgShopArticleReview/ratingItem.html.twig', // with this view
    array('TPkgShopMapper_ArticleRatingReview') // using the following mappers
);
echo $oViewRender->Render('/common/lists/listStandardArticleReview.html.twig');
