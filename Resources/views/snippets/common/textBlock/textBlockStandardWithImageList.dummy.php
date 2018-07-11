<?php
    $oImage = new TCMSImage(1);
    $oThumb = $oImage->GetThumbnail(170, 77, true);
    $aTextBlock = array(
        'sHeadline' => 'Top Brands',
        'sText' => 'auch unter optische Gesichtspunkten gefällt. Egal ob Ihr ein Hemd von ... oder Hose von ..',
        'aLink' => array(
            'sLinkURL' => '#',
            'sTitle' => 'Alle Anzeigen',
            'sLinkFont' => '',
            'sLinkColor' => '',
            'sLinkIconClass' => '',
        ),
        'aImageList' => array(
             array(
                'sImageURL' => $oThumb->GetFullURL(),
                 'sImage' => '1',
                'sLinkURL' => '#',
                'sTitle' => 'Brand',
            ),
            array(
                'sImageURL' => $oThumb->GetFullURL(),
                'sImage' => '1',
                'sLinkURL' => '#',
                'sTitle' => 'Brand',
            ),
            array(
                'sImageURL' => $oThumb->GetFullURL(),
                'sImage' => '1',
                'sLinkURL' => '#',
                'sTitle' => 'Brand',
            ),
            array(
                'sImageURL' => $oThumb->GetFullURL(),
                'sImage' => '1',
                'sLinkURL' => '#',
                'sTitle' => 'Brand',
            ),
            array(
                'sImageURL' => $oThumb->GetFullURL(),
                'sImage' => '1',
                'sLinkURL' => '#',
                'sTitle' => 'Brand',
            ),
            array(
                'sImageURL' => $oThumb->GetFullURL(),
                'sTitle' => 'Brand',
            ),
        ),
    );

    return $aTextBlock;
