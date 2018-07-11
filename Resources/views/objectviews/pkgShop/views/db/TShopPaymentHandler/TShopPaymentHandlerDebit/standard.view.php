<?php
  /*@var $oShop TdbShop*/
  /*@var $oPaymentHandler TdbShopPaymentHandler*/
  /*@var $aCallTimeVars array*/
  $oMsgManager = TCMSMessageManager::GetInstance();
  $translator = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator');
?>
<div class="smallHeadline"><?=TGlobal::OutHTML($translator->trans('chameleon_system_chameleon_shop_theme.payment.form_debit_headline')); ?></div>
<br />

<table summary="">
  <tr>
    <th><?=TGlobal::OutHTML($translator->trans('chameleon_system_chameleon_shop_theme.payment.form_debit_account')); ?><span class="required">*</span></th>
    <td onclick="document.getElementById('labelHookId<?=$aCallTimeVars['iPaymentMethodId']; ?>').checked='checked'">
      <?=TTemplateTools::InputField(TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[iban]', $aUserPaymentData['iban'], 200); ?>
      <?php
        if ($oMsgManager->ConsumerHasMessages(TShopPaymentHandlerDebit::MSG_MANAGER_NAME.'-iban')) {
            echo $oMsgManager->RenderMessages(TShopPaymentHandlerDebit::MSG_MANAGER_NAME.'-iban');
        }
      ?>
    </td>
  </tr>
  <tr>
    <th><?=TGlobal::OutHTML($translator->trans('chameleon_system_chameleon_shop_theme.payment.form_debit_bank')); ?><span class="required">*</span></th>
    <td onclick="document.getElementById('labelHookId<?=$aCallTimeVars['iPaymentMethodId']; ?>').checked='checked'">
      <?=TTemplateTools::InputField(TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[bic]', $aUserPaymentData['bic'], 200); ?>
      <?php
        if ($oMsgManager->ConsumerHasMessages(TShopPaymentHandlerDebit::MSG_MANAGER_NAME.'-bic')) {
            echo $oMsgManager->RenderMessages(TShopPaymentHandlerDebit::MSG_MANAGER_NAME.'-bic');
        }
      ?>
    </td>
  </tr>
</table>
<div><?=TGlobal::OutHTML($translator->trans('chameleon_system_chameleon_shop_theme.payment.form_debit_shipping')); ?></div>
