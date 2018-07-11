<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/lists/listStandardShopArticle.dummy.php', '/common/lists/listHeaderTab.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aData = $oDummyData->getDummyData();

return $aData;
