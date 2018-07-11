<?php

$aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/textBlock/textBlockSmallHeadline.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aTextData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/links/linkStylesIcon.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aLinkData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/userInput/form/text.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aTextFormData = $oDummyData->getDummyData();

$aData['aFieldUserName'] = $aTextFormData;
$aData['aFieldPassword'] = $aTextFormData;
$aData['aLinkForgotPassword'] = $aLinkData;
$aData['aLinkRegister'] = $aLinkData;
$aData['aTextData'] = $aTextData;

// Change var values

$aData['sText'] = 'Sie müssen sich anmleden um eine Bewertung zu schreiben';
$aData['sTitle'] = 'Anmeldung';
$aData['aFieldUserName']['sPlaceholder'] = 'Ihr Benutzername';
$aData['aFieldUserName']['sLabelText'] = '';
$aData['aFieldUserName']['sError'] = '';
$aData['aFieldUserName']['sInputClass'] = 'col-xs-2';
$aData['aFieldPassword']['sPlaceholder'] = 'Ihr Passwort';
$aData['aFieldPassword']['sLabelText'] = '';
$aData['aFieldPassword']['sError'] = '';
$aData['aFieldPassword']['sInputClass'] = 'col-xs-2';
unset($aData['aTextData']['aLink']);

return $aData;
