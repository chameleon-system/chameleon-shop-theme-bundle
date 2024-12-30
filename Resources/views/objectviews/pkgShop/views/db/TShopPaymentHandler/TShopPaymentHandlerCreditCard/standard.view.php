<?php
  /** @var $oShop TdbShop */
  /** @var $oPaymentHandler TdbShopPaymentHandler */
  /** @var $aCallTimeVars array */
  $oMsgManager = TCMSMessageManager::GetInstance();
?>
<table summary="">
  <tr>
    <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.payment.form_card_type')); ?><span class="required">*</span></th>
    <td onclick="document.getElementById('labelHookId<?=$aCallTimeVars['iPaymentMethodId']; ?>').checked='checked'">
      <?php
        $sSelected = '';
        if (array_key_exists('creditCardType', $aUserPaymentData) && 'Mastercard' == $aUserPaymentData['creditCardType']) {
            $sSelected = 'selected="selected"';
        }
        echo '<label><input class="plain" type="radio" value="Mastercard" '.$sSelected.' name="'.TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[creditCardType]" /> <img src="/assets/images/icons/mastercard.png" alt="Mastercard" border="0" /></label>';
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        if (array_key_exists('creditCardType', $aUserPaymentData) && 'Visa' == $aUserPaymentData['creditCardType']) {
            $sSelected = 'selected="selected"';
        }
        echo '<label><input class="plain" type="radio" value="Visa" '.$sSelected.' name="'.TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[creditCardType]" />  <img src="/assets/images/icons/visa.png" alt="Visa" border="0" /></label>';
      //TTemplateTools::SelectField(TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[creditCardType]', array('Mastercard'=>'Mastercard','Visa'=>'Visa'), 364, $aUserPaymentData['creditCardType'])
      ?>

      <?php
        if ($oMsgManager->ConsumerHasMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardType')) {
            echo $oMsgManager->RenderMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardType');
        }
      ?>
    </td>
  </tr>
  <tr>
    <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.payment.form_card_number')); ?><span class="required">*</span></th>
    <td onclick="document.getElementById('labelHookId<?=$aCallTimeVars['iPaymentMethodId']; ?>').checked='checked'">
      <?=TTemplateTools::InputField(TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[creditCardNumber]', $aUserPaymentData['creditCardNumber'], 170); ?>
      <?php
        if ($oMsgManager->ConsumerHasMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardNumber')) {
            echo $oMsgManager->RenderMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardNumber');
        }
      ?>
    </td>
  </tr>
  <tr>
    <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.payment.form_card_owner')); ?><span class="required">*</span></th>
    <td onclick="document.getElementById('labelHookId<?=$aCallTimeVars['iPaymentMethodId']; ?>').checked='checked'">
      <?=TTemplateTools::InputField(TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[creditCardOwnerName]', $aUserPaymentData['creditCardOwnerName'], 170); ?>
      <?php
        if ($oMsgManager->ConsumerHasMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardOwnerName')) {
            echo $oMsgManager->RenderMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardOwnerName');
        }
      ?>
    </td>
  </tr>
  <tr>
    <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.payment.form_card_valid_until')); ?><span class="required">*</span></th>
    <td onclick="document.getElementById('labelHookId<?=$aCallTimeVars['iPaymentMethodId']; ?>').checked='checked'">
      <?php
        $aMonth = array('1' => '01', '2' => '02', '3' => '03', '4' => '04', '5' => '05', '6' => '06', '7' => '07', '8' => '08', '9' => '09', '10' => '10', '11' => '11', '12' => '12');
        $iYear = date('Y');
        $aYear = array($iYear => $iYear, $iYear + 1 => $iYear + 1,
                       $iYear + 2 => $iYear + 2, $iYear + 3 => $iYear + 3,
                       $iYear + 4 => $iYear + 4, $iYear + 5 => $iYear + 5,
                       $iYear + 6 => $iYear + 6, );

        echo TTemplateTools::SelectField(TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[creditCardValidToMonth]', $aMonth, 75, $aUserPaymentData['creditCardValidToMonth']);

        echo TTemplateTools::SelectField(TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[creditCardValidToYear]', $aYear, 72, $aUserPaymentData['creditCardValidToYear']);

        if ($oMsgManager->ConsumerHasMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardValidToMonth')) {
            echo $oMsgManager->RenderMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardValidToMonth');
        }
        if ($oMsgManager->ConsumerHasMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardValidToYear')) {
            echo $oMsgManager->RenderMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardValidToYear');
        }
      ?>
    </td>
  </tr>
  <tr>
    <th><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.payment.form_card_checksum')); ?><span class="required">*</span></th>
    <td onclick="document.getElementById('labelHookId<?=$aCallTimeVars['iPaymentMethodId']; ?>').checked='checked'">
      <?=TTemplateTools::InputField(TdbShopPaymentHandler::URL_PAYMENT_USER_INPUT.'[creditCardChecksum]', $aUserPaymentData['creditCardChecksum'], 85); ?>
      <?php
        if ($oMsgManager->ConsumerHasMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardChecksum')) {
            echo $oMsgManager->RenderMessages(TShopPaymentHandlerCreditCard::MSG_MANAGER_NAME.'-creditCardChecksum');
        }
      ?>
    </td>
  </tr>
</table>
<div><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.payment.form_card_shipping')); ?></div>
