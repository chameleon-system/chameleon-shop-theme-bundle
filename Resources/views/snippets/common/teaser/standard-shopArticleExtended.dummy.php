<?php

$aData = include __DIR__.'/standard-shopArticle.dummy.php';

    $aData['sShippingTime'] = 'sofort lieferbar';
    $aData['dRating'] = 4.5;
    $aData['sSize'] = 'XL';

$aDataCopy = $aData;
// get notice list dummy data
    $aNoticeList = include __DIR__.'/../userInput/buttonAddToNoticeList.dummy.php';
//$aData = array_merge($aDataCopy, $aNoticeList);
return $aData;
