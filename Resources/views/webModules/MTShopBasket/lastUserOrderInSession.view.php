<div class="MTShopBasket">
    <div class="lastUserOrderInSession">
        <?php
        $oLastOrder = TShopBasket::GetLastCreatedOrder();
        if (!is_null($oLastOrder)) {
            echo $oLastOrder->Render('print', 'Customer');
        }
        ?>
    </div>
</div>