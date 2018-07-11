<?php

$aTree = array(
    array(
        'bIsActive' => false,
        'bIsExpanded' => true,
        'sLink' => '#test',
        'sTitle' => 'Service',
        'sSeoTitle' => 'Seo Titel 1',
        'aChildren' => array(
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test11',
                'sTitle' => 'Bezahlmöglichkeiten',
                'sSeoTitle' => 'Seo Titel 1.1',
                'aChildren' => array(
                ),
            ),
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#Versanddetails',
                'sTitle' => 'Navi 1.2',
                'aChildren' => array(
                ),
            ),

            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#Versanddetails',
                'sTitle' => 'Navi 1.3',
                'aChildren' => array(
                ),
            ),

            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#Versanddetails',
                'sTitle' => 'Navi 1.4',
                'aChildren' => array(
                ),
            ),

            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#Versanddetails',
                'sTitle' => 'Navi 1.5',
                'aChildren' => array(
                ),
            ),

            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#Versanddetails',
                'sTitle' => 'Navi 1.6',
                'aChildren' => array(
                ),
            ),

            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#Versanddetails',
                'sTitle' => 'Navi 1.7',
                'aChildren' => array(
                ),
            ),

            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#Versanddetails',
                'sTitle' => 'Navi 1.8',
                'aChildren' => array(
                ),
            ),

            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#Versanddetails',
                'sTitle' => 'Navi 1.9',
                'aChildren' => array(
                ),
            ),
        ),
    ),
    array(
        'bIsActive' => false,
        'bIsExpanded' => true,
        'sLink' => '#test',
        'sTitle' => 'Sonstiges',
        'sSeoTitle' => 'Seo Titel 1',
        'aChildren' => array(
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test11',
                'sTitle' => 'Häufige Fragen',
                'sSeoTitle' => 'Seo Titel 1.1',
                'aChildren' => array(
                ),
            ),
            array(
                'bIsActive' => true,
                'bIsExpanded' => true,
                'sLink' => '#test12',
                'sTitle' => 'Größenberatung',
                'aChildren' => array(
                ),
            ),
        ),
    ),
    array(
        'bIsActive' => false,
        'bIsExpanded' => true,
        'sLink' => '#test',
        'sTitle' => 'Navi 1',
        'sSeoTitle' => 'Seo Titel 1',
        'aChildren' => array(
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test11',
                'sTitle' => 'Navi 1.1',
                'sSeoTitle' => 'Seo Titel 1.1',
                'aChildren' => array(
                ),
            ),
            array(
                'bIsActive' => true,
                'bIsExpanded' => true,
                'sLink' => '#test12',
                'sTitle' => 'Navi 1.2',
                'aChildren' => array(
                ),
            ),
        ),
    ),
);

return array('aTree' => $aTree);
