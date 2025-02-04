<?php
  /*@var $oReview TdbShopArticleReview */
  /*@var $aCallTimeVars array */

  $oArticle = $oReview->GetFieldShopArticle();
?>
<div class="TShopArticleReview"><div class="owner">
  <div class="reviewitem">
    <?php
      $sArticleName = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.review.text_unknown_product');
      if (!is_null($oArticle)) {
          $sArticleName = '<a href="'.$oArticle->GetDetailLink().'">'.TGlobal::OutHTML($oArticle->GetName()).'</a>';
      }
      $status = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.review.text_waiting_for_publication');
      if ($oReview->fieldPublish) {
          $status = \ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.review.text_published');
      }
    ?>
    <h3><?=\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.review.single_rating',
            array(
                '%article%' => $sArticleName,
                '%author%' => $oReview->fieldAuthorName,
                '%rating%' => str_pad('', $oReview->fieldRating, '*'),
                '%ratingAge%' => $oReview->GetReviewAgeAsString(),
            )
        ); ?> (<?=TGlobal::OutHTML($status); ?>)</h3>
    <?=TGlobal::OutHTML($oReview->fieldComment); ?>
  </div>
</div></div>
