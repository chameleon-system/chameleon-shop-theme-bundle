<h1>themeshopstandard - Build #1527064040</h1>
<h2>Date: 2018-05-23</h2>
<div class="changelog">
    - Add schema.org product mapper.
</div>

<?php

$moduleManager = TCMSLogChange::getModuleManager('MTShopArticleDetails');
$mapperConfig = $moduleManager->getMapperConfig();
$mapperConfig->addMapper('productSummaryBox', 'chameleon_system_chameleon_shop_theme.mapper.schema_org_product');

$moduleManager->updateMapperConfig($mapperConfig);
