<?php

$oDummy = new TPkgViewRendererSnippetDummyData();
$oDummy->addDummyDataFromFile('/pkgShop/shopArticle/articleSummaryBox.dummy.php');

//         <a href="{{aManufacturer.sLink}}" title="{{aManufacturer.sName}}" class="manufacturer"><img src="{{aManufacturer.sImageURL}}" alt="{{aManufacturer.sName}}" ></a>

$aManufacturer = array(
    'sManufacturerLink' => '#',
    'sManufacturerName' => 'Hersteller',
    'sManufacturerIconId' => $oDummy->getDummyImage('brand'),
);
$oDummy->addDummyDataArray($aManufacturer);

return $oDummy;
