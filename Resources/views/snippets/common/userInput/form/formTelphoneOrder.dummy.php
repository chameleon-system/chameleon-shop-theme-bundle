<?php

$aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/textBlock/textBlockSmallHeadline.dummy.php');
$aData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/userInput/form/text.dummy.php');
$aTextFormData = $oDummyData->getDummyData();

$aData['aFieldFirstName'] = $aTextFormData;
$aData['aFieldLastName'] = $aTextFormData;
$aData['aFieldTel'] = $aTextFormData;
$aData['aFieldReason'] = $aTextFormData;
$aData['sFormName'] = 'writeReview_id';
$aData['sFormAction'] = '#';
$aData['sSpotName'] = 'spot';
$aData['sInfoText'] = 'Wir sind für sie da';

// Change var values
unset($aData['aLink']);
$aData['aFieldFirstName']['sLabelText'] = '';
$aData['aFieldFirstName']['sError'] = '';
$aData['aFieldFirstName']['sInputClass'] = 'col-xs-3';

$aData['aFieldLastName']['sLabelText'] = '';
$aData['aFieldLastName']['sError'] = '';
$aData['aFieldLastName']['sInputClass'] = 'col-xs-3';

$aData['aFieldTel']['sLabelText'] = '';
$aData['aFieldTel']['sError'] = '';
$aData['aFieldTel']['sInputClass'] = 'col-xs-3';

$aData['aFieldReason']['sLabelText'] = '';
$aData['aFieldReason']['sError'] = '';
$aData['aFieldReason']['sInputClass'] = 'col-xs-3';

$aData['aFieldReason']['sLabelText'] = '';
$aData['aFieldReason']['sError'] = '';
$aData['aFieldReason']['sInputClass'] = 'span3';

return $aData;
