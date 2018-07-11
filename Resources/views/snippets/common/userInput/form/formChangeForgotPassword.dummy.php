<?php

$aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/textBlock/textBlockSmallHeadline.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aTextData = array('sTitle' => 'Passwort ändern', 'sText' => 'Sie können jetzt ein neues Passwort anlegen');

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/userInput/form/text.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aTextFormData = $oDummyData->getDummyData();

$aData['aFieldLogin'] = array('foo@baa.de');
$aData['aFieldPassword'] = $aTextFormData;
$aData['aFieldPasswordCheck'] = $aTextFormData;
$aData['aTextData'] = $aTextData;
$aData['sSpotName'] = 'spota';

unset($aData['aTextData']['aLink']);

return $aData;
