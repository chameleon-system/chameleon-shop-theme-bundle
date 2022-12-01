<?php
  $oInfos = $data['oInfos']; /*@var $oInfos TdbShopSystemInfoList */
  $oConf = $data['oConf']; /*@var $oConf TdbShopSystemInfoModuleConfig */

?>
  <div class="shopinfopage">
    <?php
      if (!empty($oConf->fieldName)) {
          echo '<h1 class="largeHeadline">'.TGlobal::OutHTML($oConf->fieldName)."</h1><br />\n";
      }

      $sIntoText = $oConf->GetTextField('intro');
      if (!empty($sIntoText)) {
          echo "<div class=\"intro\">{$sIntoText}</div><br />\n";
      }

      while ($oInfo = $oInfos->Next()) {
          echo $oInfo->Render('standard', 'Customer');
      }

    ?>
  </div>