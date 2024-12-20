<?php
/**
 * shows an article preview inc category.
 *
 * @var $oArticle      TdbShopArticle
 * @var $sMessages     string
 * @var $aCallTimeVars array
 */
$oLocal = TCMSLocal::GetActive();
$sDetailLink = $oArticle->getLink(true);

$sInfoText = $oArticle->fieldUsp;
if (empty($sInfoText)) {
    $sInfoText = $oArticle->fieldSubtitle;
}

$oManufacturer = $oArticle->GetFieldShopManufacturer();

$oImages = $oArticle->GetFieldShopArticleImageList();

?>
<entry>
  <title><?php echo $oArticle->GetName(); ?></title>
  <g:id><?php echo $oArticle->id; ?></g:id>
  <link href="<?php echo $sDetailLink; ?>" />
  <g:price><?php echo $oArticle->dPrice; ?></g:price>
  <descriptiontype="html"><![CDATA[ <?php echo $sInfoText; ?> <?php echo $oArticle->fieldDescription; ?> ]]></description>

  <g:ean><?php echo $oArticle->fieldArticlenumber; ?></g:ean>
  <g:isbn><?php echo $oArticle->fieldArticlenumber; ?></g:isbn>
  <?php if ($oArticle->GetReviewAverageScore() > 0) {
      ?><g:rating><?php echo round($oArticle->GetReviewAverageScore()); ?> stars</g:rating><?php
  } ?>
  <?php if (!is_null($oManufacturer)) {
      ?><g:publisher><?php echo $oManufacturer->fieldName; ?></g:publisher><?php
  }?>
  <g:publish_date><?php echo $oArticle->fieldDatecreated; ?></g:publish_date>

  <?php
  $iMaxImageCount = 10;
while ($iMaxImageCount > 0 && ($oImg = $oImages->Next())) {
    --$iMaxImageCount;
    $oCMSImage = $oImg->GetImage(0, 'cms_media_id');
    echo '<g:image_link>'.$oCMSImage->GetFullURL()."</g:image_link>\n";
}
?>
</entry>