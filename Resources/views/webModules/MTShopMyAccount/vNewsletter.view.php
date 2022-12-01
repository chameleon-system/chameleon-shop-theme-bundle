<?php

/** @var $oModuleConfig TdbDataExtranetModuleMyAccount */
/** @var $sNewsSignupLink string */
/** @var $sNewsSignoutLink string */
$oNewsletterUser = TdbPkgNewsletterUser::GetInstanceForActiveUser();
$oViewRender = new ViewRenderer();
$oViewRender->addMapperFromIdentifier('chameleon_system_shop.mapper.my_account.my_account_mapper_newsletter');
$oViewRender->AddSourceObject('oNewsletterUser', $oNewsletterUser);
$oViewRender->AddSourceObject('oMyAccountModuleConfig', $oModuleConfig);
if (is_null($oNewsletterUser) || !$oNewsletterUser->fieldOptin) {
    $oViewRender->AddSourceObject('sActionLink', $sNewsSignupLink);
} else {
    $oViewRender->AddSourceObject('sActionLink', $sNewsSignoutLink);
}
echo  $oViewRender->Render('/pkgNewsletter/newsletterMyAccount.html.twig');
