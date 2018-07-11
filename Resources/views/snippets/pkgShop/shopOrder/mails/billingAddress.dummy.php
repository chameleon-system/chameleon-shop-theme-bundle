<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyDataFromFileAs('aBillingAddress', '/pkgExtranet/address/address.dummy.php');

return $oDummy;
