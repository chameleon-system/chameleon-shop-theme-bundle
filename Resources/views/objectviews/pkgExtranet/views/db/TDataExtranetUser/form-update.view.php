<?php
  /*@var $oUser TdbDataExtranetUser*/
  /*@var $oExtranetConfig TdbDataExtranet*/
  /*@var $aCallTimeVars array*/
  $oMessageManager = TCMSMessageManager::GetInstance();
  $oLocal = TCMSLocal::GetActive();
?>
  <?php if (array_key_exists('sFailureURL', $aCallTimeVars)) {
    ?><input type="hidden" name="sFailureURL" value="<?=TGlobal::OutHTML($aCallTimeVars['sFailureURL']); ?>" /><?php
} ?>
  <?php if (array_key_exists('sSuccessURL', $aCallTimeVars)) {
        ?><input type="hidden" name="sSuccessURL" value="<?=TGlobal::OutHTML($aCallTimeVars['sSuccessURL']); ?>" /><?php
    } ?>
  <div class="userinput">
    <table summary="">
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_salutation')); ?><span class="required">*</span></th>
        <td>
          <?php
            $oSalutationList = TdbDataExtranetSalutationList::GetList();
            $sSelectedId = $oUser->fieldDataExtranetSalutationId;
            while ($oSalutation = $oSalutationList->Next()) {
                $sSelected = '';
                if ($sSelectedId == $oSalutation->id) {
                    $sSelected = 'checked="checked"';
                }
                echo '<label><input class="plain" '.$sSelected.' type="radio" value="'.TGlobal::OutHTML($oSalutation->id).'" name="aUser[data_extranet_salutation_id]" />'.TGlobal::OutHTML($oSalutation->GetName()).'</label>';
            }
          ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-data_extranet_salutation_id')) {
                echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-data_extranet_salutation_id');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_first_name')); ?><span class="required">*</span></th>
        <td>
          <div style="float:left; width: 300px;">
            <?=TTemplateTools::InputField('aUser[firstname]', $oUser->fieldFirstname, 300); ?>
            <?php
              if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-firstname')) {
                  echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-firstname');
              }
            ?>
          </div>
          <div class="cleardiv">&nbsp;</div>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_last_name')); ?><span class="required">*</span></th>
        <td>
          <div style="float:left; width: 300px;">
            <?=TTemplateTools::InputField('aUser[lastname]', $oUser->fieldLastname, 300); ?>
            <?php
              if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-lastname')) {
                  echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-lastname');
              }
            ?>
          </div>
          <div class="cleardiv">&nbsp;</div>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_company')); ?></th>
        <td><?=TTemplateTools::InputField('aUser[company]', $oUser->fieldCompany, 300); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-company')) {
                echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-company');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_additional_info')); ?></th>
        <td><?=TTemplateTools::InputField('aUser[address_additional_info]', $oUser->fieldAddressAdditionalInfo, 300); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-address_additional_info')) {
                echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-address_additional_info');
            }
          ?>
        </td>
      </tr>

      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_street_and_number')); ?><span class="required">*</span></th>
        <td>
          <div style="float:left; width: 240px;">
            <?=TTemplateTools::InputField('aUser[street]', $oUser->fieldStreet, 240); ?>
          </div>
          <div style="float:left; padding-left: 10px; width: 50px;">
            <?=TTemplateTools::InputField('aUser[streetnr]', $oUser->fieldStreetnr, 50); ?>
          </div>
          <div class="cleardiv">&nbsp;</div>
          <?php
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-street')) {
                echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-street');
            }
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-streetnr')) {
                echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-streetnr');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_zip')); ?><span class="required">*</span></th>
        <td>
          <div style="float:left; width: 300px;">
            <?=TTemplateTools::InputField('aUser[postalcode]', $oUser->fieldPostalcode, 300); ?>
            <?php
              if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-postalcode')) {
                  echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-postalcode');
              }
            ?>
          </div>
          <div class="cleardiv">&nbsp;</div>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_city')); ?><span class="required">*</span></th>
        <td>
          <div style="float:left; width: 300px;">
            <?=TTemplateTools::InputField('aUser[city]', $oUser->fieldCity, 300); ?>
            <?php
              if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-city')) {
                  echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-city');
              }
            ?>
          </div>
          <div class="cleardiv">&nbsp;</div>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_date_of_birth')); ?></th>
        <td>
          <div style="float:left; width: 300px;">
            <?=TTemplateTools::InputField('aUser[birthdate]', $oUser->fieldBirthdate, 300); ?>
            <?php
              if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-birthdate')) {
                  echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-birthdate');
              }
            ?>
          </div>
          <div class="cleardiv">&nbsp;</div>
        </td>
      </tr>

      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_country')); ?><span class="required">*</span></th>
        <td>
          <?php
            $oCountries = TdbDataCountryList::GetList();
            $oShop = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_shop.shop_service')->getActiveShop();
            $iCountryId = $oUser->fieldDataCountryId;
            if (is_null($iCountryId) || $iCountryId < 1) {
                $iCountryId = $oShop->fieldDataCountryId;
            }
            echo TTemplateTools::DrawDBSelectField('aUser[data_country_id]', $oCountries, $iCountryId, 280);
          ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-data_country_id')) {
                echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-data_country_id');
            }
          ?>
        </td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_phone')); ?></th>
        <td><?=TTemplateTools::InputField('aUser[telefon]', $oUser->fieldTelefon, 300); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-telefon')) {
                echo $oMessageManager->RenderMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-telefon');
            }
          ?>
        </td>
      </tr>
    </table>
  </div>