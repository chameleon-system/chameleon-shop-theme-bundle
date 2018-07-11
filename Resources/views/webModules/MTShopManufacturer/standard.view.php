<?php

/**
 * @var ViewRenderer $oViewRenderer
 */
$oViewRenderer = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.manufacturer_overview');
$oViewRenderer->AddSourceObject('oConfig', $oConfig);
$oViewRenderer->AddSourceObject('oManufacturerList', $oManufacturerList);

if (50 < $oManufacturerList->Length()) {
    $oViewRenderer->addMapperFromIdentifier('chameleon_system_shop.mapper.manufacturer_overview_navigation');
    echo $oViewRenderer->Render('/common/lists/listStandardShopManufacturer.html.twig');
} else {
    echo $oViewRenderer->Render('/common/lists/listDetailedShopManufacturer.html.twig');
}
