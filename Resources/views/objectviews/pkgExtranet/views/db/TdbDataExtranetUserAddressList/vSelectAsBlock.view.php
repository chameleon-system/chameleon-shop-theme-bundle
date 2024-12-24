<?php
/*@var $oUserAddresses TdbDataExtranetUserAddressList /*
/*@var $oUser TdbDataExtranetUser /*
/*@var $aCallTimeVars array */
if ($oUserAddresses->Length() > 0) {
    $oBillingAddress = $oUser->GetBillingAddress(); ?>
<div class="TdbDataExtranetUserAddressList"><div class="vSelectAsBlock">
  <?php

    while ($oAddress = $oUserAddresses->Next()) {
        if ($oBillingAddress->id != $oAddress->id) {
            echo $oAddress->Render('vShowWithActions', 'Customer', $aCallTimeVars);
        }
    }
    ?>
  <div class="cleardiv">&nbsp;</div>
</div></div>
<?php
}
