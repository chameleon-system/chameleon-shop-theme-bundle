<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/media/gallery/gallery.dummy.php',
                   '/pkgShop/shopArticle/articleInfoBlock.dummy.php',
                   '/common/userInput/buttonAddToNoticeList.dummy.php',
                   '/common/userInput/buttonAddToBasket.dummy.php',
                   '/pkgShop/shopArticle/articlePrice.dummy.php',
                   '/pkgShop/shopArticle/partials/articleStockMessage.dummy.php',
);
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}

return $oDummyData;
