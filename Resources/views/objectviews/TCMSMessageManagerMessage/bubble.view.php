<?php
    $oViewRender = new ViewRenderer();
    $oViewRender->addMapperFromIdentifier('chameleon_system_core.mapper.message_manager');
    $oViewRender->AddSourceObject('oMessageType', $oMessageType);
    $oViewRender->AddSourceObject('sMessage', $sMessageString);
    echo  $oViewRender->Render('/common/textBlock/textBlockBubble.html.twig');
