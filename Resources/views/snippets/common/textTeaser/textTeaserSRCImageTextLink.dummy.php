<?php
    $oImage = new TCMSImage(1);
    $oThumb = $oImage->GetThumbnail(53, 53, true);
    $aTextTeaser = array(
        'aImage' => array(
            'sClassSrc' => $oThumb->GetFullURL(),
            'sTitle' => 'Kundencenter',
            ),
        'sText' => '+49 761 456 78 9',
        'aLink' => array(
            'sLinkURL' => '',
            'sTitle' => 'Kundencenter',
        ),
    );

    return $aTextTeaser;
