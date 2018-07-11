<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();

$oDummyData->addDummyDataFromFile('/common/media/gallery/items.dummy.php');

$aData = $oDummyData->getDummyData();
foreach ($aData['aItems'] as $sImageKey => $aImage) {
    $aData['aItems'][$sImageKey]['sLargeImageId'] = $oDummyData->getDummyImage('Large '.($sImageKey + 1));
    $aData['aItems'][$sImageKey]['sLargeLink'] = '#'.$sImageKey;
    $aData['aItems'][$sImageKey]['sLargeTitle'] = 'very large image'.$sImageKey;
}
$oDummyData->addDummyData('aItems', $aData['aItems']);

return $oDummyData;
