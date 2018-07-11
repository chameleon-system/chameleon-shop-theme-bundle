<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyDataFromFile('/pkgShopArticleReview/withTotalVotes.dummy.php');
$oDummy->addDummyDataFromFile('/pkgShop/shopArticle/articleBundleProducts.dummy.php');
$oDummy->addDummyDataFromFile('/pkgShop/shopArticle/articleMarker.dummy.php');

$aAttributes = array(
    array('sName' => 'Material', 'sValue' => '100% Bio-Baumwolle'),
    array('sName' => 'Attribute 2', 'sValue' => 'noch mehr Beschreibung....'),
    array('sName' => 'Mehr Attribute', 'sValue' => 'und weiter gehts...'),
);

$oDummy->addDummyData('aAttributeList', $aAttributes);
$oDummy->addDummyData('sAdditionalDescription', '<div>sAdditionalDescription</div>');
$oDummy->addDummyData('sShortDescription', '<div>sShortDescription</div>');

return $oDummy;
