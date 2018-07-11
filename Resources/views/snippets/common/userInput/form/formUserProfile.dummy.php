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

$aData['aFieldBirthdate'] = $aTextFormData;
$aData['aTextData'] = $aTextData;

// Change var values

$aData['sText'] = 'Hier können Sie Ihre Profildaten ändern';
$aData['sTitle'] = 'Profil';
$aData['aFieldBirthdate']['sPlaceholder'] = 'Ihr Benutzername';
$aData['aFieldBirthdate']['sLabelText'] = '';
$aData['aFieldBirthdate']['sError'] = '';
$aData['aFieldBirthdate']['sInputClass'] = 'col-xs-2';

unset($aData['aTextData']['aLink']);

return $aData;
