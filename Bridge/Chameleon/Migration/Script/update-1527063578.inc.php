<h1>themeshopstandard - Build #1527063578</h1>
<h2>Date: 2018-05-23</h2>
<div class="changelog">
    - Set service IDs for mappers in fullWide mapper chain.
</div>

<?php

$moduleManager = TCMSLogChange::getModuleManager('chameleon_system_shop.module.article_list');
$mapperConfig = $moduleManager->getMapperConfig();
$mapperConfig->replaceMapper('\ChameleonSystem\ShopBundle\objects\ArticleList\Mapper\ItemMapperStandard', 'chameleon_system_shop.mapper.objects.article_list.item_mapper_standard');
$mapperConfig->replaceMapper('\ChameleonSystem\ShopBundle\objects\ArticleList\Mapper\ArticleListLegacyMapper', 'chameleon_system_shop.mapper.objects.article_list.article_list_legacy');
$mapperConfig->replaceMapper('TPkgShopCurrencyMapper', 'chameleon_system_shop_currency.mapper.shop_currency_mapper');
$mapperConfig->replaceMapper('TPkgShopMapper_ArticleListPager', 'chameleon_system_shop.mapper.list.article_list_pager');
$mapperConfig->replaceMapper('TPkgShopMapper_ArticleListHeader', 'chameleon_system_shop.mapper.list.article_list_header');
$mapperConfig->replaceMapper('TPkgShopMapper_ArticleListResultInfo', 'chameleon_system_shop.mapper.list.article_list_result_info');

$moduleManager->updateMapperConfig($mapperConfig);
