<?php
  /*@var $oShop TdbShop */
  /*@var $oLastOrder TdbShopOrder */
  /*@var $oUser TdbDataExtranetUser */
  /*@var $oExtranetConfig TdbDataExtranet */

  /*@var $oStep TdbShopOrderStep */
  /*@var $sSpotName string */
  /*@var $aCallTimeVars array */

  /*@var $oStepNext TdbShopOrderStep */
  /*@var $oStepPrevious TdbShopOrderStep */
  /*@var $sBackLink string */

if ($oLastOrder) {
    $oPayment = $oLastOrder->GetPaymentHandler();
    $sPaymentHtml = $oPayment->Render('order-complete', 'Customer', array('oLastOrder' => $oLastOrder));
} else {
    $sPaymentHtml = '';
}
$oTextBlock = TdbPkgCmsTextBlock::GetInstanceFromSystemName('register-after-shopping');

/**
 * @var ViewRenderer $oViewRender
 */
$oViewRender = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRender->addMapperFromIdentifier('chameleon_system_shop.mapper.orderwizard.order_completed');
$oViewRender->AddMapper(new TPkgExtranetRegistrationGuestMapper_Form());
$oViewRender->AddSourceObject('oThankYouOrderStep', $oStep);
$oViewRender->AddSourceObject('oTextBlock', $oTextBlock);
$oViewRender->AddSourceObject('oOrder', $oLastOrder);
$oViewRender->AddSourceObject('sPaymentHtml', $sPaymentHtml);
echo  $oViewRender->Render('/pkgShop/shopBasket/shopBasketCheckoutOrderCompletedStep.html.twig');
