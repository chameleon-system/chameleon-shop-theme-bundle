<?php

$oData = new TPkgViewRendererSnippetDummyData();

$oData->addDummyDataFromFile('/pkgShop/shopBasket/shopBasketCheckoutConfirmStep.dummy.php');

$aData = $oData->getDummyData();
foreach ($aData['aArticleList'] as $iIndex => $aArticleData) {
    $aArticleData['sImageURL'] = 'http://placehold.it/124x70';
    $aData['aArticleList'][$iIndex] = $aArticleData;
}

$oData->addDummyDataArray($aData);

return $oData;
