<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyDataFromFileAs('aShippingAddress', '/pkgExtranet/address/address.dummy.php');
$oDummy->addDummyData('bShipToBillingAddress', false);

return $oDummy;
