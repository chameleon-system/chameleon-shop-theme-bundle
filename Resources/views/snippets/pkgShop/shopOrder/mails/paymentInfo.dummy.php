<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aData = array(
    'sPaymentMethodName' => 'Bankeinzug',
    'aPaymentInformation' => array(
        array(
            'sName' => 'Konto Inhaber',
            'sValue' => 'Max Mustermann',
        ),
        array(
            'sName' => 'Kontonummer',
            'sValue' => '0123456789',
        ),
        array(
            'sName' => 'Bankleitzahl',
            'sValue' => '11155599',
        ),
    ),
);

$oDummy->addDummyDataArray($aData);

return $oDummy;
