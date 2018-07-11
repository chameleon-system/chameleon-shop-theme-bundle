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
        <meta charset="utf-8">
        <?php
            $oViewRenderer = new ViewRenderer();
            $oViewRenderer->AddMapper(new TMapper_ViewPortMeta());
            echo $oViewRenderer->Render('common/meta/metaViewPort.html.twig');
        ?>
        <?php $modules->GetModule('metadata'); ?>

<?php
/*
  * All JavaScript at the bottom, except this Modernizr build.
  * Modernizr enables HTML5 elements & feature detects for optimal performance.
  * Create your own custom Modernizr build: www.modernizr.com/download/
  */
?>
        <!--#CMSRESOURCEIGNORE#-->
        <script src="/bundles/chameleonsystemchameleonshoptheme/js/modernizr/modernizr-2.5.3.min.js"></script>
        <!--#ENDCMSRESOURCEIGNORE#-->
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
                <?php $modules->GetModule('shopBasketHandler'); //MTShopBasket system?>
                <?php $modules->GetModule('oShopCentralHandler'); //MTShopCentralHandler standard?>
                <?php $modules->GetModule('extranetHandler'); //MTExtranet inc/system?>
