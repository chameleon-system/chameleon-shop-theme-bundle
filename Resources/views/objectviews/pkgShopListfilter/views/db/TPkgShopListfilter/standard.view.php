<?php
/** @var $oListfilter TdbPkgShopListfilter */
$oActivePage = \ChameleonSystem\CoreBundle\ServiceLocator::get('chameleon_system_core.active_page_service')->getActivePage();
$oGlobal = TGlobal::instance();

?>
<div class="TPkgShopListfilter">
    <div class="standard">
        <form name="TdbPkgShopListfilter" method="get" accept-charset="utf8"
              action="<?=$oActivePage->GetRealURLPlain(); ?>">
            <input type="hidden" name="<?=TdbPkgShopListfilter::URL_PARAMETER_IS_NEW_REQUEST; ?>" value="1"/>
            <input type="hidden" name="<?=TShopModuleArticlelistFilterSearch::PARAM_QUERY; ?>"
                   value="<?=TGlobal::OutHTML($oGlobal->GetUserData(TShopModuleArticlelistFilterSearch::PARAM_QUERY)); ?>"/>

            <div class="snippetShopFilter">
                <div class="filterBox">
                    <div class="filterHeader filterOpen">
                        <span><?=TGlobal::OutHTML($oListfilter->fieldTitle); ?></span>
                    </div>
                    <div class="filterContent filterOpen">
                        <?php
                            $sText = $oListfilter->GetTextField('introtext');
                            if (!empty($sText)) {
                                echo '<div class="introText">'.$sText.'</div>';
                            }

                            $oFilterListItems = $oListfilter->GetFieldPkgShopListfilterItemList();
                            $oFilterListItems->GoToStart();
                            while ($oFilterItem = $oFilterListItems->Next()) {
                                echo $oFilterItem->Render($oFilterItem->fieldView, $oFilterItem->fieldViewClassType);
                            }
                        ?>
                    </div>
                </div>
            </div>
            <input type="submit" class="hideOnJS" value="<?=TGlobal::OutHTML(\ChameleonSystem\CoreBundle\ServiceLocator::get('translator')->trans('chameleon_system_chameleon_shop_theme.filter.action_set')); ?>">
        </form>
    </div>
</div>