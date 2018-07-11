<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/textBlock/textBlockStandard.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aData = $oDummyData->getDummyData();
$aData['sTitle'] = 'sicher bezahlen';
$aData['aLink']['sTitle'] = 'Weitere Infos zu Zahlung & Versand';

return $aData;
