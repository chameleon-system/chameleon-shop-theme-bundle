<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

    $aArticle = array(
        'sImageId' => $oDummy->getDummyImage('article'),
        'iAmount' => '7',
        'sManufacturer' => 'Recoltuion',
        'sArticleName' => 'Zipper',
        'sPrice' => '23.320,95',
        'sCurrency' => '€',
        'sArticleDetailURL' => '',
    );

    return $aArticle;
