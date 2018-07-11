<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyDataFromFile('pkgExtranet/address/address.dummy.php');

$oDummy->addDummyData('active', false);
$oDummy->addDummyData('sAddressId', 'test');

return $oDummy;
