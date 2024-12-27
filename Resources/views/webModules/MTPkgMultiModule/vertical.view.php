<?php

/** @var $sModuleSpotName string */
/** @var $aModuleInstanceSpots */
/** @var $sModuleContentId */
/** @var $oConfig */
/** @var $aModuleInstances */
/** @var $aSetItems */
if (isset($aModuleInstances) && is_array($aModuleInstances) && count($aModuleInstances) > 0) {
    $oShopConfig = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_shop.shop_service')->getActiveShop();
    $sBasketNodeId = $oShopConfig->GetSystemPageNodeId('checkout');
    $oActivePage = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_core.active_page_service')->getActivePage();
    $iActivePageNodeId = $oActivePage->GetMainTreeId();
    if ($sBasketNodeId !== $iActivePageNodeId) {
        $oViewRenderer = new ViewRenderer();
        $oViewRenderer->AddMapper(new TPkgMultiModuleMapper_Tabs());
        $oViewRenderer->AddSourceObject('aSetItems', $aSetItems);
        $oViewRenderer->AddSourceObject('bNoActive', true);
        $oViewRenderer->AddSourceObject('sContent', '');
        echo $oViewRenderer->Render('/common/navigation/tabs/standardVertical.html.twig');
    }
}
