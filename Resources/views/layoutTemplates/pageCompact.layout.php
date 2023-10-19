<?php

/** @var $modules TModuleLoader* */
$sLayoutName = substr(basename(__FILE__), 0, strpos(basename(__FILE__), '.'));
$aHeadIncludes = array();
$sHeaderFile = '/parts/headerCompact.inc.php';
$sFooterFile = '/parts/footerCompact.inc.php';

include __DIR__.'/page-skeleton/layoutHeader.inc.php';

$modules->GetModule('breadcrumbNavigation', false, '<div class="row"><div class="col-xs-12" id="spotbreadcrumbNavigation">[{content}]</div></div>');

$sSpotName = 'primary';
echo $modules->GetModule($sSpotName, true, '<div class="row"><div id="spot'.$sSpotName.'" class="col-xs-12 cmsspot">[{content}]</div></div>', false);

$sLeftColumnContent = '';
$sSpotName = 'spot1';
$sLeftColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
$sSpotName = 'spot2';
$sLeftColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
$sSpotName = 'spot3';
$sLeftColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);

$sRightColumnContent = '';
$sSpotName = 'spot4';
$sRightColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
$sSpotName = 'spot5';
$sRightColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
$sSpotName = 'spot6';
$sRightColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);

if (!empty($sLeftColumnContent) || !empty($sRightColumnContent)) {
    echo '<div class="row">';
    echo '<div class="col-xs-8">'.$sLeftColumnContent.'</div>';
    echo '<div class="col-xs-4">'.$sRightColumnContent.'</div>';
    echo '</div>';
}

$sLeftColumnContent = '';
$sSpotName = 'spot7';
$sLeftColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
$sSpotName = 'spot8';
$sLeftColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
$sSpotName = 'spot9';
$sLeftColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);

$sRightColumnContent = '';
$sSpotName = 'spot10';
$sRightColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
$sSpotName = 'spot11';
$sRightColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
$sSpotName = 'spot12';
$sRightColumnContent .= $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);

if (!empty($sLeftColumnContent) || !empty($sRightColumnContent)) {
    echo '<div class="row">';
    echo '<div class="col-xs-6">'.$sLeftColumnContent.'</div>';
    echo '<div class="col-xs-6">'.$sRightColumnContent.'</div>';
    echo '</div>';
}

$sSpotName = 'lasso';
echo $modules->GetModule($sSpotName, true, '<div class="row"><div id="spot'.$sSpotName.'" class="col-xs-12 cmsspot">[{content}]</div></div>', false);

include __DIR__.'/page-skeleton/layoutFooter.inc.php';
