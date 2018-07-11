<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();

$sCurrency = '€';

$aOrderList = array();
$aItem = array(
    'sOrderDate' => date('d.m.Y H:i:s'),
    'sOrdernumber' => '12345-1',
    'sSumGrandTotal' => '1.234,56',
    'sShippingAddress' => 'Mr. Dev, ESONO AG, Holbeinstraße 2, 79100 Freiburg',
    'sDetailLink' => '#',
    'bActive' => false,
);
$aOrderList[] = $aItem;

//get data for detail view
$oDummyData->addDummyDataFromFile('/pkgShop/shopOrder/detail.dummy.php');
$aItem = array(
    'sOrderDate' => date('d.m.Y H:i:s'),
    'sOrdernumber' => '12345-3',
    'sSumGrandTotal' => '1.234,56',
    'sShippingAddress' => 'Mr. Dev, ESONO AG, Holbeinstraße 2, 79100 Freiburg',
    'sDetailLink' => '#',
    'bActive' => true,
);
$aOrderList[] = $aItem;

$aItem = array(
    'sOrderDate' => date('d.m.Y H:i:s'),
    'sOrdernumber' => '12345-3',
    'sSumGrandTotal' => '1.234,56',
    'sShippingAddress' => 'Mr. Dev, ESONO AG, Holbeinstraße 2, 79100 Freiburg',
    'sDetailLink' => '#',
    'bActive' => false,
);
$aOrderList[] = $aItem;

$oDummyData->addDummyData('aOrderList', $aOrderList);
$oDummyData->addDummyData('sCurrency', $sCurrency);

return $oDummyData;
