<?php

$oDummy = new TPkgViewRendererSnippetDummyData();
$oImage = new TCMSImage(1);
$aTeaserData = array();
$aTeaserData['sImageId'] = $oDummy->getDummyImage('image');
$aTeaserData['sHeadline'] = 'Karohemden';
$aTeaserData['sLink'] = '#';
$aTeaserData['sTeaserText'] = 'Ideal für unterwegs';

$aDummyData = array(
    'sCategoryName' => 'Aktive-Kategorie',
    'aTeaserList' => array(
        $aTeaserData, $aTeaserData, $aTeaserData, $aTeaserData,
    ),
);
$oDummy->addDummyDataArray($aDummyData);

return $oDummy;
