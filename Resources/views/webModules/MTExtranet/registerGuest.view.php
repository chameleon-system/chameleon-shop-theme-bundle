<?php

$oTextBlock = TdbPkgCmsTextBlock::GetInstanceFromSystemName('register-after-shopping');
$oViewRender = new ViewRenderer();
$oViewRender->AddMapper(new TPkgExtranetRegistrationGuestMapper_Form());
$oViewRender->AddSourceObject('oThankYouOrderStep', TdbShopOrderStep::GetStep('thankyou'));
$oViewRender->AddSourceObject('oTextBlock', $oTextBlock);
echo  $oViewRender->Render('/common/userInput/form/formCreateAccountFromGuest.html.twig');
