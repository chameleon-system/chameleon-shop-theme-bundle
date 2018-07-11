<?php
  /** @var $oUserAddress TdbDataExtranetUserAddress */
  /** @var $oExtranetConfig TdbDataExtranet */
  /** @var $aCallTimeVars array */
  $oExtranetConfig = &TdbDataExtranet::GetInstance();
  $translator = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator');

  $bShowShippingAddressInput = '0';
  if (array_key_exists('bShowShippingAddressInput', $aCallTimeVars)) {
      $bShowShippingAddressInput = $aCallTimeVars['bShowShippingAddressInput'];
  }
  $oUser = TdbDataExtranetUser::GetInstance();

  $oCountry = $oUserAddress->GetCountry(true);
  $aName = array();
  $oSal = &$oUserAddress->GetFieldDataExtranetSalutation();
  if (null !== $oSal) {
      $aName[] = TGlobal::OutHTML($oSal->GetName());
  }

  if (!empty($oUserAddress->fieldFirstname)) {
      $aName[] = $oUserAddress->fieldFirstname;
  }
  if (!empty($oUserAddress->fieldLastname)) {
      $aName[] = $oUserAddress->fieldLastname;
  }

  $sFormBaseName = 'sAdresseBlock';
  $sFormSubIdentifier = 'unknown';
  if (array_key_exists('cmsident', $oUserAddress->sqlData)) {
      $sFormSubIdentifier = $oUserAddress->sqlData['cmsident'];
  }
?>
<div class="TDataExtranetUserAddress"><div class="vShowWithActions">
  <div class="adrContent adrContentAction" onclick="document.<?=$sFormBaseName.$sFormSubIdentifier; ?>select.submit();">
    <strong><?=TGlobal::OutHTML(implode(' ', $aName)); ?></strong><br />
    <?php if (!empty($oUserAddress->fieldAddressAdditionalInfo)) {
    echo TGlobal::OutHTML($oUserAddress->fieldAddressAdditionalInfo).'<br />';
} ?>
    <?php if (!empty($oUserAddress->fieldStreet)) {
    echo TGlobal::OutHTML($oUserAddress->fieldStreet.' '.$oUserAddress->fieldStreetnr).'<br />';
} ?>
    <?php if (!empty($oUserAddress->fieldPostalcode) || !empty($oUserAddress->fieldCity)) {
    echo TGlobal::OutHTML($oUserAddress->fieldPostalcode.' '.$oUserAddress->fieldCity).'<br />';
} ?>
    <?php if ($oCountry) {
    echo TGlobal::OutHTML($oCountry->GetName()).'<br />';
} ?>
  </div>
  <div class="adrContent">
    <?php if ($oUserAddress->id != $oUser->fieldDefaultBillingAddressId) {
    ?>
        <form class="withPadding withDot" name="<?=$sFormBaseName.$sFormSubIdentifier.'select2'; ?>" accept-charset="utf-8" method="post" action="">
          <input type="hidden" name="bShowShippingAddressInput" value="<?=$bShowShippingAddressInput; ?>" />
          <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($oExtranetConfig->fieldExtranetSpotName); ?>]" value="SelectShippingAddress" />
          <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($aCallTimeVars['sSpotName']); ?>]" value="" />
          <input type="hidden" name="<?=TGlobal::OutHTML($aCallTimeVars['sWizardMethodParameterName']); ?>" value="" />
          <input type="hidden" name="<?=TGlobal::OutHTML($aCallTimeVars['sWizardSpotParameterName']); ?>" value="<?=TGlobal::OutHTML($aCallTimeVars['sSpotName']); ?>" />
          <input type="hidden" name="<?=$aCallTimeVars['sFieldName']; ?>[selectedAddressId]" value="<?=$oUserAddress->id; ?>" />
          <?php TTemplateTools::SubmitButton($translator->trans('chameleon_system_chameleon_shop_theme.extranet.action_edit_address'), 'document.'.$sFormBaseName.$sFormSubIdentifier.'select2.submit()', ''); ?>
        </form>

      <form class="withPadding" name="<?=$sFormBaseName.$sFormSubIdentifier.'delete'; ?>" accept-charset="utf-8" method="post" action="">
        <input type="hidden" name="bShowShippingAddressInput" value="<?=$bShowShippingAddressInput; ?>" />
        <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($oExtranetConfig->fieldExtranetSpotName); ?>]" value="DeleteShippingAddress" />
        <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($aCallTimeVars['sSpotName']); ?>]" value="" />
        <input type="hidden" name="<?=TGlobal::OutHTML($aCallTimeVars['sWizardMethodParameterName']); ?>" value="" />
        <input type="hidden" name="<?=TGlobal::OutHTML($aCallTimeVars['sWizardSpotParameterName']); ?>" value="<?=TGlobal::OutHTML($aCallTimeVars['sSpotName']); ?>" />
        <input type="hidden" name="<?=$aCallTimeVars['sFieldName']; ?>[selectedAddressId]" value="<?=$oUserAddress->id; ?>" />
        <?php TTemplateTools::SubmitButton($translator->trans('chameleon_system_chameleon_shop_theme.extranet.action_delete_address'), 'document.'.$sFormBaseName.$sFormSubIdentifier.'delete.submit()', ''); ?>
      </form>
      <div class="cleardiv">&nbsp;</div>
    <?php
} ?>
  </div>
  <form name="<?=$sFormBaseName.$sFormSubIdentifier.'select'; ?>" accept-charset="utf-8" method="post" action="" style="padding-top:10px;padding-bottom:0px;padding-right:0px">
    <input type="hidden" name="bShowShippingAddressInput" value="<?=$bShowShippingAddressInput; ?>" />
    <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($oExtranetConfig->fieldExtranetSpotName); ?>]" value="SelectShippingAddress" />
    <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($aCallTimeVars['sSpotName']); ?>]" value="" />
    <input type="hidden" name="<?=TGlobal::OutHTML($aCallTimeVars['sWizardMethodParameterName']); ?>" value="" />
    <input type="hidden" name="<?=TGlobal::OutHTML($aCallTimeVars['sWizardSpotParameterName']); ?>" value="<?=TGlobal::OutHTML($aCallTimeVars['sSpotName']); ?>" />
    <input type="hidden" name="sRedirectToURL" value="<?=TGlobal::OutHTML($aCallTimeVars['sSuccessURL']); ?>" />
    <input type="hidden" name="<?=$aCallTimeVars['sFieldName']; ?>[selectedAddressId]" value="<?=$oUserAddress->id; ?>" />
    <?php TTemplateTools::SubmitButton($translator->trans('chameleon_system_chameleon_shop_theme.extranet.action_use_for_shipping'), 'document.'.$sFormBaseName.$sFormSubIdentifier.'select.submit()', 'buttonFlat buttonRight'); ?>
    <div class="cleardiv"></div>
  </form>
</div></div>