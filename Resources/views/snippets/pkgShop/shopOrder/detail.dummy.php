<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();

$oDummyData->addDummyDataFromFileAs('aBillingAddress', '/pkgExtranet/address/address.dummy.php');
$oDummyData->addDummyDataFromFileAs('aShippingAddress', '/pkgExtranet/address/address.dummy.php');

$aItem = array(
    'sCurrency' => '€',
    'sOrderDate' => date('d.m.Y H:i:s'),
    'sOrdernumber' => '12345-2',
    'sSumGrandTotal' => '1.234,56',
    'sSumShipping' => '18,00',
    'sSumVat' => '10,34',
    'sVatPercentage' => '19',
    'sSumProducts' => '499,95',
    'sPaymentName' => 'Rechnung',
    'aArticleList' => array(
        array(
            'sImageId' => $oDummyData->getDummyImage('one'),
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
            'sImageId' => $oDummyData->getDummyImage('two'),
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

$oDummyData->addDummyDataArray($aItem);

return $oDummyData;
