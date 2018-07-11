<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aErrors = array(
    'name' => 'please enter your name',
);

$oDummy->addDummyData('aErrors', $aErrors);

return $oDummy;
