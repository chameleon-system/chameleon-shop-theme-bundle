<div class="TShopOrderItem"><div class="vCompact">
<?php
  /*@var $oOrderItem TdbShopOrderItem*/
  /*@var $aCallTimeVars array*/

  $oOriginalArticle = $oOrderItem->GetFieldShopArticle();
  $oLocal = TCMSLocal::GetActive();

  echo TGlobal::OutHTML($oLocal->FormatNumber($oOrderItem->fieldOrderAmount, 0).' '.$oOrderItem->fieldName);
  if ($oOriginalArticle) {
      echo ' <a href="'.$oOriginalArticle->GetToBasketLink().'">'.TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order.reorder_item')).'</a>.<a href="'.$oOriginalArticle->GetToWishlistLink().'">'.TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.order.add_to_wish_list')).'</a>';
  }
?>
</div></div>
