<?php

$oImage = new TCMSImage(1);
$oThumb = $oImage->GetThumbnail(30, 30, true);

$aTree = array(
    array(
        'bIsActive' => true,
        'bIsExpanded' => true,
        'sLink' => '#link2',
        'sTitle' => 'Männer',
        'sSeoTitle' => 'Seo Männer',
        'sAdditionalInfo' => 'Teaser der Navigation',
        'aChildren' => array(
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#link2',
                'sTitle' => 'Blanko Shirts/Tanks',
                'sSeoTitle' => 'Seo Männer',
                'aChildren' => array(),
            ), array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#link2',
                'sTitle' => 'Printed T-Shirts',
                'sSeoTitle' => 'Seo Männer',
                'aChildren' => array(),
            ), array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#link2',
                'sTitle' => 'Longsleeves',
                'sSeoTitle' => 'Seo Männer',
                'aChildren' => array(),
            ),
            array(
                'bIsActive' => true,
                'bIsExpanded' => true,
                'sLink' => '#test11',
                'sTitle' => 'Hemden/Polos',
                'sSeoTitle' => 'Seo Titel 1.1',
                'sNavigationIconURL' => $oThumb->GetFullURL(),
                'aChildren' => array(
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test11',
                        'sTitle' => 'Hemden',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                            array(
                                'bIsActive' => false,
                                'bIsExpanded' => false,
                                'sLink' => '#test11',
                                'sTitle' => 'Karohemden',
                                'sSeoTitle' => 'Seo Titel 1.1',
                                'aChildren' => array(
                                ),
                            ),
                            array(
                                'bIsActive' => true,
                                'bIsExpanded' => true,
                                'sLink' => '#test12',
                                'sTitle' => 'Langarmhemden',
                                'aChildren' => array(
                                    array(
                                        'bIsActive' => true,
                                        'bIsExpanded' => true,
                                        'sLink' => '#test11',
                                        'sTitle' => 'mit Muster',
                                        'sSeoTitle' => 'Seo Titel 1.1',
                                        'aChildren' => array(
                                        ),
                                    ),
                                ),
                            ),
                            array(
                                'bIsActive' => false,
                                'bIsExpanded' => false,
                                'sLink' => '#test11',
                                'sTitle' => 'noch mehr Hemden ...',
                                'sSeoTitle' => 'Seo Titel 1.1',
                                'aChildren' => array(
                                ),
                            ),
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test12',
                        'sTitle' => 'Polos',
                        'aChildren' => array(
                        ),
                    ),
                ),
            ),
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test11',
                'sTitle' => 'Blanko T-Shirts',
                'sSeoTitle' => 'Seo Titel 1.1',
                'bShowChildrenAsList' => true,
                'sNavigationIconURL' => $oThumb->GetFullURL(),
                'aChildren' => array(
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 1',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategorie 2',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategorie 3',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 5',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 5',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 6',
                        'aChildren' => array(
                        ),
                    ),
                ),
            ),
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test11',
                'sTitle' => 'Blanko T-Shirts',
                'sSeoTitle' => 'Seo Titel 1.1',
                'bShowChildrenAsList' => true,
                'sNavigationIconURL' => $oThumb->GetFullURL(),
                'aChildren' => array(
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 1',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategorie 2',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategorie 3',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 5',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 5',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 6',
                        'aChildren' => array(
                        ),
                    ),
                ),
            ),
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test11',
                'sTitle' => 'Blanko T-Shirts',
                'sSeoTitle' => 'Seo Titel 1.1',
                'bShowChildrenAsList' => true,
                'sNavigationIconURL' => $oThumb->GetFullURL(),
                'aChildren' => array(
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 1',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategorie 2',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategorie 3',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 5',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 5',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 6',
                        'aChildren' => array(
                        ),
                    ),
                ),
            ),
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test11',
                'sTitle' => 'Blanko T-Shirts',
                'sSeoTitle' => 'Seo Titel 1.1',
                'bShowChildrenAsList' => true,
                'sNavigationIconURL' => $oThumb->GetFullURL(),
                'aChildren' => array(
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 1',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategorie 2',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategorie 3',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 5',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 5',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 6',
                        'aChildren' => array(
                        ),
                    ),
                ),
            ),
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test11',
                'sTitle' => 'Blanko T-Shirts',
                'sSeoTitle' => 'Seo Titel 1.1',
                'bShowChildrenAsList' => true,
                'sNavigationIconURL' => $oThumb->GetFullURL(),
                'aChildren' => array(
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 1',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategorie 2',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategorie 3',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 5',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 5',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 6',
                        'aChildren' => array(
                        ),
                    ),
                ),
            ),
            array(
                'bIsActive' => false,
                'bIsExpanded' => false,
                'sLink' => '#test12',
                'sTitle' => 'Printed T-Shirts',
                'sNavigationIconURL' => $oThumb->GetFullURL(),
                'bShowChildrenAsList' => true,
                'aChildren' => array(
                    array(
                        'bIsActive' => false,
                        'bIsExpanded' => false,
                        'sLink' => '#test11',
                        'sTitle' => 'Kategoriename 1',
                        'sSeoTitle' => 'Seo Titel 1.1',
                        'aChildren' => array(
                        ),
                    ),
                    array(
                        'bIsActive' => true,
                        'bIsExpanded' => true,
                        'sLink' => '#test12',
                        'sTitle' => 'Kategoriename 2',
                        'aChildren' => array(
                        ),
                    ),
                ),
            ),
        ),
    ),
    array(
        'bIsActive' => false,
        'bIsExpanded' => false,
        'sLink' => '#link2',
        'sTitle' => 'Frauen',
        'sSeoTitle' => 'Seo Männer',
        'aChildren' => array(),
    ), array(
        'bIsActive' => false,
        'bIsExpanded' => false,
        'sLink' => '#link2',
        'sTitle' => 'ACCESSOIRES',
        'sSeoTitle' => 'Seo Männer',
        'aChildren' => array(),
    ), array(
        'bIsActive' => false,
        'bIsExpanded' => false,
        'sLink' => '#link2',
        'sTitle' => 'Sale',
        'sSeoTitle' => 'Seo Männer',
        'aChildren' => array(),
    ),
);

return array('aTree' => $aTree);
