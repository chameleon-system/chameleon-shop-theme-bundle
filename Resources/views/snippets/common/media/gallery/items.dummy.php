<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aData = array(
    'aItems' => array(
    ),
);

$aData['aItems'][] = array(
    'sSelectImageURL' => '#',
    'sImageId' => $oDummyData->getDummyImage('one'),
    'sTitle' => 'Image One',
);

$aData['aItems'][] = array(
    'sSelectImageURL' => '#',
    'sImageId' => $oDummyData->getDummyImage('two'),
    'sTitle' => 'Image two',
);
$aData['aItems'][] = array(
    'sSelectImageURL' => '#',
    'sImageId' => $oDummyData->getDummyImage('three'),
    'sTitle' => 'Image three',
);
$aData['aItems'][] = array(
    'sSelectImageURL' => '#',
    'sImageId' => $oDummyData->getDummyImage('four'),
    'sTitle' => 'Image four',
);

$aData['aItems'][] = array(
    'sSelectImageURL' => '#',
    'sImageId' => $oDummyData->getDummyImage('five'),
    'sTitle' => 'Image five',
);

$aData['aItems'][] = array(
    'sSelectImageURL' => '#',
    'sImageId' => $oDummyData->getDummyImage('six'),
    'sTitle' => 'Image six',
);
$aData['aItems'][] = array(
    'sSelectImageURL' => '#',
    'sImageId' => $oDummyData->getDummyImage('seven'),
    'sTitle' => 'Image seven',
);
$aData['aItems'][] = array(
    'sSelectImageURL' => '#',
    'sImageId' => $oDummyData->getDummyImage('eight'),
    'sTitle' => 'Image eight',
);

$oDummyData->addDummyDataArray($aData);

return $oDummyData;
