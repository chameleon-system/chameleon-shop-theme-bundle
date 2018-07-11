<?php

/**
 * @var ViewRenderer $oViewRenderer
 */
$oViewRenderer = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_view_renderer.view_renderer');
$oViewRenderer->addMapperFromIdentifier('chameleon_system_core.mapper.feedback_success');
$oViewRenderer->AddSourceObject('oFeedbackModuleConfiguration', $oTableRow);
echo $oViewRenderer->Render('/common/textBlock/textBlockMediumHeadline.html.twig');
