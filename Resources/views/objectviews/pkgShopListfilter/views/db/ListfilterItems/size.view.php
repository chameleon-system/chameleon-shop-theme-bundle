<?php

/** @var $oListItem TPkgShopListfilterItemVariant */
/** @var $oFilterType TdbPkgShopListfilterItemType */
$oViewRenderer = new ViewRenderer();
$oViewRenderer->AddMapper(new TPkgShopListfilterMapper_Variants());
$oViewRenderer->AddSourceObject('oFilterItem', $oListItem);
$oViewRenderer->AddSourceObject('sShopVariantTypeIds', $oListItem->getVariantTypeIds());
$oViewRenderer->AddSourceObject('oActiveFilter', TdbPkgShopListfilter::GetActiveInstance());
echo $oViewRenderer->Render('/pkgShopListFilter/shopFilterItemSize.html.twig');
