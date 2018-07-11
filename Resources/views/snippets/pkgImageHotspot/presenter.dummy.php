<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyData('sHeadline', 'eine überschrift');
$oDummy->addDummyData('sBackgroundImageURL', 'http://placehold.it/1170x385');
$oDummy->addDummyData('sBackgroundImageAlt', 'alt text for primary image');

// <a href="{{aNavItem.sLink}}" class="pager {% if aNavItem.bIsActive%}active{% endif %}" rel="{{aNavItem.sLinkJS}}" title="{{aNavItem.sTitle}}">&nbsp;</a>
$aNavigation = array(
    array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 1', 'bIsActive' => false),
    array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 2', 'bIsActive' => false),
    array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 3', 'bIsActive' => false),
    array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 4', 'bIsActive' => true),
    array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 5', 'bIsActive' => false),
    array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 6', 'bIsActive' => false),
    array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 7', 'bIsActive' => false),
    array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 8', 'bIsActive' => false),
);
$oDummy->addDummyData('aNavigation', $aNavigation);

$aPrevious = array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 3', 'bIsActive' => false);
$oDummy->addDummyData('aPrevious', $aPrevious);
$aNext = array('sLink' => '#', 'sLinkJS' => '#', 'sTitle' => 'Product 5', 'bIsActive' => false);
$oDummy->addDummyData('aNext', $aNext);

$aImageLayoverList = array();
$aLayover = array(
    'iLeft' => 50,
    'iTop' => 50,
    'sLink' => '#',
    'sTitle' => 'link 1',
    'sImageURL' => 'http://placehold.it/100x50/ff0000&text=L1',
    'sHoverImageURL' => 'http://placehold.it/100x50/ff0000&text=L1-Hover',
);
$aImageLayoverList[] = $aLayover;

$aLayover = array(
    'iLeft' => 200,
    'iTop' => 50,
    'sLink' => '#',
    'sTitle' => 'link 2',
    'sImageURL' => 'http://placehold.it/100x50/ff0000&text=L2',
    'sHoverImageURL' => 'http://placehold.it/100x50/ff0000&text=L2-Hover',
);
$aImageLayoverList[] = $aLayover;

$oDummy->addDummyData('aImageLayoverList', $aImageLayoverList);

$aMarkerList = array();

$sArticleTeaser = $oDummy->renderSnippet('/common/teaser/horizontal-shopArticle.html.twig');
//$sArticleTeaser = $oDummy->renderSnippet("/common/teaser/standard-shopArticle.html.twig");

$aMarker = array(
    'iLeft' => 75,
    'iTop' => 150,
    'sLink' => '#',
    'sContent' => $sArticleTeaser,
    'sDirection' => 'right',
);
$aMarkerList[] = $aMarker;

$aMarker = array(
    'iLeft' => 175,
    'iTop' => 250,
    'sLink' => '#',
    'sContent' => '<div>content 1</div>',
    'sDirection' => 'left',
);
$aMarkerList[] = $aMarker;

$oDummy->addDummyData('aMarkerList', $aMarkerList);

return $oDummy;
