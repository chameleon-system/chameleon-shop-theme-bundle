<?php
    /** @var $oHotspotConfig TdbPkgImageHotspot */
    /** @var $oActiveItem TdbPkgImageHotspotItem */
    $oViewRenderer = new ViewRenderer();
    $oViewRenderer->AddMapper(new TPkgImageHotspotMapper());
    $oViewRenderer->AddSourceObject('oPkgImageHotspot', $oHotspotConfig);
    $oViewRenderer->AddSourceObject('sActiveItemId', $oActiveItem->id);
    $oViewRenderer->AddSourceObject('sMapperConfig', 'system/presenter-conf');

$oViewRenderer->AddSourceObject(
    'aObjectRenderConfig',
    array(
        'TdbShopArticle' => array(
            'mapper' => array('TPkgShopMapper_ArticleTeaserBase', 'chameleon_system_shop_currency.mapper.shop_currency_mapper'),
            'snippet' => '/common/teaser/horizontal-shopArticle.html.twig',
        ),
        'TdbShopCategory' => array(
            'mapper' => 'TPkgShopMapper_CategoryTeaserBase',
            'snippet' => '/common/teaser/horizontal-base.html.twig',
        ),
        'TdbCmsTplPage' => array(
            'mapper' => 'TPkgCoreTeaserMapper_CmsTplPage',
            'snippet' => '/common/teaser/horizontal-base.html.twig',
        ),
    )
);

echo $oViewRenderer->Render('/pkgImageHotspot/item.html.twig');
