<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/textBlock/textBlockStandard.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aData = $oDummyData->getDummyData();
$aData['sImageId'] = $oDummyData->getDummyImage('teaser'); // 'http://placehold.it/370x220';

return $aData;
