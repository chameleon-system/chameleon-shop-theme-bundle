<?php
  /*@var $oUserAddress TdbDataExtranetUserAddress */
  /*@var $oExtranetConfig TdbDataExtranet*/
  /*@var $aCallTimeVars array*/
  $oMessageManager = TCMSMessageManager::GetInstance();
  $sAddressName = TdbDataExtranetUserAddress::FORM_DATA_NAME_BILLING;
  if (array_key_exists('sAddressName', $aCallTimeVars)) {
      $sAddressName = $aCallTimeVars['sAddressName'];
  }
  $sAddressName = TGlobal::OutHTML($sAddressName);

?>
<div class="TDataExtranetUserAddress"><div class="form userinput">
    <input type="hidden" name="<?=$sAddressName.'[id]'; ?>" value="<?=TGlobal::OutHTML($oUserAddress->id); ?>" />
    <table summary="">
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_salutation')); ?><span class="required">*</span></th>
        <td>
          <?php
            $oSalutationList = TdbDataExtranetSalutationList::GetList();
            $sSelectedId = $oUserAddress->fieldDataExtranetSalutationId;
            while ($oSalutation = $oSalutationList->Next()) {
                $sSelected = '';
                if ($sSelectedId == $oSalutation->id) {
                    $sSelected = 'checked="checked"';
                }
                echo '<label><input class="plain" '.$sSelected.' type="radio" value="'.TGlobal::OutHTML($oSalutation->id).'" name="'.$sAddressName.'[data_extranet_salutation_id]" />'.TGlobal::OutHTML($oSalutation->GetName()).'</label>';
            }
          ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-data_extranet_salutation_id')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-data_extranet_salutation_id');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_first_name')); ?><span class="required">*</span></th>
        <td>
          <?=TTemplateTools::InputField($sAddressName.'[firstname]', $oUserAddress->fieldFirstname, 310); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-firstname')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-firstname');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_last_name')); ?><span class="required">*</span></th>
        <td>
          <?=TTemplateTools::InputField($sAddressName.'[lastname]', $oUserAddress->fieldLastname, 310); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-lastname')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-lastname');
            }
          ?>
        </td>
      </tr>
       <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_company')); ?></th>
        <td><?=TTemplateTools::InputField($sAddressName.'[company]', $oUserAddress->fieldCompany, 300); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-company')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-company');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_additional_info')); ?></th>
        <td><?=TTemplateTools::InputField($sAddressName.'[address_additional_info]', $oUserAddress->fieldAddressAdditionalInfo, 310); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-address_additional_info')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-address_additional_info');
            }
          ?>
        </td>
      </tr>

      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_street_and_number')); ?><span class="required">*</span></th>
        <td>
          <div style="float:left; width: 240px;">
            <?=TTemplateTools::InputField($sAddressName.'[street]', $oUserAddress->fieldStreet, 270); ?>
          </div>
          <div style="float:right; width: 29px;">
            <?=TTemplateTools::InputField($sAddressName.'[streetnr]', $oUserAddress->fieldStreetnr, 50); ?>
          </div>
          <div class="cleardiv">&nbsp;</div>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-street')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-street');
            }
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-streetnr')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-streetnr');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_zip')); ?><span class="required">*</span></th>
        <td>
          <?=TTemplateTools::InputField($sAddressName.'[postalcode]', $oUserAddress->fieldPostalcode, 310); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-postalcode')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-postalcode');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_city')); ?><span class="required">*</span></th>
        <td>
          <?=TTemplateTools::InputField($sAddressName.'[city]', $oUserAddress->fieldCity, 310); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-city')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-city');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_country')); ?><span class="required">*</span></th>
        <td>
          <?php
            $oCountries = TdbDataCountryList::GetList();
            $oShop = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_shop.shop_service')->getActiveShop();
            $iCountryId = $oUserAddress->fieldDataCountryId;
            if (is_null($iCountryId) || $iCountryId < 1) {
                $iCountryId = $oShop->fieldDataCountryId;
            }
            echo TTemplateTools::DrawDbSelectField($sAddressName.'[data_country_id]', $oCountries, $iCountryId, 281);

            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-data_country_id')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-data_country_id');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_phone')); ?></th>
        <td><?=TTemplateTools::InputField($sAddressName.'[telefon]', $oUserAddress->fieldTelefon, 310); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-telefon')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-telefon');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_fax')); ?></th>
        <td><?=TTemplateTools::InputField($sAddressName.'[fax]', $oUserAddress->fieldFax); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages($sAddressName.'-fax')) {
                echo $oMessageManager->RenderMessages($sAddressName.'-fax');
            }
          ?>
        </td>
      </tr>
    </table>
</div></div>
