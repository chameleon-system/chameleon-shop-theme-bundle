<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aTags = array(
    array('sName' => 'Test-Tag 1', 'sUrlName' => 'Test-Tag-1', 'iCount' => '2', 'sUrlSearch' => '/suche/?q=Test-Tag 1'),
    array('sName' => 'Test2', 'sUrlName' => 'Test2', 'iCount' => '5', 'sUrlSearch' => '/suche/?q=Test2'),
    array('sName' => 'Test3', 'sUrlName' => 'Test3', 'iCount' => '1', 'sUrlSearch' => ''),
);

$oDummy->addDummyData('aArticleTags', $aTags);

return $oDummy;
