<?php

/**
 * @var ViewRenderer $oViewRenderer
 */
$oViewRenderer = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_core.mapper.text_field_text');
$oViewRenderer->AddSourceObject('oTextModuleConfiguration', $oTableRow);
echo $oViewRenderer->Render('/common/textBlock/textBlockStandardWithLinkList.html.twig');
