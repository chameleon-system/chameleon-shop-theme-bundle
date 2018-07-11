<?php
/**
 * layout header - possible input.
 *
 * @var $sLayoutName   string - the name of the layout. is inserted into the body as a css class
 * @var $aHeadIncludes - array of head includes - is imploded in the header
 */
include __DIR__.'/html-header.inc.php';

$activePage = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_core.active_page_service')->getActivePage();

TdbPkgExternalTrackerList::GetActiveInstance()->TrackPage($activePage);

?>
<div id="waiting">
    <div class="overlayGif" id="loadingGif"></div>
</div>
<div id="rightSide">
    <?php $modules->GetModule('rightSide'); ?>
</div>
<a id="top"></a>
<div id="headerwrap">
    <div id="headerimg"></div>
    <?php
    if (!empty($sHeaderFile)) {
        include __DIR__.'/../'.$sHeaderFile;
    }
    ?>

</div>
        <div id="bodywrap">
            <div id="bodybackground"></div>
            <div class="container">
                <div id="backgroundimgfix"></div>
                <div id="backgroundimgfix2"></div>
                <div id="pagebody" role="main">
                    <?php $modules->GetModule('shopBasketHandler'); ?>
                    <?php $modules->GetModule('oShopCentralHandler'); ?>
                    <?php $modules->GetModule('extranetHandler'); ?>
