<?php

if ($bRegistrationConfirmationSuccess) {
    echo $oExtranetConfig->GetTextField('registration_success');
} else {
    $oExtranetConfig->GetTextField('registration_failed');
}
