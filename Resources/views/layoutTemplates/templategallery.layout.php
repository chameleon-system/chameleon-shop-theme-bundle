<?php
/** @var $modules TModuleLoader* */
$sLayoutName = substr(basename(__FILE__), 0, strpos(basename(__FILE__), '.'));
$aHeadIncludes = array();

include __DIR__.'/page-skeleton/html-header.inc.php';
?>

<?=$modules->GetModule('spota', true, '<div class="spotCenter1"><div style=" margin-bottom: 20px;">[{content}]</div></div>'); ?>

    </body>
</html>