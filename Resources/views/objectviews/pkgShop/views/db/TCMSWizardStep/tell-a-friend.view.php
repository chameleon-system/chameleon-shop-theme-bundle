<?php
  /*@var $oStep TdbCmsWizardStep*/
  /*@var $oArticle TdbShopArticle*/

  $oUser = TdbDataExtranetUser::GetInstance();
  $oExtranetConfig = &TdbDataExtranet::GetInstance();
  $translator = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator');
  $requiredFieldsNotice = $translator->trans('chameleon_system_chameleon_shop_theme.notice_required_fields', array(
    '%requiredFieldsMarker%' => '<span class="required">*</span>',
  ));

  if (is_null($oArticle)) {
      echo TGlobal::OutHTML($translator->trans('chameleon_system_shop_standard.tell_a_friend.no_product'));
  } else {
      ?>
<div class="TCMSWizardStep">
  <div class="tellAFriend">
    <?php
      if (!empty($oStep->fieldName)) {
          echo '<div class="largeHeadline">'.TGlobal::OutHTML($oStep->fieldName).'</div><br />';
      } ?>
    <div style="float: left; margin-right: 15px;">
      <form name="tellAFriend" accept-charset="utf-8" method="post" action="">
        <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($sSpotName); ?>]" value="ExecuteStep" />
        <input type="hidden" name="<?=TGlobal::OutHTML(MTCMSWizardCore::URL_PARAM_STEP_METHOD); ?>" value="" />
        <input type="hidden" name="aInput[<?=TGlobal::OutHTML(MTShopArticleCatalogCore::URL_ITEM_ID); ?>]" value="<?=TGlobal::OutHTML($oArticle->id); ?>" />
        <input type="hidden" name="<?=TGlobal::OutHTML(MTCMSWizardCore::URL_PARAM_MODULE_SPOT); ?>" value="<?=TGlobal::OutHTML($sSpotName); ?>" />

        <table class="tellAFriendTable" summary="">
          <tr>
            <th><?= $translator->trans('chameleon_system_chameleon_shop_theme.tell_a_friend.label_sender_name'); ?><span class="required">*</span></th>
            <td>
              <input class="userinput" type="text" name="aInput[name]" value="<?=TGlobal::OutHTML($aUserInput['name']); ?>" />
              <?php if ($aFieldMessages['name']) {
          echo $aFieldMessages['name'];
      } ?>
            </td>
          </tr>
          <tr>
            <th><?= $translator->trans('chameleon_system_chameleon_shop_theme.tell_a_friend.label_sender_email_address'); ?><span class="required">*</span></th>
            <td>
              <input class="userinput" type="text" name="aInput[email]" value="<?=TGlobal::OutHTML($aUserInput['email']); ?>" />
              <?php if ($aFieldMessages['email']) {
          echo $aFieldMessages['email'];
      } ?>
            </td>
          </tr>
          <tr>
            <th><?= $translator->trans('chameleon_system_chameleon_shop_theme.tell_a_friend.label_recipient_name'); ?><span class="required">*</span></th>
            <td>
              <input class="userinput" type="text" name="aInput[toname]" value="<?=TGlobal::OutHTML($aUserInput['toname']); ?>" />
              <?php if ($aFieldMessages['toname']) {
          echo $aFieldMessages['toname'];
      } ?>
            </td>
          </tr>
          <tr>
            <th><?= $translator->trans('chameleon_system_chameleon_shop_theme.tell_a_friend.label_recipient_email_address'); ?><span class="required">*</span></th>
            <td>
              <input class="userinput" type="text" name="aInput[toemail]" value="<?=TGlobal::OutHTML($aUserInput['toemail']); ?>" />
              <?php if ($aFieldMessages['toemail']) {
          echo $aFieldMessages['toemail'];
      } ?>
            </td>
          </tr>
          <tr>
            <th><?= $translator->trans('chameleon_system_chameleon_shop_theme.tell_a_friend.label_anti_spam'); ?><span class="required">*</span><br />
              <?=TGlobal::OutHTML($aUserInput['captcha-question']); ?></th>
            <td>
              <input class="userinput" type="text" name="aInput[captcha]" value="<?=TGlobal::OutHTML($aUserInput['captcha']); ?>" />
              <?php if ($aFieldMessages['captcha']) {
          echo $aFieldMessages['captcha'];
      } ?>
            </td>
          </tr>
        </table>

        <div class="stepnavibuttons">
          <?= $requiredFieldsNotice; ?>
          <br />&nbsp;<br />
          <div class="formButtonNext"><?php TTemplateTools::SubmitButton($translator->trans('chameleon_system_chameleon_shop_theme.tell_a_friend.action_send_message'), 'document.tellAFriend.submit();', 'button buttonRight'); ?></div>
        </div>
      </form>
    </div>

    <div style="float: left;">
      <?php
        echo $oStep->GetTextField('description');
      echo $oArticle->Render('showcase', 'Customer'); ?>
    </div>


    <div class="cleardiv">&nbsp;</div>
  </div>
</div>

<?php
  } ?>