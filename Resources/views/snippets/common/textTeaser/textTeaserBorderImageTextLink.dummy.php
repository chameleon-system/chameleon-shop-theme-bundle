<?php

$oImage = new TCMSImage(1);
$oThumb = $oImage->GetThumbnail(170, 190, true);
// image with text
$aTextTeaser1 = array(
    'aImage' => array(
        'sClassSrc' => $oThumb->GetFullURL(),
    ),
    'sTitle' => 'Pullis',
    'sText' => 'ein Hemd von Knowledge Cotton, eine Jeans von Kuyichi, ein Klied von',
    'aLink' => array(
        'sLinkURL' => '',
        'sTitle' => 'weitere Infos',
        'sLinkFont' => '',
        'sLinkIconClass' => 'i-point_green',
    ),
);
// only text
$aTextTeaser2 = array(
    'sTitle' => 'Pullis',
    'sText' => 'ein Hemd von Knowledge Cotton, eine Jeans von Kuyichi, ein Klied von',
    'aLink' => array(
        'sLinkURL' => '',
        'sTitle' => 'weitere Infos',
        'sLinkFont' => '',
        'sLinkIconClass' => 'i-point_green',
    ),
);
// only image
$aTextTeaser3 = array(
    'aImage' => array(
        'sClassSrc' => $oThumb->GetFullURL(),
    ),
    'aLink' => array(
        'sLinkURL' => '',
        'sTitle' => 'weitere Infos',
        'sLinkFont' => '',
        'sLinkIconClass' => 'i-point_green',
    ),
);

return $aTextTeaser1;
