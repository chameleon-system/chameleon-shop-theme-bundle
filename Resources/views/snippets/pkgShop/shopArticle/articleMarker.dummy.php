<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();

$aMarker = array(
    'sImageUrl' => 'http://placehold.it/25x25',
    'sName' => 'Marker 1',
    'sDescription' => "<strong>\"test\"</strong>\n<br>marker with html",
);

$aArticleMarker = array();
$aArticleMarker[] = $aMarker;
$aArticleMarker[] = $aMarker;
$aArticleMarker[] = $aMarker;
$oDummyData->addDummyData('aArticleMarker', $aArticleMarker);

return $oDummyData;
