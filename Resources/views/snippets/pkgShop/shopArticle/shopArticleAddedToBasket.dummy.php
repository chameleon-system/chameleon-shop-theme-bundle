<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aRaw = array();
$aIncludes = array('/pkgShop/shopArticle/articlePrice.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}

$oDummyData->addDummyData('sShippingTime', 'sofort lieferbar');
$oDummyData->addDummyData('sImageURL', 'http://placehold.it/70x74');
$oDummyData->addDummyData('iAmount', '2');
$oDummyData->addDummyData('sManufacturer', 'Recoltuion');
$oDummyData->addDummyData('sArticleName', 'Zipper');
$oDummyData->addDummyData('sArticleDetailURL', '#');

return $oDummyData;
