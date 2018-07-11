<?php

/** @var $sModuleSpotName string */
/** @var $aModuleInstanceSpots */
/** @var $sModuleContentId */
/** @var $oConfig */
/** @var $aModuleInstances */
/** @var $aSetItems */
if (isset($aModuleInstances) && is_array($aModuleInstances) && count($aModuleInstances) > 0) {
    $oViewRenderer = new ViewRenderer();
    $oViewRenderer->AddMapper(new TPkgMultiModuleMapper_Tabs());
    $oViewRenderer->AddSourceObject('aSetItems', $aSetItems);

    // render first module
    reset($aModuleInstances);
    /** @var $oModuleInstance TdbCmsTplModuleInstance */
    $oModuleInstance = current($aModuleInstances);
    $oViewRenderer->AddSourceObject('sContent', $oModuleInstance->Render(array(), $aModuleInstanceSpots[$oModuleInstance->id]));
    echo $oViewRenderer->Render('/common/navigation/tabs/standard.html.twig');
}
