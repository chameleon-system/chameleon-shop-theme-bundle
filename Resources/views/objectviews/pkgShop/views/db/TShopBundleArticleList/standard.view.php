<?php
  /*@var $oShopBundleArticleList TdbShopBundleArticleList*/
  /*@var $aCallTimeVars array*/

  if ($oShopBundleArticleList->Length() > 0) {
      ?>
<div class="TShopBundleArticleList"><div class="standard">
  <h4><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.bundle.bundle_content')); ?></h4>
  <?php
    while ($oBundle = &$oShopBundleArticleList->Next()) {
        echo $oBundle->Render('standard', 'Customer', $aCallTimeVars);
    } ?>
</div></div>
<?php
  }
