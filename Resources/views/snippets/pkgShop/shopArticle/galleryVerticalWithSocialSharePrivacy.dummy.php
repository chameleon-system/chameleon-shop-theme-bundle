<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/media/gallery/galleryVertical.dummy.php');
$oDummyData->addDummyDataFromFile('/widgets/socialSharePrivacy/socialSharePrivacy.dummy.php');

return $oDummyData;
