<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyDataFromFile('/pkgShop/shopArticle/articlePrice.dummy.php');
$oDummy->addDummyDataFromFile('/pkgShop/shopArticle/articleInfoBlock.dummy.php');
$oDummy->addDummyDataFromFile('/common/userInput/buttonAddToBasket.dummy.php');
$oDummy->addDummyDataFromFile('/common/userInput/buttonAddToNoticeList.dummy.php');

// do not show rating... so remove
$oDummy->removeData('dRating');

return $oDummy;
