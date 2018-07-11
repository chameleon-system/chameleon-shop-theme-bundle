<?php

$aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/textBlock/textBlockSmallHeadline.dummy.php');
$aTextData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/userInput/form/text.dummy.php');
$aTextFormData = $oDummyData->getDummyData();

$aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/userInput/form/textarea.dummy.php');
$aTextAreaData = $oDummyData->getDummyData();

$aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/userInput/form/rating.dummy.php');
$aRatingData = $oDummyData->getDummyData();

$aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/pkgShopArticleReview/standard.dummy.php');
$aFieldRatingData = $oDummyData->getDummyData();

$aData['aFieldUserName'] = $aTextFormData;
$aData['aFieldTitle'] = $aTextFormData;
$aData['aFieldText'] = $aTextAreaData;
$aData['aFieldRating'] = $aRatingData;
$aData['aTextData'] = $aTextData;
$aData['sFormName'] = 'writeReview_id';
$aData['sFormAction'] = '#';
$aData['sSpotName'] = 'spot';

// Change var values
unset($aData['aTextData']['aLink']);
$aData['aFieldUserName']['sLabelText'] = '';
$aData['aFieldUserName']['sError'] = '';
$aData['aFieldUserName']['sInputClass'] = 'col-xs-4';

$aData['aFieldTitle']['sLabelText'] = '';
$aData['aFieldTitle']['sError'] = '';
$aData['aFieldTitle']['sInputClass'] = 'col-xs-4';

$aData['aFieldText']['sLabelText'] = '';
$aData['aFieldText']['sError'] = '';
$aData['aFieldText']['sInputClass'] = 'col-xs-8';

$aData['aFieldRating']['sLabelText'] = '';
$aData['aFieldRating']['sError'] = '';
$aData['aFieldRating']['sInputClass'] = 'col-xs-4';

$aData['aFieldRating']['sLabelText'] = '';
$aData['aFieldRating']['sError'] = '';
$aData['aFieldRating']['sInputClass'] = 'span4';

return $aData;
