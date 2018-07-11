<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyData('sName', 'spot[fieldname]');
$oDummy->addDummyData('sError', 'some error');
$oDummy->addDummyData('sInputClass', 'class');
$oDummy->addDummyData('sLabelText', 'Feldname');

$aRadioField = array();
$aRadioField['sPlaceholder'] = 'Feldtext';
$aRadioField['sValue'] = 'value';

$aRadioFieldList = array($aRadioField, $aRadioField, $aRadioField);
$oDummy->addDummyData('aOptionList', $aRadioFieldList);

return $oDummy;
