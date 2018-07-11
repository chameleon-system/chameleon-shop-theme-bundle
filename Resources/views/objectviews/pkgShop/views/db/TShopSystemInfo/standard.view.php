<?php
  /*@var $oInfo TdbShopSystemInfo*/
?>
<div class="ShopSystemInfoItem">
  <?php
    if (!empty($oInfo->fieldTitel)) {
        echo '<h2 class="largeHeadline">'.TGlobal::OutHTML($oInfo->fieldTitel).'</h2><br />';
    }
    echo $oInfo->GetTextField('content');
  ?>
</div>