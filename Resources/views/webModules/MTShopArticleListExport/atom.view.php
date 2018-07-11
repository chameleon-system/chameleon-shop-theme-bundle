<?php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  $oShop = TdbShop::GetInstance();
  $oPortal = TTools::GetActivePortal();

?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title><?=TGlobal::OutHTML($oShop->fieldName); ?></title>
  <link href="<?=$oPortal->GetPortalHomeURL(); ?>" />
  <updated><?=date('Y-m-d H:i:s'); ?></updated>
  <author>
    <name><?=TGlobal::OutHTML($oShop->fieldName); ?></name>
  </author>
  <id>urn:uuid:<?=TTools::GetUUID(); ?></id>
  <generator uri="http://www.chameleon-cms.com" version="3.0">ESONO Chameleon CMS</generator>
<?php
    while ($oArticle = &$data['oArticleList']->Next()) { /*@var $oArticle TdbShopArticle */
        echo $oArticle->Render('atom-froogle', 'Customer');
    }
?>
</feed>