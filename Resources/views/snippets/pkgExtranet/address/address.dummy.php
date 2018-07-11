<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyData('sSalutation', 'Herr');
$oDummy->addDummyData('sFirstName', 'Max');
$oDummy->addDummyData('sLastName', 'Musterman');
$oDummy->addDummyData('sAdditionalInfo', 'KA');
$oDummy->addDummyData('sAddressStreet', 'Strasse');
$oDummy->addDummyData('sAddressStreetNr', '2');
$oDummy->addDummyData('sAddressZip', '79100');
$oDummy->addDummyData('sAddressCity', 'Freiburg');
$oDummy->addDummyData('sAddressCountry', 'Deutschland');

return $oDummy;
