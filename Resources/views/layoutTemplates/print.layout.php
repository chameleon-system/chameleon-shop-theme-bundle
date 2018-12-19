<?php

/** @var $modules TModuleLoader* */
$sLayoutName = substr(basename(__FILE__), 0, strpos(basename(__FILE__), '.'));
$aHeadIncludes = array(
    '<link href="/bundles/chameleonsystemchameleonshoptheme/less/printpage.less" rel="stylesheet" type="text/css" />',
);
$sHeaderFile = '/parts/headerPrint.inc.php';
$sFooterFile = '/parts/footerPrint.inc.php';

include __DIR__.'/page-skeleton/layoutPrintHeader.inc.php';
$sSpotName = 'primary';
echo $modules->GetModule($sSpotName, true, '<div class="row"><div id="spot'.$sSpotName.'" class="col-xs-12 cmsspot">[{content}]</div></div>', false);

include __DIR__.'/page-skeleton/layoutPrintFooter.inc.php';
