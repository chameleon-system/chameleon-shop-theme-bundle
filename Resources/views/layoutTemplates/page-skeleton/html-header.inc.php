<?php

use ChameleonSystem\CoreBundle\ServiceLocator;

$sLanguageCode = ServiceLocator::get('chameleon_system_core.language_service')->getLanguageIsoCode();
?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?=$sLanguageCode; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="<?=$sLanguageCode; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="<?=$sLanguageCode; ?>"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?=$sLanguageCode; ?>"> <!--<![endif]-->
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <?php
        $oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
        $oViewRenderer->addMapperFromIdentifier('chameleon_system_core.mapper.view_port_meta');
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

    <?php
        $oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
        echo $oViewRenderer->Render('head-includes/fontHeaderInclude.html.twig');
    ?>
</head>
<body class="<?php if (isset($sLayoutName)) {
        echo TGlobal::OutHTML($sLayoutName);
    } ?>">