<?php

$oViewRenderer = new ViewRenderer();
$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop_currency.mapper.shop_currency_mapper');
$oViewRenderer->AddMapper(new TPkgShopBasketMapper_BasketSummary());
$oViewRenderer->AddMapper(new TPkgShopBasketMapper_BasketItems());
$oViewRenderer->AddMapper(new TPkgShopBasketMapper_ToMiniBasket());

echo $oViewRenderer->Render('/pkgShop/shopBasket/shopBasketMiniBasketMobile.html.twig');
