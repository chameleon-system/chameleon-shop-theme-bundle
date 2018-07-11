<h1>update - Build #1499326338</h1>
<h2>Date: 2017-07-06</h2>
<div class="changelog">
    - in each template: copy spot minibasket to minibasketmobile and set template to mobile
</div>
<?php
$dbConnection = TCMSLogChange::getDatabaseConnection();
$stmt = $dbConnection->query("SELECT * FROM `cms_master_pagedef_spot` WHERE `name` = 'minibasket'");

while ($row = $stmt->fetch()) {
    $data = TCMSLogChange::createMigrationQueryData('cms_master_pagedef_spot', 'de')
        ->setFields(array(
            'cms_master_pagedef_id' => $row['cms_master_pagedef_id'],
            'pkg_cms_theme_block_id' => $row['pkg_cms_theme_block_id'],
            'name' => 'minibasketmobile',
            'model' => 'MTShopBasket',
            'view' => 'mobile',
            'static' => '1',
            'id' => TCMSLogChange::createUnusedRecordId('cms_master_pagedef_spot'),
        ))
    ;
    TCMSLogChange::insert(__LINE__, $data);
}
