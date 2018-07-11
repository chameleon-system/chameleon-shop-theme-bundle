<?php

$oDummy = new TPkgViewRendererSnippetDummyData();

$aInputBox = array(
    'sBoxStyleClass' => 'style2',
    'sInputName' => 'iPageSize',
    'aOptionList' => array(
        array(
            'sValue' => '',
            'sName' => '500',
            'bSelected' => true,
        ),
        array(
            'sValue' => '',
            'sName' => '100',
            'bSelected' => false,
        ),
        array(
            'sValue' => '',
            'sName' => '50',
            'bSelected' => false,
        ),
        array(
            'sValue' => '',
            'sName' => '10',
            'bSelected' => false,
        ),
    ),
);

$aListOptionPageSize = array(
    'sName' => 'Artikel pro Seite:',
    'sFormActionUrl' => '#',
    'sFormId' => 'pagesizetop',
    'sSelectName' => 'iPageSize',
    'aInputBox' => $aInputBox,
)
;

$aListPaging = array(
    'iActivePage' => 11,
    'iLastPage' => 83,
    'sURL' => '{[pageNumber]}',
);

$aListHeader = array(
    'sStartItem' => '2.000',
    'sEndItem' => '2.500',
    'sMaxItems' => '201.438',
    'sListOptionSort' => '[sortierung]',
    'aListOptionPageSize' => $aListOptionPageSize,
    'aListPaging' => $aListPaging,
);
$oDummy->addDummyDataArray($aListHeader);

$oDummy->addDummyDataFromFileAs('aListInformation', '/common/lists/listInformation.dummy.php');

return $oDummy;
