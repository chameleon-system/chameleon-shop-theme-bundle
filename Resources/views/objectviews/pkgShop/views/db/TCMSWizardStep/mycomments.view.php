<?php
  /*@var $oStep TdbCmsWizardStep*/

  $oUser = TdbDataExtranetUser::GetInstance();
  $oReviews = $oUser->GetFieldShopArticleReviewList();

?>
<div class="step">
  <?php
    if (!empty($oStep->fieldName)) {
        echo '<h2>'.TGlobal::OutHTML($oStep->fieldName).'</h2>';
    }
    echo $oStep->GetTextField('description');

  ?>
  <div class="cleardiv">&nbsp;</div>
  <form name="stepform<?=$oStep->sqlData['cmsident']; ?>" accept-charset="utf-8" method="post" action="">
    <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($sSpotName); ?>]" value="ExecuteStep" />
    <input type="hidden" name="<?=TGlobal::OutHTML(MTCMSWizardCore::URL_PARAM_STEP_METHOD); ?>" value="" />
    <input type="hidden" name="<?=TGlobal::OutHTML(MTCMSWizardCore::URL_PARAM_MODULE_SPOT); ?>" value="<?=TGlobal::OutHTML($sSpotName); ?>" />

    <?php
    while ($oReview = $oReviews->Next()) {
        echo $oReview->Render('owner', 'Customer');
    }
    ?>




    <div class="stepnavibuttons">
      <?php if (!is_null($oStepNext)) {
        ?><div class="formButtonNext"><input type="submit" value="<?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.comments.next_page')); ?>" /></div><?php
    } ?>
      <?php if ($sBackLink) {
        ?><div class="formButtonBack"><a href="<?=$sBackLink; ?>" class="backLink"><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.comments.previous_page')); ?></a></div><?php
    } ?>
    </div>
  </form>

</div>

