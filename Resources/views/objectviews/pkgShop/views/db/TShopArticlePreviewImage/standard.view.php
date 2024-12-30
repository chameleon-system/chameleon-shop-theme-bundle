<?php
/**
 * used to display a preview image for an article.
 */
/* @var $oArticle TdbShopArticle // the calling article */
/* @var $oArticleSize TdbShopArticleImageSize // the image size to use */
/* @var $oImage TCMSImage // the tcms image to show */
/* @var $oImageThumbnail TCMSImage // the tcms image to show cut to the right size based on the oArticleSize object */
/* @var $oPreviewImage TdbShopArticlePreviewImage - the preview image object */

$sDetailLink = '';
$sDetailLinkSeoName = '';
if ($oArticle->IsVariant()) {
    $oParent = $oArticle->GetFieldVariantParent();
    $sDetailLink = $oParent->getLink();
    $sDetailLinkSeoName = $oParent->GetNameSEO();
} else {
    $sDetailLink = $oArticle->getLink();
    $sDetailLinkSeoName = $oArticle->GetNameSEO();
}
?>
<a href="<?php echo $sDetailLink; ?>">
<?php
  if ('1' == $oArticle->fieldIsNew) {
      echo '<img class="marker" src="/assets/images/icons/new.png" alt="'.TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.marker.new')).'" />';
  }
if ($oArticle->fieldPriceReference > $oArticle->dPrice) {
    $sStyle = '';
    if ('1' == $oArticle->fieldIsNew) {
        $sStyle = 'style="top:14px"';
    }
    echo '<img '.$sStyle.' class="marker" src="/assets/images/icons/sale.png" alt="Sale!" />';
}
?><img class="cover" src="<?php echo $oImageThumbnail->GetFullURL(); ?>" alt="<?php echo TGlobal::OutHTML($oArticle->GetNameSEO()); ?>" border="0" style="margin-top:<?php echo (130 - $oImageThumbnail->aData['height']) / 2; ?>px" height="<?php echo $oImageThumbnail->aData['height']; ?>" /></a>