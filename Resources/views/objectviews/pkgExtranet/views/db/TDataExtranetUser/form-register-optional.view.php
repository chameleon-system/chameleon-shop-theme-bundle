<?php
  /*@var $oUser TdbDataExtranetUser*/
  /*@var $oExtranetConfig TdbDataExtranet*/
  /*@var $aCallTimeVars array*/
  $oMessageManager = TCMSMessageManager::GetInstance();

  $oUser->Render('form-update', 'Customer', $aCallTimeVars);
?>
  <div class="userinput">
    <table summary="">
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_email')); ?><span class="required">*</span></th>
        <td>
          <?=TTemplateTools::InputField('aUser[name]', $oUser->fieldName, 300); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-name')) {
                $oMessages = $oMessageManager->ConsumeMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-name');
                while ($oMessage = $oMessages->Next()) {
                    echo $oMessage->Render();
                }
            }
          ?>
        </td>
      </tr>
      <tr>
        <td colspan="2"><label><input class="plain" type="checkbox" checked="checked" value="Register" name="module_fnc[<?=TGlobal::OutHTML($oExtranetConfig->fieldExtranetSpotName); ?>]" /> <?=\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_create_account'); ?></label></td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_password')); ?></th>
        <td><?=TTemplateTools::InputField('aUser[password]', null, 300, 'maxlength="40"', 'password'); ?></td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.extranet.form_password_check')); ?><span class="required">*</span></th>
        <td>
          <?=TTemplateTools::InputField('aUser[password2]', null, 300, 'maxlength="40"', 'password'); ?>
          <?php
            if ($oMessageManager->ConsumerHasMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-password')) {
                $oMessages = $oMessageManager->ConsumeMessages(TdbDataExtranetUser::MSG_FORM_FIELD.'-password');
                while ($oMessage = $oMessages->Next()) {
                    echo $oMessage->Render();
                }
            }
          ?>
        </td>
      </tr>
    </table>

  </div>