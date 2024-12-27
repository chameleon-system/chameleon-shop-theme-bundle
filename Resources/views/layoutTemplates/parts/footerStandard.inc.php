<?php
/** @var $modules TModuleLoader* */
use ChameleonSystem\CoreBundle\ServiceLocator;

$translator = ServiceLocator::get('translator');

?>
<footer>
    <div class="row">
        <div id="lassopayment" class="cmsspot col-xs-12"><?php $modules->GetModule('lassopayment'); ?></div>
    </div>
    <div class="row" id="footerBlock">
        <div  class="cmsspot col-xs-12 col-sm-5">
            <div id="footernewsletter">
                <?php
                /**
                 * @todo - use new newsletter signup module
                 */
                $oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->AddSourceObject('sModuleSpotName', 'primary');
echo $oViewRenderer->Render('/pkgNewsletter/newsletterQuickSignup.html.twig');
?>
            </div>
            <div id="footershopadr">
                <?php
$oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.shop_address');
echo $oViewRenderer->Render('/pkgShop/address/address.html.twig');
?>
            </div>
        </div>
        <div id="footerinfotext" class="cmsspot col-xs-12 col-sm-4">
            <?php
            $oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_cms_text_block.mapper.get_text');
$oViewRenderer->AddSourceObject('name', 'seo-footer');
echo $oViewRenderer->Render('/pkgCmsTextBlock/standard.html.twig');
?>
        </div>
        <div class="cmsspot col-xs-12 col-sm-3">
            <div id="footersocial">
            </div>
            <div id="footeraux">
                <a title="<?php echo $translator->trans('chameleon_system_chameleon_shop_theme.layout.footer_print_page'); ?>" href="#" onclick="window.print(); return false;" class="snippetLinkStylesIcon cmsBtn-small">
                    <i class="linkimage i i-print">&nbsp;</i><span class="link">&nbsp;<?php echo $translator->trans('chameleon_system_chameleon_shop_theme.layout.footer_print_page'); ?></span>
                </a>
                <a title="<?php echo $translator->trans('chameleon_system_chameleon_shop_theme.layout.footer_jump_top'); ?>" href="#top" class="snippetLinkStylesIcon cmsBtn-small">
                    <i class="linkimage i i-pointer-up">&nbsp;</i><span class="link">&nbsp;<?php echo $translator->trans('chameleon_system_chameleon_shop_theme.layout.footer_jump_top'); ?></span>
                </a>
            </div>
            <div id="footertrust">
                <?php
$modules->GetModule('footertrust');
?>
            </div>
        </div>
    </div>
    <div class="row" id="footerNaviTextRow">
        <div id="footerTextBlock1" class="cmsspot col-xs-12 col-sm-3">
            <?php
            $oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_cms_text_block.mapper.get_text');
$oViewRenderer->AddSourceObject('name', 'footerTextBlock1');
echo $oViewRenderer->Render('/pkgCmsTextBlock/footerWithHeadline.html.twig');
?>
        </div>
        <div id="footerTextBlock2" class="cmsspot col-xs-12 col-sm-3">
            <?php
$oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_cms_text_block.mapper.get_text');
$oViewRenderer->AddSourceObject('name', 'footerTextBlock2');
echo $oViewRenderer->Render('/pkgCmsTextBlock/footerWithHeadline.html.twig');
?>
        </div>
        <div id="footerTextBlock3" class="cmsspot col-xs-12 col-sm-3">
            <?php
$oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_cms_text_block.mapper.get_text');
$oViewRenderer->AddSourceObject('name', 'footerTextBlock3');
echo $oViewRenderer->Render('/pkgCmsTextBlock/footerWithHeadline.html.twig');
?>
        </div>
        <div id="footerTextBlock4" class="cmsspot col-xs-12 col-sm-3">
            <?php
$oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_cms_text_block.mapper.get_text');
$oViewRenderer->AddSourceObject('name', 'footerTextBlock4');
echo $oViewRenderer->Render('/pkgCmsTextBlock/footerWithHeadline.html.twig');
?>
        </div>
     </div>
    <div class="row" id="footerinfoline"><div class="col-xs-12 border">
        <div class="row">
            <div class="col-xs-12 col-sm-4 preiseinfo"><?php echo $translator->trans('chameleon_system_chameleon_shop_theme.layout.footer_price_note', ['%sShippingLink%' => \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_shop.shop_service')->getActiveShop()->GetLinkToSystemPageAsPopUp($translator->trans('chameleon_system_chameleon_shop_theme.layout.footer_shipping'), 'shipping')]); ?></div>
            <div class="col-xs-12 col-sm-8" id="footernavi"><div class="footernavi-inner"><?php $modules->GetModule('footernavi'); ?></div></div>
            <div class="col-xs-12 ga-optout-optin-link" style="display: none">
                <a class="ga-optout-link"><?php echo $translator->trans('chameleon_system_chameleon_shop_theme.google_analytics.opt_out'); ?></a>
                <a class="ga-optin-link"><?php echo $translator->trans('chameleon_system_chameleon_shop_theme.google_analytics.opt_in'); ?></a>
            </div>
        </div>
    </div>
        <div class="col-xs-12">
            <?php
$oViewRenderer = ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_core.mapper.view_port_switch');
echo $oViewRenderer->Render('common/links/linkStylesIconNoFollow.html.twig');
?>
        </div>
    </div>
</footer>