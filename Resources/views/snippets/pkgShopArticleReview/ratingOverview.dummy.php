<?php

$aData = array();
$aData['aRatingOverview'] = array();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/pkgShopArticleReview/withTotalVotes.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aRatingData = $oDummyData->getDummyData();

$aData['aRatingOverview'] = array($aRatingData, $aRatingData, $aRatingData, $aRatingData, $aRatingData);

return $aData;
