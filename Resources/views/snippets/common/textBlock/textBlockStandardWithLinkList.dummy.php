<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/textBlock/textBlockStandard.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aData = $oDummyData->getDummyData();

$aLink = array('sLinkURL' => '#', 'sTitle' => 'Text');
$aLinkList = array($aLink, $aLink, $aLink, $aLink, $aLink, $aLink);
$aData['aLinkList'] = $aLinkList;

return $aData;
