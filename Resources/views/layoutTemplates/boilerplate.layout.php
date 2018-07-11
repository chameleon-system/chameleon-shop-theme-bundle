<?php
/** @var $modules TModuleLoader* */
$sLayoutName = substr(basename(__FILE__), 0, strpos(basename(__FILE__), '.'));
$aHeadIncludes = array();
$sHeaderFile = '/parts/headerStandard.inc.php';
$sFooterFile = '/parts/footerStandard.inc.php';

include __DIR__.'/page-skeleton/layoutHeader.inc.php';
?>

<!-- add your layout here -->

<?php
include __DIR__.'/page-skeleton/layoutFooter.inc.php';
