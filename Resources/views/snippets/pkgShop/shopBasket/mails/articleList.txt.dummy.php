<?php

$oDummy = new TPkgViewRendererSnippetDummyData();
$aData = array(
    'sCurrency' => '€',
    'sVatPercentage' => '19',
    'dSumProducts' => '20.315,90',
    'dSumShipping' => '20,95',
    'dSumVat' => '1.220,95',
    'sPriceTotal' => '20.336,85',
    'aArticleList' => array(
        array(
            'sImageId' => $oDummy->getDummyImage('one'),
            'iAmount' => '1',
            'sManufacturer' => 'Recolution',
            'sArticleName' => 'Zipper',
            'sArticleColor' => 'Graublau',
            'sArticleSize' => 'M',
            'sShippingInformation' => 'sofort lieferbar',
            'sPrice' => '20,95',
            'sPriceTotal' => '20,95',
            'sCurrency' => '€',
            'sArticleDetailURL' => '',
        ),
        array(
            'sImageId' => $oDummy->getDummyImage('two'),
            'iAmount' => '60',
            'sManufacturer' => 'Recolution',
            'sArticleName' => 'Zipper',
            'sArticleColor' => '',
            'sArticleSize' => '',
            'sShippingInformation' => 'sofort lieferbar',
            'sPrice' => '20,95',
            'sPriceTotal' => '20.294,95',
            'sCurrency' => '€',
            'sArticleDetailURL' => '',
        ),
    ),
);

$oData = new TPkgViewRendererSnippetDummyData();
$oData->addDummyDataArray($aData);

return $oData;
