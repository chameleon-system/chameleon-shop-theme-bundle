<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyDataFromFile('/common/teaser/standard-shopArticle.dummy.php');
$oDummy->addDummyDataFromFileAs('aListPaging', '/common/lists/listPaging.dummy.php');

$aListData = array(
    'sTitle' => 'Listenüberschrift',
    'listIdent' => 'test_list',
    'aArticleList' => array(
        '<div class="col-xs-2"><img src="http://placehold.it/170x233&text=article-1"></div>',
        '<div class="col-xs-2"><img src="http://placehold.it/170x233&text=article-2"></div>',
        '<div class="col-xs-2"><img src="http://placehold.it/170x233&text=article-3"></div>',
        '<div class="col-xs-2"><img src="http://placehold.it/170x233&text=article-4"></div>',
        '<div class="col-xs-2"><img src="http://placehold.it/170x233&text=article-5"></div>',
    ),
);

$oDummy->addDummyDataArray($aListData);

return $oDummy;
