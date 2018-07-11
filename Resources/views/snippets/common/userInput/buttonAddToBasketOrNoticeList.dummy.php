<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyDataFromFile('/common/userInput/buttonAddToBasket.dummy.php');
$oDummy->addDummyDataFromFile('/common/userInput/buttonAddToNoticeList.dummy.php');

return $oDummy;
