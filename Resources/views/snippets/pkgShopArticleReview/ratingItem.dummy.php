<?php

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/pkgShopArticleReview/standard.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aData = $oDummyData->getDummyData();
$aData['sTitle'] = 'Was nicht in der Amazon-werbung steht';
$aData['sUser'] = 'Max Mustermann';
$aData['sDate'] = '11. Oktober 2011';
$aData['sText'] = 'Es gibt einige Informationen zum Kindle, die ich mir entweder mühsam in Foren, Rezensionen oder der Kindle-Hilfe zusammengesucht oder während der Benutzung meiner';

return $aData;
