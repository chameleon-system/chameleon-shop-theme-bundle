<?php

use ChameleonSystem\CoreBundle\ServiceLocator;

$isCmsTemplateEngineEditMode = ServiceLocator::get('chameleon_system_core.request_info_service')->isCmsTemplateEngineEditMode();
    if (true === $isCmsTemplateEngineEditMode) {
        ?>
    <!doctype html>
    <head>
        <!--#CMSHEADERCODE#-->
    </head>
    <body>
<?php
    } ?>
<?php $modules->GetModule('primary'); ?>
<?php if (true === $isCmsTemplateEngineEditMode) {
        ?>
    </body>
    </html>
<?php
    } ?>