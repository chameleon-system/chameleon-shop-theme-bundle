<?php
/** @var $modules TModuleLoader* */
use ChameleonSystem\CoreBundle\ServiceLocator;

$translator = ServiceLocator::get('translator');
?>

<div id="topnavi" class="cmsspot">
    <nav class="hidden-print">
        <div class="navbarCustomTop navbar navbar-default navbar-fixed-top">

            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" id="buttonMobileNavigation" data-toggle="collapse"
                            data-target="#topnavi-collapse" aria-expanded="false">
                        <span class="sr-only"><?= $translator->trans('chameleon_system_chameleon_shop_theme.navigation.service_menu'); ?></span>
                        <span class="icon-menu">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </span>
                        <span class="buttonText">
                            <?= $translator->trans('chameleon_system_chameleon_shop_theme.navigation.service_menu'); ?>
                        </span>
                    </button>
                    <div class="navbar-brand" href="#">
                        <div class="logoMobile"><?php $modules->GetModule('logo'); ?></div>
                        <div class="navbar-brand-icons">
                            <div class="searchMagnifier"><span class="glyphicon glyphicon-search"></span></div>
                            <div class="miniBasketMobile"><?php $modules->GetModule('minibasketmobile'); ?></div>
                            <div id="mainMenueButton">
                                <button class="navbar-toggle collapsed" id="buttonMobileNavigationMain" data-toggle="collapse"
                                        data-target="#mainMenu" aria-expanded="false">
                                    <span class="sr-only"><?= $translator->trans('chameleon_system_chameleon_shop_theme.navigation.shop_menu'); ?></span>
                                    <span class="icon-menu">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </span>
                                    <span class="buttonText">
                                        <?= $translator->trans('chameleon_system_chameleon_shop_theme.navigation.shop_menu'); ?>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="topnavi-collapse" class="collapse navbar-collapse">
                    <?php $modules->GetModule('topnavi'); ?>
                </div>
            </div>
        </div>
    </nav>
</div>

<header>
    <div class="container">
        <div class="row">
            <div id="logo" class="hidden-xs col-sm-3 cmsspot">
                <?php $modules->GetModule('logo'); ?>
            </div>
            <div id="headinfo1" class="hidden-xs col-sm-2 cmsspot">
                <?php
                $oViewRenderer = new ViewRenderer();
                $oViewRenderer->AddSourceObjectsFromArray(array('sImage' => '<img class="icon" src="'.TGlobal::GetStaticURL('/bundles/chameleonsystemchameleonshoptheme/images/sprite/header_image_one.png').'" style="float: left;" alt="'.TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.layout.header_shipping')).'">', 'sText' => \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.layout.header_shipping'), 'aLink' => array('sLinkURL' => \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_shop.shop_service')->getActiveShop()->GetLinkToSystemPage('customerservice-shipping'), 'sTitle' => \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.layout.header_shipping'))));
                echo $oViewRenderer->Render('/common/textTeaser/textTeaserImageTextLink.html.twig');
                ?>
            </div>
            <div id="headinfo2" class="hidden-xs col-sm-2 cmsspot">
                <?php
                $oViewRenderer = new ViewRenderer();
                $oViewRenderer->AddSourceObjectsFromArray(array('sImage' => '<img class="icon" src="'.TGlobal::GetStaticURL('/bundles/chameleonsystemchameleonshoptheme/images/sprite/header_image_two.png').'" style="float: left;" alt="'.TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.layout.header_product_return')).'">', 'sText' => \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.layout.header_product_return'), 'aLink' => array('sLinkURL' => \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_shop.shop_service')->getActiveShop()->GetLinkToSystemPage('product-returns'), 'sTitle' => \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.layout.header_product_return'))));
                echo $oViewRenderer->Render('/common/textTeaser/textTeaserImageTextLink.html.twig');
                ?>
            </div>
            <div id="headinfo3" class="hidden-xs col-sm-2 cmsspot">
                <?php
                $oViewRenderer = new ViewRenderer();
                $oViewRenderer->addMapperFromIdentifier('chameleon_system_shop_rating_service.mapper.ekomi');
                echo $oViewRenderer->Render('pkgShopRatingService/ekomi/icon.html.twig');
                ?>
            </div>
            <div id="minibasket" class="hidden-xs col-sm-3 cmsspot">
                <div class="pull-right">
                    <?php $modules->GetModule('minibasket'); ?>
                </div>
            </div>
        </div>
        <!--IE9 and lower-->
        <!--[if IE]>
        <div class="row">
            <div class="col-xs-12">
                <div class="cmsmessage messageerror text-center" style="margin-top: 20px;">
                    <?= $translator->trans('chameleon_system_chameleon_shop_theme.deprecated_browser_message'); ?>
                </div>
            </div>
        </div>
        <![endif]-->        
        <div class="row">
            <div class="col-xs-12 mainnav-search-container">
                <div class="row">
                    <div id="minisearch" class="col-xs-12 col-sm-12 col-md-3 col-md-push-9 cmsspot">
                        <?php $modules->GetModule('minisearch'); ?>
                    </div>
                    <div id="mainnav" class="col-xs-12 col-sm-12 col-md-9 col-md-pull-3 cmsspot">
                        <?php $modules->GetModule('mainnav'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
