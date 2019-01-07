<h1>Build #1546858291</h1>
<h2>Date: 2019-01-07</h2>
<div class="changelog">
    - add image crop preset for default teaser
</div>
<?php
TCMSLogChange::requireBundleUpdates('ChameleonSystemImageCropBundle', 1534864767);

$databaseConnection = TCMSLogChange::getDatabaseConnection();
$highestPosition = (int) $databaseConnection->fetchColumn('SELECT MAX(`position`) FROM `cms_image_crop_preset`');

$data = TCMSLogChange::createMigrationQueryData('cms_image_crop_preset', 'de')
    ->setFields(
        [
            'name' => 'Standard-Teaser',
            'width' => '324',
            'height' => '450',
            'system_name' => 'snippetTeaserStandardBase',
            'position' => $highestPosition++,
            'id' => TCMSLogChange::createUnusedRecordId('cms_image_crop_preset'),
        ]
    );
TCMSLogChange::insert(__LINE__, $data);
