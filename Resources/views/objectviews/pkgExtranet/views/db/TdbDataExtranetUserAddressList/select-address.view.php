<?php
  /*@var $oUserAddresses TdbDataExtranetUserAddressList /*
  /*@var $oUser TdbDataExtranetUser /*
  /*@var $aCallTimeVars array */

  $sFieldName = 'aUserAddress';
  if (array_key_exists('sFieldName', $aCallTimeVars)) {
      $sFieldName = TGlobal::OutHTML($aCallTimeVars['sFieldName']);
  }
  $sFullFieldName = "{$sFieldName}[selectedAddressId]";

  $iSelected = 'new';
  if (array_key_exists('selectedAddressId', $aCallTimeVars)) {
      $iSelected = $aCallTimeVars['selectedAddressId'];
  }

  if ($oUserAddresses->Length() > 0) {
      $oBillingAddress = $oUser->GetBillingAddress();
      $oShippingAddress = $oUser->GetShippingAddress();
      $sTextBilling = 'Rechnungsadresse';
      $sTextShipping = 'Lieferadresse';
      if ($oUser->ShipToBillingAddress()) {
          $sTextBilling = 'Rechungs/Lieferadresse';
          $sTextShipping = $sTextBilling;
      }

      // since we need to use the render select form method we need to collect the data for the address in an array
      $aAddressData = array();
      $aAddressData['new'] = 'Neue Adresse anlegen';
      $oUserAddresses->GoToStart();
      while ($oAddress = $oUserAddresses->Next()) {
          $sName = $oAddress->GetName();
          if ($oAddress->id == $oBillingAddress->id) {
              $sName .= " ({$sTextBilling})";
          } elseif ($oAddress->id == $oShippingAddress->id) {
              $sName .= " ({$sTextShipping})";
          }
          $aAddressData[$oAddress->id] = $sName;
      }
      echo TTemplateTools::SelectField($sFullFieldName, $aAddressData, 200, $iSelected, array('onChange' => "SetSelectedAddress(this.options[this.selectedIndex].value,'".TGlobal::OutHTML($sFieldName)."')")); ?>

<?php
  }
