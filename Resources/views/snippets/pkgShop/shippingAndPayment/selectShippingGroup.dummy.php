<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aData = array(
    'sCurrency' => '€',
    'sFormControlParameter' => '<input type="hidden" name="" value="" />',
    'aShippingGroups' => array(
        array(
            'bIsActive' => true,
            'id' => '1',
            'sTitle' => 'Standard-Versand innerhalb von 2-5 Werktagen per DHL',
            'sCost' => '',
        ),
        array(
            'bIsActive' => false,
            'id' => '2',
            'sTitle' => 'Express-Versand innerhalb von 24h per DHL',
            'sCost' => '9,95',
        ),
    ),
);
$oDummy->addDummyDataArray($aData);

return $oDummy;
