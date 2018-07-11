<?php

$sMsg = '';
$sInsertMsg = '';
$oMessageManager = TCMSMessageManager::GetInstance();
if ($oMessageManager->ConsumerHasMessages(MTShopBasketCore::MSG_CONSUMER_NAME)) {
    $oMessages = $oMessageManager->ConsumeMessages(MTShopBasketCore::MSG_CONSUMER_NAME, true);
    $oMessages->GoToStart();
    while ($oMessage = $oMessages->Next()) {
        if ('ERROR-ADD-TO-BASKET-NOT-ENOUGH-STOCK' !== $oMessage->fieldName) {
            $sMsg .= $oMessage->Render();
        } else {
            $sInsertMsg = $oMessage->Render();
        }
    }

    $sMsg = str_replace('<!--[{sInsertedMessages}]-->', $sInsertMsg, $sMsg);
    echo $sMsg;
}
