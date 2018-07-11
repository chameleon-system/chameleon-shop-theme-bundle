<?php

$aRawInternal = array();
$aIncludes = array('/common/teaser/standard-base.dummy.php', '/pkgShop/shopArticle/articleColors.dummy.php', '/pkgShop/shopArticle/articlePrice.dummy.php');
// SNIPPETREFACTOR
$aIncludes = array();
foreach ($aIncludes as $sInclude) {
    $aTmp = include __DIR__.'/..'.$sInclude;
    foreach ($aTmp as $sKey => $sVal) {
        $aRawInternal[$sKey] = $sVal;
    }
}

$aData = array();

foreach ($aRawInternal as $sKey => $sVal) {
    $aData[$sKey] = $sVal;
}

if (isset($aData['sTeaserText'])) {
    unset($aData['sTeaserText']);
}

$aData['sShippingLink'] = '#';
$aData['sCurrency'] = '€';
$aData['sPrice'] = '49,95';
$aData['sRetailPrice'] = '69,95';
$aData['bIsNew'] = true;

//$aData['sLinkNext'] = '#';
//$aData['sLinkPrevious'] = '#';
return $aData;
