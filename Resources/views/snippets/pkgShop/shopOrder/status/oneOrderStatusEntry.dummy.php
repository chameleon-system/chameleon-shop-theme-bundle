<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aStatusList = array(
    'date' => '4.4.2013 16:32',
    'codeName' => 'Bezahlt',
    'info' => 'info text',
    'aPositions' => array(
        array(
            'iAmount' => 2,
            'iUsedAmount' => 1,
            'sManufacturer' => 'Hersteller',
            'sArticleName' => 'mein produkt',
            'sArticleVariantName' => 'Größe 36',
            'sPrice' => '2,15',
            'sPriceTotal' => '4,30',
            'sUsedPriceTotal' => '2,15',
            'sImageId' => $oDummy->getDummyImage('one'),
            'sArticleDetailURL' => 'url',
        ),
        array(
            'iAmount' => 2,
            'iUsedAmount' => 1,
            'sManufacturer' => 'Hersteller',
            'sArticleName' => 'mein produkt',
            'sArticleVariantName' => 'Größe 36',
            'sPrice' => '2,15',
            'sPriceTotal' => '4,30',
            'sUsedPriceTotal' => '2,15',
            'sImageId' => $oDummy->getDummyImage('one'),
            'sArticleDetailURL' => 'url',
        ),
    ),
);

$oDummy->addDummyDataArray($aStatusList);

return $oDummy;
