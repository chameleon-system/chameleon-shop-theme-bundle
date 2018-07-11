<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aData = array();

$oDummyData->addDummyDataFromFileAs('aArticle', '/pkgShop/shopArticle/shopArticleAddedToBasket.dummy.php');

$oDummyData->addDummyDataFromFile('/common/lists/listStandardShopArticle.dummy.php');

return $oDummyData;

$oDummyDataTmp = new TPkgViewRendererSnippetDummyData();
$oDummyDataTmp->addDummyDataFromFile('/common/lists/listStandardShopArticle.dummy.php');
$aArticleListData = $oDummyDataTmp->getDummyData();
unset($aArticleListData['aListPaging']);

$aData['aArticle'] = $aArticleData;

$aData['aArticleList'] = $aArticleListData;
$aData['sShopUrl'] = '#';
$aData['sBasketUrl'] = '#';

return $aData;
