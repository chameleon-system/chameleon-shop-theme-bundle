<?php

/** @var $modules TModuleLoader* */
$sLayoutName = substr(basename(__FILE__), 0, strpos(basename(__FILE__), '.'));
$aHeadIncludes = array();
$sHeaderFile = '/parts/headerPopUp.inc.php';
$sFooterFile = '/parts/footerPopUp.inc.php';

include __DIR__.'/page-skeleton/layoutPopUpHeader.inc.php';
$sSpotName = 'primary';
echo $modules->GetModule($sSpotName, true, '<div class="row"><div id="spot'.$sSpotName.'" class="col-xs-12 cmsspot">[{content}]</div></div>', false);

include __DIR__.'/page-skeleton/layoutPopUpFooter.inc.php';
