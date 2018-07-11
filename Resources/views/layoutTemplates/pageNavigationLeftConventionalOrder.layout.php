<?php
/** @var $modules TModuleLoader* */
$sLayoutName = substr(basename(__FILE__), 0, strpos(basename(__FILE__), '.'));
$aHeadIncludes = array();
$sHeaderFile = '/parts/headerStandard.inc.php';
$sFooterFile = '/parts/footerStandard.inc.php';

include __DIR__.'/page-skeleton/layoutHeader.inc.php';

$modules->GetModule('breadcrumbNavigation', false, '<div class="row"><div class="col-xs-12" id="spotbreadcrumbNavigation">[{content}]</div></div>');
?>

<div class="row">
    <div class="col-xs-12 col-sm-3 col-md-2">
        <?php
        $sSpotName = 'subnavi';
        echo $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
        TGlobal::GetController()->FlushContentToBrowser();

        for ($i = 7; $i <= 12; ++$i) {
            $sSpotName = 'spot'.$i;
            echo  $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
            TGlobal::GetController()->FlushContentToBrowser();
        }
        ?>
    </div>
    <div class="col-xs-12 col-sm-9 col-md-10">
        <?php
        $sSpotName = 'primary';
        echo $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
        TGlobal::GetController()->FlushContentToBrowser();

        for ($i = 1; $i <= 6; ++$i) {
            $sSpotName = 'spot'.$i;
            echo  $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
            TGlobal::GetController()->FlushContentToBrowser();
        }

        ?>
    </div>
</div>



<?php
$sSpotName = 'lasso';
echo $modules->GetModule($sSpotName, true, '<div class="row"><div id="spot'.$sSpotName.'" class="col-xs-12 cmsspot">[{content}]</div></div>', false);
TGlobal::GetController()->FlushContentToBrowser();

include __DIR__.'/page-skeleton/layoutFooter.inc.php';
