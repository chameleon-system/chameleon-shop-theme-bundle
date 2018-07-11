<h1>themeshopstandard - Build #1495178398</h1>
<h2>Date: 2017-05-19</h2>
<div class="changelog">
    - #35884: adds new fullWide template to product list module
</div>

<?php

$moduleManager = TCMSLogChange::getModuleManager('chameleon_system_shop.module.article_list');

$moduleManager->addMapperChain(
    'fullWide',
    [
        '\ChameleonSystem\ShopBundle\objects\ArticleList\Mapper\ItemMapperStandard',
        '\ChameleonSystem\ShopBundle\objects\ArticleList\Mapper\ArticleListLegacyMapper',
        'TPkgShopCurrencyMapper',
        'TPkgShopMapper_ArticleListPager',
        'TPkgShopMapper_ArticleListHeader',
        'TPkgShopMapper_ArticleListResultInfo',
    ]
);

$mapperConfig = $moduleManager->getMapperConfig();
$mapperConfig->addConfig('fullWide', 'pkgShop/ArticleList/full.html.twig', []);

$moduleManager->updateMapperConfig($mapperConfig);

$data = TCMSLogChange::createMigrationQueryData('cms_tpl_module', 'de')
    ->setFields(array(
        'name' => 'Produkt-Liste',
    ))
    ->setWhereEquals(array(
        'classname' => 'chameleon_system_shop.module.article_list',
    ))
;
TCMSLogChange::update(__LINE__, $data);
