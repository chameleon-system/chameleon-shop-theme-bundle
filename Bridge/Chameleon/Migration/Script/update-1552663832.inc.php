<h1>Build #1552663832</h1>
<h2>Date: 2019-03-15</h2>
<div class="changelog">
    - fix english name of image crop preset after field was made multilingual
</div>
<?php
TCMSLogChange::requireBundleUpdates('ChameleonSystemImageCropBundle', 1552663534);

$data = TCMSLogChange::createMigrationQueryData('cms_image_crop_preset', 'en')
    ->setFields(
        [
            'name' => 'Default Teaser (used in product lists for example)',
        ]
    )->setWhereEquals(['system_name' => 'snippetTeaserStandardBase']);
TCMSLogChange::update(__LINE__, $data);
