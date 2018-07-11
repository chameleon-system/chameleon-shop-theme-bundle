<?php

$oDummy = new TPkgViewRendererSnippetDummyData();
$oDummy->addDummyDataFromFile('pkgCmsTextBlock/standard.html.dummy.php');
$oDummy->addDummyData('title', 'Lorem Ipsum Dolor Sit');

return $oDummy;
