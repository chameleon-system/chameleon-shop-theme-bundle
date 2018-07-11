<?php

$aFilterItemSize = array(
    'sTitle' => 'Größe',
    'sResetURL' => '#',
    'aFilterData' => array(
        array(
            'sURL' => '#',
            'sValue' => 'S',
            'bActive' => true,
        ),
        array(
            'sURL' => '#',
            'sValue' => 'M',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => 'L',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => 'XL',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => 'XXL',
            'bActive' => false,
        ),
    ),
);
$aFilterItemColor = array(
    'sTitle' => 'Farbe',
    'sResetURL' => '#',
    'aFilterData' => array(
        array(
            'sURL' => '#',
            'sValue' => '654fFF',
            'bActive' => true,
        ),
        array(
            'sURL' => '#',
            'sValue' => '000000',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '555555',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '333333',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '999999',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '955555',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '633333',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '211111',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '333333',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '999999',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '955555',
            'bActive' => false,
        ),
        array(
            'sURL' => '#',
            'sValue' => '633333',
            'bActive' => false,
        ),
    ),
);
$aFilterItemPrice = array(
    'sTitle' => 'Preisspanne',
    'sResetURL' => '#',
    'aFilterData' => array(
        'sStartAmount' => 10,
        'sEndAmount' => 192,
        'sStepSize' => 1,
        'sHighestValue' => 200,
        'sLowestValue' => 0,
        'sCurrency' => '€',
        'sInputURLName' => 'test',
    ),
);
$aFilter = array(
    'sTitle' => 'Filter nach',
    'aFilterItemList' => array(
        'aFilterItemSize' => $aFilterItemSize,
        'aFilterItemColor' => $aFilterItemColor,
        'aFilterItemPrice' => $aFilterItemPrice,
    ),
);

return  $aFilter;
