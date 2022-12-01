<?php
  /**
   * shows an article preview inc category.
   */
  /*@var $oArticle TdbShopArticle*/
  /*@var $sMessages string*/
  /*@var $aCallTimeVars array*/

  if ($oArticle->fieldIsBundle) {
      $oBundleList = $oArticle->GetFieldShopBundleArticleList();
      echo $oBundleList->Render('standard', 'Customer', $aCallTimeVars);
  }
