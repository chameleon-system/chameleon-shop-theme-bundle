<?php

/** @var $oShop TdbShop */
use ChameleonSystem\CoreBundle\ServiceLocator;

/** @var $oStep TdbShopOrderStep */

/** @var $sSpotName string */
/** @var $oBasket TShopBasket */
/** @var $aCallTimeVars array */

/** @var $oStepNext TdbShopOrderStep */
/** @var $oStepPrevious TdbShopOrderStep */
/** @var $sBackLink string */

/**
 * iNumberOfProducts
 * sCurrency
 * sSumProductsAfterDiscountsAndDiscountVouchers
 * sBasketURL
 * sCheckoutURL
 * sShippingInfoURL
 * sPriceTotal
 * sCurrencyName
 * aArticleList
 * aArticle
 * sImageURL
 * iAmount
 * sManufacturer
 * sArticleName
 * sPrice
 ** sCurrency
 * sArticleDetailURL.
 */
$oActivePage = ServiceLocator::get('chameleon_system_core.active_page_service')->getActivePage();
$translator = ServiceLocator::get('translator');
$viewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');

$viewRenderer->addMapperFromIdentifier('chameleon_system_shop_currency.mapper.shop_currency_mapper');
$viewRenderer->AddSourceObject('oBasket', $oBasket);
$viewRenderer->AddSourceObject('sBackLink', $sBackLink);
$viewRenderer->AddSourceObject('sSpotName', $sSpotName);
$viewRenderer->AddSourceObject('sTitle', $translator->trans('chameleon_system_chameleon_shop_theme.order_login.telefon_order_headline'));
$viewRenderer->AddSourceObject('sText', $translator->trans('chameleon_system_chameleon_shop_theme.order_login.telefon_order_help'));
$viewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.orderwizard.order_step');
$viewRenderer->AddMapper(new ShopBasketMapper_Url());
$viewRenderer->AddMapper(new TPkgShopBasketMapper_BasketSummary());
$viewRenderer->AddMapper(new TPkgShopBasketMapper_BasketItems());
$viewRenderer->AddMapper(new TPkgShopBasketMapper_VoucherInput());
$viewRenderer->AddMapper(new TPkgShopPaymentHandlerMapper_PayPalExpressBasket());
$viewRenderer->AddMapper(new TPkgShopBasketMapper_TelephoneOrder());
$viewRenderer->AddMapper(new TPkgShopBasketMapper_TelephoneOrderForm());

echo $viewRenderer->Render('/pkgShop/shopBasket/shopBasketCheckoutBasketStep.html.twig');
