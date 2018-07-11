<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyData('sHeadline', 'Ähnliche Artikel finden Sie hier');

$aNavi = array(
);

$aNaviPath = array(
    array('sName' => 'Männer', 'sLink' => '#'),
    array('sName' => 'Printed Shirts', 'sLink' => '#'),
    array('sName' => 'Kategoriename', 'sLink' => '#'),
);
$aNavi[] = $aNaviPath;

$aNaviPath = array(
    array('sName' => 'Sale', 'sLink' => '#'),
    array('sName' => 'Angebote aus 1001 Nacht', 'sLink' => '#'),
);
$aNavi[] = $aNaviPath;

$aNaviPath = array(
    array('sName' => 'Nach eine', 'sLink' => '#'),
    array('sName' => 'Printed Shirts', 'sLink' => '#'),
    array('sName' => 'Kategorie', 'sLink' => '#'),
);
$aNavi[] = $aNaviPath;
$oDummy->addDummyData('aLinks', $aNavi);

return $oDummy;
