<?php

/** @var $oArticleList TdbShopArticleList */
/** @var $sViewIdentKey string */
/** @var $aCallTimeVars array */
$sOrderByString = (is_array($aCallTimeVars) && isset($aCallTimeVars['sOrderByString'])) ? ($aCallTimeVars['sOrderByString']) : (false);

$oViewRender = new ViewRenderer();
$oViewRender->addMapperFromIdentifier('chameleon_system_shop_currency.mapper.shop_currency_mapper');
$oViewRender->addMapperFromIdentifier('chameleon_system_shop.mapper.list.article_list_pager');
$oViewRender->addMapperFromIdentifier('chameleon_system_shop.mapper.list.article_list_header');
$oViewRender->addMapperFromIdentifier('chameleon_system_shop.mapper.list.article_list_result_info');

$oViewRender->AddSourceObject('sListOptionSort', $sOrderByString);

$oViewRender->AddSourceObject('oList', $oArticleList);
$oViewRender->AddSourceObject('listIdent', $sViewIdentKey);
$oViewRender->generateSourceObjectForObjectList(
    'aArticleList', // target name
    'oList', // from
    'oObject', // as
    '/common/teaser/standard-with-hover.html.twig', // with this view
    array(
        'chameleon_system_shop_currency.mapper.shop_currency_mapper',
        'TPkgShopMapper_ArticleTeaserBase',
        'chameleon_system_shop.mapper.notice_list.article_add',
        'TPkgShopMapper_ArticleQuickShopLink',
        'TPkgShopMapper_ArticleRatingAverage',
        'TPkgShopMapper_ArticleShippingTime',
    ) // using the following mappers
);
echo $oViewRender->Render('/common/lists/listExtendedShopArticle.html.twig');
