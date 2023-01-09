<?php
  /**
   * shows an article preview inc category.
   *
   * @var $oArticle      TdbShopArticle
   * @var $sMessages     string
   * @var $aCallTimeVars array
   */
  $oLocal = TCMSLocal::GetActive();
  $sDetailLink = $oArticle->GetDetailLink(true);

  $sInfoText = $oArticle->fieldUsp;
  if (empty($sInfoText)) {
      $sInfoText = $oArticle->fieldSubtitle;
  }

  $oManufacturer = $oArticle->GetFieldShopManufacturer();

  $oImages = $oArticle->GetFieldShopArticleImageList();

?>
<entry>
  <title><?=$oArticle->GetName(); ?></title>
  <g:id><?=$oArticle->id; ?></g:id>
  <link href="<?=$sDetailLink; ?>" />
  <g:price><?=$oArticle->dPrice; ?></g:price>
  <descriptiontype="html"><![CDATA[ <?=$sInfoText; ?> <?=$oArticle->fieldDescription; ?> ]]></description>

  <g:ean><?=$oArticle->fieldArticlenumber; ?></g:ean>
  <g:isbn><?=$oArticle->fieldArticlenumber; ?></g:isbn>
  <?php if ($oArticle->GetReviewAverageScore() > 0) {
    ?><g:rating><?=round($oArticle->GetReviewAverageScore()); ?> stars</g:rating><?php
} ?>
  <?php if (!is_null($oManufacturer)) {
        ?><g:publisher><?=$oManufacturer->fieldName; ?></g:publisher><?php
    }?>
  <g:publish_date><?=$oArticle->fieldDatecreated; ?></g:publish_date>

  <?php
    $iMaxImageCount = 10;
    while ($iMaxImageCount > 0 && ($oImg = $oImages->Next())) {
        --$iMaxImageCount;
        $oCMSImage = $oImg->GetImage(0, 'cms_media_id');
        echo '<g:image_link>'.$oCMSImage->GetFullURL()."</g:image_link>\n";
    }
  ?>
</entry>