<?php

$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddMapper(new TPkgShopBasketMapper_BasketItems());
$oViewRenderer->AddSourceObject('generateAbsoluteProductUrls', true);
echo $oViewRenderer->Render('/pkgShop/shopBasket/shopBasketOrderViaPhone.html.twig');
