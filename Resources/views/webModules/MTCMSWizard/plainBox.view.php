<?php
/** @var $oWizardConf TdbCmsWizardConfig */
?>
<div class="TCMSWizard">
    <div class="plainBox">
        <?php
        if (!empty($oWizardConf->fieldName)) {
            echo '<div class="cmsH3">'.TGlobal::OutHTML($oWizardConf->fieldName).'</div>';
        }
        echo $oActiveOrderStep->GetPreStepInfo();
        echo $oActiveOrderStep->Render($sModuleSpotName);

        $oMsgManager = TCMSMessageManager::GetInstance();
        if ($oMsgManager->ConsumerHasMessages(MTCMSWizardCore::MSG_HANDLER_NAME)) {
            echo $oMsgManager->RenderMessages(MTCMSWizardCore::MSG_HANDLER_NAME);
        }
        ?>
    </div>
</div><br/>