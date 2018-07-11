<?php
  /*@var $oUser TdbDataExtranetUser*/
  /*@var $oExtranetConfig TdbDataExtranet*/
  /*@var $aCallTimeVars array*/

  $sSpotName = '';
  if (array_key_exists('sSpotName', $aCallTimeVars)) {
      $sSpotName = $aCallTimeVars['sSpotName'];
  } else {
      echo 'You must pass the name of the module spot in aCallTimeVars!';
  }

  $sConsumer = $sSpotName.'-form';
  if (array_key_exists('sConsumer', $aCallTimeVars)) {
      $sConsumer = $aCallTimeVars['sConsumer'];
  }

  $oMessageManager = TCMSMessageManager::GetInstance();
  $translator = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator');
  ?>
  <div class="TDataExtranetUser">
    <div class="vLoginBasket">
      <form name="loginBox<?=$sSpotName; ?>" method="post" action="" accept-charset="UTF-8">

      <div class="box">
        <div class="mediumHeadline"><?= $translator->trans('chameleon_system_chameleon_shop_theme.order_login.existing_customer_help'); ?></div>
        <br />
        <input type="hidden" name="module_fnc[<?=TGlobal::OutHTML($sSpotName); ?>]" value="Login" />
        <input type="hidden" name="spwdhash" value="" />
        <input type="hidden" name="sConsumer" value="<?=TGlobal::OutHTML($sConsumer); ?>" />

        <?php if (array_key_exists('sFailureURL', $aCallTimeVars)) {
      ?><input type="hidden" name="sFailureURL" value="<?=TGlobal::OutHTML($aCallTimeVars['sFailureURL']); ?>" /><?php
  } ?>
        <?php if (array_key_exists('sSuccessURL', $aCallTimeVars)) {
      ?><input type="hidden" name="sSuccessURL" value="<?=TGlobal::OutHTML($aCallTimeVars['sSuccessURL']); ?>" /><?php
  } ?>

        <!--<div class="email"><input type="text" class="email" name="slogin" value="" /></div>-->

        <table class="userinput" summary="">
          <tr>
           <th><?= $translator->trans('chameleon_system_chameleon_shop_theme.extranet.form_email'); ?></th>
           <td><input class="userinput" type="text" name="slogin" value="" /></td>
          </tr>
          <tr>
           <th><?= $translator->trans('chameleon_system_chameleon_shop_theme.extranet.form_password'); ?></th>
           <td><input class="userinput" type="password" name="password" value="" /></td>
          </tr>
          <tr>
            <th>&nbsp;</th>
            <td><a href="<?=$oExtranetConfig->GetLinkForgotPasswordPage(); ?>" rel="nofollow"><?= $translator->trans('chameleon_system_chameleon_shop_theme.extranet.question_reset_password'); ?></a></td>
          </tr>
        </table>


        <?php
          if ($oMessageManager->ConsumerHasMessages(TGlobal::OutHTML($sConsumer))) {
              echo $oMessageManager->RenderMessages($sConsumer);
          }
        ?>
        <div style="overflow: hidden; width: 1px; height: 1px; position: relative;"><input type="submit" name="dummy" style="position: relative; left: 10px; top: 10px;"/></div>
      </div>
      <br />
          <input type="submit" name="" value="<?= $translator->trans('chameleon_system_chameleon_shop_theme.extranet.action_login'); ?>" class="button buttonRight">
      <div class="cleardiv">&nbsp;</div>
      <br />
      <br />

    </form>
    </div>
  </div>