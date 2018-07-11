<?php

$oDummy = new TPkgViewRendererSnippetDummyData();
$aData = array(
    'sBasketURL' => '',
    'sCheckoutURL' => '',
    'sShippingInfoURL' => '',
    'sSumProductsAfterDiscountsAndDiscountVouchers' => '143.234,95',
    'sCurrency' => '€',
    'aArticleList' => array(
        array(
            'sImageId' => $oDummy->getDummyImage('one'),
            'iAmount' => '7',
            'sManufacturer' => 'Recolution',
            'sArticleName' => 'Zipper',
            'sPrice' => '20,95',
            'sCurrency' => '€',
            'sArticleDetailURL' => '',
        ),
        array(
            'sImageId' => $oDummy->getDummyImage('two'),
            'iAmount' => '7',
            'sManufacturer' => 'Recolution',
            'sArticleName' => 'Zipper',
            'sPrice' => '320,95',
            'sCurrency' => '€',
            'sArticleDetailURL' => '',
        ),
        array(
            'sImageId' => $oDummy->getDummyImage('three'),
            'iAmount' => '7',
            'sManufacturer' => 'Recolution',
            'sArticleName' => 'Zipper with an even longer name which wraps arround...',
            'sPrice' => '23.320,95',
            'sCurrency' => '€',
            'sArticleDetailURL' => '',
        ),
    ),
);

return $aData;
