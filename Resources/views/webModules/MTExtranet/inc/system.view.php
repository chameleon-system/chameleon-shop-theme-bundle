<?php

if (!is_null($oMessages)) {
    while ($oMessage = $oMessages->Next()) { /*@var $oMessage TdbCmsMessageManagerMessage*/
        echo $oMessage->Render();
    }
}

$oMessageManager = TCMSMessageManager::GetInstance();
if ($oMessageManager->ConsumerHasMessages(MTExtranetCore::MSG_CONSUMER_NAME)) {
    $this->oMessages = $oMessageManager->ConsumeMessages(MTExtranetCore::MSG_CONSUMER_NAME);
}
