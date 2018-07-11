<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
/*
    see the following includes:
        - /pkgShopArticleReview/standard.html.twig
        - /pkgShop/shopArticle/articleColors.html.twig
        - /pkgShop/shopArticle/articleSize.html.twig
    sShippingTime
*/
$aRaw = array();
$aIncludes = array('/pkgShopArticleReview/withTotalVotes.dummy.php', '/pkgShop/shopArticle/articleColors.dummy.php', '/pkgShop/shopArticle/articleSize.dummy.php', '/pkgShop/shopArticle/partials/articleBulkOrderPrices.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$oDummyData->addDummyData('sShippingTime', 'sofort lieferbar');

return $oDummyData;
