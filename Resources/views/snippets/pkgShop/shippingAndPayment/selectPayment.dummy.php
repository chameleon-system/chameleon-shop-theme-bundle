<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$oDummy->addDummyData('sCurrency', '€');

$aPaymentList = array(
    array(
        'bIsActive' => false,
        'sCost' => '',
        'sTitle' => 'PayPal',
        'id' => 'paypalid',
        'cmsMediaId' => $oDummy->getDummyImage('paypal'),
        'sDescription' => 'Sie werden gleich nach dem Abschicken der Bestellung auf die Seit des Anbeiters weitergeleitet.',
        'sDetails' => '',
        'sTargetURL' => '#',
    ),
    array(
        'bIsActive' => true,
        'sCost' => '',
        'sTitle' => 'Kreditkarte',
        'id' => 'ccid',
        'cmsMediaId' => $oDummy->getDummyImage('VisaMaster'),
        'sDescription' => 'Sie werden um die Eingabe Ihrer Kreditkartendaten gebeten',
        'sDetails' => 'formular eingabe der daten',
        'sTargetURL' => '#',
    ),
    array(
        'bIsActive' => false,
        'sCost' => '5,00',
        'sTitle' => 'Nachnahme',
        'id' => 'nachnahmeid',
        'cmsMediaId' => $oDummy->getDummyImage('DHL'),
        'sDescription' => '+ €5,00 Nachnahmegebühr',
        'sDetails' => '',
        'sTargetURL' => '#',
    ),
    array(
        'bIsActive' => false,
        'sCost' => '',
        'sTitle' => 'Lastschrift',
        'id' => 'debitid',
        'cmsMediaId' => $oDummy->getDummyImage('EC'),
        'sDescription' => 'Sie werden um die Eingabe Ihrer Bankdaten gebeten',
        'sDetails' => '',
        'sTargetURL' => '#',
    ),
    array(
        'bIsActive' => false,
        'sCost' => '',
        'sTitle' => 'Vorauskasse',
        'id' => 'wiretransid',
        'cmsMediaId' => $oDummy->getDummyImage('Vorauskasse'),
        'sDescription' => 'Sie erhalten im Anschluss der Bestellung die Kontodaten',
        'sDetails' => '<strong>Kontodaten</strong><br />Konto: 12323435<br/>Bank:34534545',
        'sTargetURL' => '#',
    ),
);
$oDummy->addDummyData('aPaymentList', $aPaymentList);
/*
    sCurrency
    parameter
        aPaymentList array of groups each with the following
            bIsActive
            sCost
            sTitle
            id
            cmsMediaId
            sDescription
            sDetails
            sTargetURL
 */

return $oDummy;
