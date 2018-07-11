<?php

if (!is_null($oBreadcrumb)) {
    $oViewRender = new ViewRenderer();
    $oViewRender->AddMapper(new TCMSPageBreadcrumbMapper());
    $oViewRender->AddSourceObject('oBreadCrumb', $oBreadcrumb);
    echo  $oViewRender->Render('/common/navigation/navigationBreadcrumb.html.twig');
}
