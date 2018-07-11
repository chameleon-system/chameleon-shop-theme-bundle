<?php

$aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/textBlock/textBlockSmallHeadline.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aTextData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/userInput/form/text.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aTextFormData = $oDummyData->getDummyData();

$aData['aFieldEmail'] = $aTextFormData;
$aData['aFieldPassword'] = $aTextFormData;
$aData['aTextData'] = $aTextData;

unset($aData['aTextData']['aLink']);

return $aData;
