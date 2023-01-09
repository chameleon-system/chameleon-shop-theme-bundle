<?php
  /**
   * shows an article preview inc category.
   */
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/
  $oLocal = TCMSLocal::GetActive();
  $sDetailLink = $oArticle->GetDetailLink(true);

  $sInfoText = $oArticle->fieldUsp;
  if (empty($sInfoText)) {
      $sInfoText = $oArticle->fieldSubtitle;
  }

?>
<entry>
  <title><?=$oArticle->GetName(); ?></title>
  <id><?=$sDetailLink; ?></id>
  <guid isPermaLink="true"><?=$sDetailLink; ?></guid>
  <content type="html"><![CDATA[ <?=$sInfoText; ?> ]]></content>
  <link href="<?=$sDetailLink; ?>" />
</entry>