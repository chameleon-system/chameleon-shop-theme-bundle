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
            'id' => '240b9fd8-1546-bcca-73f1-20af946f249f',
        ]
    );
TCMSLogChange::insert(__LINE__, $data);
