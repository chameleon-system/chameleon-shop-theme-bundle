<?php

$oDummy = new TPkgViewRendererSnippetDummyData();
$aStatusList = array(
    array(
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
    ),
    array(
        'date' => '5.4.2013 11:55',
        'codeName' => 'Versendet',
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
    ),
);

$oDummy->addDummyData('aStatusList', $aStatusList);

return $oDummy;
