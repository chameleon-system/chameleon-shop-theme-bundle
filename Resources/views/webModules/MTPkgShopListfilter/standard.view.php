<div class="MTPkgShopListfilter">
    <div class="standard">
    <?php
    /** @var $oFilter TdbPkgShopListfilter */
    if ($oFilter) {
        echo $oFilter->Render('standard', 'Customer');
    }
    ?>
    </div>
</div>