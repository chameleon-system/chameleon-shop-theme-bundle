<?php
use ChameleonSystem\CoreBundle\ServiceLocator;

echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
  $oShop = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_shop.shop_service')->getActiveShop();
  $oPortal = ServiceLocator::get('chameleon_system_core.portal_domain_service')->getActivePortal();
  $urlToPortalHome = ServiceLocator::get('chameleon_system_core.page_service')->getLinkToPortalHomeAbsolute([], $oPortal);

?>
<feed xmlns="http://www.w3.org/2005/Atom">
  <title><?=TGlobal::OutHTML($oShop->fieldName); ?></title>
    <link href="<?= $urlToPortalHome; ?>" />
  <updated><?=date('Y-m-d H:i:s'); ?></updated>
  <author>
    <name><?=TGlobal::OutHTML($oShop->fieldName); ?></name>
  </author>
  <id>urn:uuid:<?=TTools::GetUUID(); ?></id>
  <generator uri="http://www.chameleon-cms.com" version="3.0">ESONO Chameleon CMS</generator>
<?php
    while ($oArticle = $data['oArticleList']->Next()) { /*@var $oArticle TdbShopArticle */
        echo $oArticle->Render('atom-froogle', 'Customer');
    }
?>
</feed>