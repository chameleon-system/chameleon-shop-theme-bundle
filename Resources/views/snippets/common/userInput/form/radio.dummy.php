<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyData('sName', 'spot[fieldname]');
$oDummy->addDummyData('sError', 'some error');
$oDummy->addDummyData('sInputClass', 'class');
$oDummy->addDummyData('sPlaceholder', 'Feldname');

$aRadioField = array();
$aRadioField['sLabelText'] = 'Feldbeschreibung';
$aRadioField['sValue'] = 'value';

$aRadioFieldList = array($aRadioField, $aRadioField, $aRadioField);
$oDummy->addDummyData('aRadioFieldList', $aRadioFieldList);

return $oDummy;
