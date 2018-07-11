<?php if (TGlobal::IsCMSTemplateEngineEditMode()) {
    ?>
    <!doctype html>
    <head>
        <!--#CMSHEADERCODE#-->
    </head>
    <body>
<?php
} ?>
<?php $modules->GetModule('primary'); ?>
<?php if (TGlobal::IsCMSTemplateEngineEditMode()) {
        ?>
    </body>
    </html>
<?php
    } ?>