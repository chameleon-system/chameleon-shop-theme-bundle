<?php
  /*@var $oUserAddresses TdbDataExtranetUserAddressList /*
  /*@var $oUser TdbDataExtranetUser /*
  /*@var $aCallTimeVars array */
  if ($oUserAddresses->Length() > 0) {
      $oBillingAddress = $oUser->GetBillingAddress(); ?>
<div class="TdbDataExtranetUserAddressList"><div class="vSelectAsBlock">
  <?php
//      $sFieldName = 'aUserAddress';
//      if (array_key_exists('sFieldName',$aCallTimeVars)) $sFieldName = TGlobal::OutHTML($aCallTimeVars['sFieldName']);
//      $sFullFieldName = "{$sFieldName}[selectedAddressId]";
//
//      $iSelected = 'new';
//      if (array_key_exists('selectedAddressId',$aCallTimeVars)) $iSelected = $aCallTimeVars['selectedAddressId'];
//
//      $oBillingAddress = $oUser->GetBillingAddress();
//      $oShippingAddress = $oUser->GetShippingAddress();
//      $sTextBilling = 'Rechnungsadresse';
//      $sTextShipping = 'Lieferadresse';
//      if ($oUser->ShipToBillingAddress()) {
//        $sTextBilling = 'Rechungs/Lieferadresse';
//        $sTextShipping = $sTextBilling;
//      }
//
//      $oUserAddresses->GoToStart();
      while ($oAddress = $oUserAddresses->Next()) {
          if ($oBillingAddress->id != $oAddress->id) {
              echo $oAddress->Render('vShowWithActions', 'Customer', $aCallTimeVars);
          }
      }
//      echo TTemplateTools::SelectField($sFullFieldName, $aAddressData,200,$iSelected,array('onChange'=>"SetSelectedAddress(this.options[this.selectedIndex].value,'".TGlobal::OutHTML($sFieldName)."')"));
  ?>
  <div class="cleardiv">&nbsp;</div>
</div></div>
<?php
  }
