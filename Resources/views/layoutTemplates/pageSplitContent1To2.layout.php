<?php
/** @var $modules TModuleLoader* */
$sLayoutName = substr(basename(__FILE__), 0, strpos(basename(__FILE__), '.'));
$aHeadIncludes = array();
$sHeaderFile = '/parts/headerStandard.inc.php';
$sFooterFile = '/parts/footerStandard.inc.php';

include __DIR__.'/page-skeleton/layoutHeader.inc.php';
?>
<div class="row">
    <div class="col-xs-12" id="spotbreadcrumbNavigation">
        <div class="row">
            <div class="col-xs-8"><?php $modules->GetModule('breadcrumbNavigation'); ?></div>
            <div class="col-xs-4">
                <?php
                $sSpotName = 'oPrevNext';
                echo $modules->GetModule($sSpotName, true, null, false);
                ?>
            </div>
        </div>
    </div>
</div>

<?php
$sSpotName = 'primary';
echo $modules->GetModule($sSpotName, true, '<div class="row"><div id="spot'.$sSpotName.'" class="col-xs-12 cmsspot">[{content}]</div></div>', false);
?>

<div class="row">
    <div class="col-xs-12 col-sm-4">
        <?php
            for ($i = 7; $i <= 12; ++$i) {
                $sSpotName = 'spot'.$i;
                echo  $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
            }
        ?>
    </div>
    <div class="col-xs-12 col-sm-8">
        <div class="row">
            <?php
                $sSpotName = 'spot1';
                echo $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot col-xs-12 col-sm-6">[{content}]</div>', false);

                $sSpotName = 'spot2';
                echo $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot col-xs-12 col-sm-6">[{content}]</div>', false);
            ?>
        </div>
        <?php
            for ($i = 3; $i <= 6; ++$i) {
                $sSpotName = 'spot'.$i;
                echo  $modules->GetModule($sSpotName, true, '<div id="spot'.$sSpotName.'" class="cmsspot">[{content}]</div>', false);
            }

        ?>


    </div>
</div>
<?php
    $sSpotName = 'lasso';
    echo $modules->GetModule($sSpotName, true, '<div class="row"><div id="spot'.$sSpotName.'" class="col-xs-12 cmsspot">[{content}]</div></div>', false);

include __DIR__.'/page-skeleton/layoutFooter.inc.php';
