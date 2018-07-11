<?php

//    <img src="{{sImageURL}}" alt="{{sTitle}}" data-cmslargeimage="{{sLargeImageURL}}" data-cmslargeimagelink="{{sLargeImageLink}}" data-cmslargeimagetitle="{{sLargeImageTitle}}" >

$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/media/gallery/thumbnail.dummy.php');

// now add the large version of the image to the dummy data
    //data-cmslargeimage="{{aLargeImage.sImageURL}}" data-cmslargeimagelink="{{aLargeImage.sLink}}" data-cmslargeimagetitle="{{{{aLargeImage.sTitle}}}}"
$aLargeImageDetails = array(
    'sLargeImageURL' => 'http://placehold.it/370x450?text=big',
    'sLargeLink' => '#',
    'sLargeTitle' => 'very large image',
);

$oDummyData->addDummyDataArray($aLargeImageDetails);

return $oDummyData;
