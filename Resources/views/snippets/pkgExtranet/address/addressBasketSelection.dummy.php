<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aData = array(
    'aAddressList' => array(
        $oDummy->renderSnippet('pkgExtranet/address/addressBasketItem.html.twig'),
        $oDummy->renderSnippet('pkgExtranet/address/addressBasketItem.html.twig'),
        $oDummy->renderSnippet('pkgExtranet/address/addressBasketItem.html.twig'),
        $oDummy->renderSnippet('pkgExtranet/address/addressBasketItem.html.twig'),
    ),
);

$oDummy->addDummyDataArray($aData);

return $oDummy;
