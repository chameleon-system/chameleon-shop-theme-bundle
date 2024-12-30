<?php
$sFormEmailValue = TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.newsletter.form_sign_up_email'));
?>
<div class="MTNewsletterQuickSignupForm"><div class="standard">
<form name="newsletterquicksignupform" action="<?=TGlobal::OutHTML($sNewsletterLink); ?>" method="get" accept-charset="utf-8">
  <input type="hidden" value="ExecuteStep" name="module_fnc[spota]"/>
  <span class="colorcodewhite"><strong><?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.newsletter.form_newsletter')); ?></strong></span>
  <div class="inputSearch"><input class="slim" type="text" name="aNewsletter[email]" value="<?=$sFormEmailValue; ?>" onfocus="if (this.value =='<?=$sFormEmailValue; ?>') this.value='';" onblur="if (this.value=='') this.value='<?=$sFormEmailValue; ?>';" /></div>
  <div class="inputSubmit"><input type="image" src="/assets/images/icons/arrow_square.png" title="<?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.newsletter.action_signup')); ?>" value="" /></div>
</form>
</div></div>