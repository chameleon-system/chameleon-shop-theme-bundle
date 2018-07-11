<?php

$oRenderer = new ViewRenderer();
$oRenderer->AddSourceObjectsFromArray(array(
    'q' => isset($q) ? $q : '',
    'sSearchURL' => $sSearchURL,
    'quicksearchUrl' => isset($quicksearchUrl) ? $quicksearchUrl : '/searchsuggest',
));
echo $oRenderer->Render('/pkgShop/MTShopSearchForm/quicksearch.html.twig');
