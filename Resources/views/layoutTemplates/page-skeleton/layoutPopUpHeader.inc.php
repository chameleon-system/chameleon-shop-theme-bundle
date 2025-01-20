<?php
/**
 * layout header - possible input.
 *
 * @var $sLayoutName   string - the name of the layout. is inserted into the body as a css class
 * @var $aHeadIncludes - array of head includes - is imploded in the header
 */
 $sLanguageCode = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_core.language_service')->getLanguageIsoCode();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?=$sLanguageCode; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?=$sLanguageCode; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?=$sLanguageCode; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?=$sLanguageCode; ?>"> <!--<![endif]-->
    <head>
        <?php
            $oViewRenderer = new ViewRenderer();
            $oViewRenderer->AddMapper(new TMapper_ViewPortMeta());
            echo $oViewRenderer->Render('common/meta/metaViewPort.html.twig');
        ?>
        <?php $modules->GetModule('metadata'); ?>

<?php
        if (isset($aHeadIncludes) && is_array($aHeadIncludes)) {
            echo implode("\n        ", $aHeadIncludes);
        }
?>
        <!--#CMSHEADERCODE#-->
        <!--#CMSHEADERCODE-COMPACT-JS-AND-CSS#-->
    </head>
    <body class="<?php if (isset($sLayoutName)) {
    echo TGlobal::OutHTML($sLayoutName);
} ?>">
        <div class="popupContainer">
            <?php include __DIR__.'/../'.$sHeaderFile; ?>
            <div id="popupPagebody" role="main">
                <?php $modules->GetModule('shopBasketHandler'); ?>
                <?php $modules->GetModule('oShopCentralHandler'); ?>
                <?php $modules->GetModule('extranetHandler'); ?>
