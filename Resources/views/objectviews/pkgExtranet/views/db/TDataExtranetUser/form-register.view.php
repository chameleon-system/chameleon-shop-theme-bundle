<?php
  /*@var $oUser TdbDataExtranetUser*/
  /*@var $oExtranetConfig TdbDataExtranet*/
  /*@var $aCallTimeVars array*/
  $oMessageManager = TCMSMessageManager::GetInstance();
?>
    <?=$oUser->Render('form-update', 'Customer', $aCallTimeVars); ?>
<br />
  <div class="userinput">
    <table>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_email')); ?>*</th>
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
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_password')); ?>*</th>
        <td><?=TTemplateTools::InputField('aUser[password]', $oUser->fieldPassword, 300, 'maxlength="40"', 'password'); ?></td>
      </tr>
      <tr>
        <th><?=TGlobal::OutHTML(TGlobal::Translate('chameleon_system_chameleon_shop_theme.extranet.form_password_check')); ?>*</th>
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