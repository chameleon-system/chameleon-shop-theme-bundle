<?php
    $aData = array();
$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/pkgShopArticleReview/ratingItem.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aRatingItemData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/pkgShopArticleReview/withTotalVotesSimple.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aRatingOverviewData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/userInput/form/formLoginStandard.dummy.php');
$aLoginData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$oDummyData->addDummyDataFromFile('/common/userInput/form/formWriteReviewStandard.dummy.php');
$aWriteReviewData = $oDummyData->getDummyData();

$oDummyData = new TPkgViewRendererSnippetDummyData();
$aIncludes = array('/common/links/linkStylesIcon.dummy.php');
foreach ($aIncludes as $sInclude) {
    $oDummyData->addDummyDataFromFile($sInclude);
}
$aData = $oDummyData->getDummyData();

$aData['aTabList'] = array(
    'bShowMinimizer' => false,
    'sMinimizeListContainerId' => '',
    'aTabHeaderList' => array(
        array(
            'sName' => 'Bewertungen',
            'bActive' => true,
            'sUrl' => '',
            'sAjaxUrl' => '',
        ),
    ),
);
$aData['aRatingItemList'] = array($aRatingItemData, $aRatingItemData, $aRatingItemData, $aRatingItemData, $aRatingItemData, $aRatingItemData, $aRatingItemData, $aRatingItemData);
$aData['aRatingOverview'] = array($aRatingOverviewData, $aRatingOverviewData, $aRatingOverviewData, $aRatingOverviewData, $aRatingOverviewData);
$aData['aLoginData'] = $aLoginData;
$aData['aWriteReviewData'] = $aWriteReviewData;
$aData['sShowAllReviews'] = 'Alle Bewertungen anzeigen';
$aData['iItemCountStart'] = 2;

return $aData;
