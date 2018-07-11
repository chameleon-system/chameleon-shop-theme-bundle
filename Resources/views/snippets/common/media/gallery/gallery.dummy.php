<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/media/gallery/itemsWithZoom.dummy.php');

$aGallery = array(
    'sImageId' => $oDummyData->getDummyImage('test'),
    'sTitle' => 'Active Image',
    'sSelectImageURL' => '#',
    'sTopic' => 'Thokk Thokk or langer',
    'sHeadline' => 'Plaid T-Shirt and even much longer',
);
$oDummyData->addDummyDataArray($aGallery);

return $oDummyData;
