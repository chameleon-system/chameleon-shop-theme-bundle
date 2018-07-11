<?php

$aRawInternal = array();
$aIncludes = array('/pkgShopArticleReview/standard.dummy.php');
foreach ($aIncludes as $sInclude) {
    $aTmp = include __DIR__.'/..'.$sInclude;
    foreach ($aTmp as $sKey => $sVal) {
        $aRawInternal[$sKey] = $sVal;
    }
}
$aRawInternal['iRatingCount'] = 10;

return $aRawInternal;
