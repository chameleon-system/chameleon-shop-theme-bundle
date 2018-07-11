<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aBundle = array(
    array('sAmount' => '2', 'sTitle' => 'super produkt', 'sLink' => '#', 'sPrice' => '4,99', 'sCurrency' => '€'),
    array('sAmount' => '1', 'sTitle' => 'super produkt 2', 'sLink' => '#', 'sPrice' => '10,99', 'sCurrency' => '€'),
    array('sAmount' => '1.000', 'sTitle' => 'super produkt 3', 'sLink' => '#', 'sPrice' => '2,99', 'sCurrency' => '€'),
);
$oDummy->addDummyData('aBundleArticleList', $aBundle);

return $oDummy;
