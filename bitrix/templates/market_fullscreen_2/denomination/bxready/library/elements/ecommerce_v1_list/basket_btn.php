<!--basket-btns block-->
<?if (count($arElement["OFFERS"]) > 0) {?>
    <?foreach ($arElement["OFFERS"] as $offer) {?>
        <div class="offers-btn-wrap" id="offers-btn-<?=$offer["ID"]?>" style="display: none" data-item="<?=$offer["ID"]?>">
            <?if ($offer["CATALOG_QUANTITY"] <= 0 && $offer["CATALOG_CAN_BUY_ZERO"] == "N") {?>
                <button class="bxr-color-button bxr-trade-request" value="<?=$offer["ID"]?>" 
                        data-offer-id="<?=$offer["ID"]?>"
                        data-trade-id="<?=$arElement["ID"]?>"
                        data-trade-name="<?=$arElement["NAME"]?>"
                        data-trade-link="<?=$arElement["DETAIL_PAGE_URL"]?>"
                        data-msg="<?=str_replace('#TRADE_NAME#', $arElement["NAME"], GetMessage('OFFER_REQUEST_MSG'))?>">
                    <?=GetMessage("REQUEST_BTN")?>
                </button>
            <?} else {
                $qtyMax = ($offer["CATALOG_CAN_BUY_ZERO"] == "Y") ? 0 : $offer["CATALOG_QUANTITY"];?>
                <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg" action="">
                    <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$offer["ID"]?>">
                    <input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$offer["ID"]?>">
                    <input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$offer["ID"]?>" data-max="<?=$qtyMax?>">
                    <button class="bxr-color-button bxr-basket-add hidden-xs">
                        <?=GetMessage("BASKET_BTN")?>
                    </button>
                    <button class="bxr-color-button bxr-color-button-small-only-icon bxr-basket-add hidden-lg hidden-md hidden-sm">
                        <span class="fa fa-shopping-cart"></span>
                    </button>
                    <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$offer["ID"]?>">
                    <input type="hidden" name="action" value="add">
                </form>
                <div class="clearfix"></div>
            <?}?>
        </div>
<?  }?>
<?} else {?>
    <?if ($arElement["CATALOG_QUANTITY"] <= 0 && $arElement["CATALOG_CAN_BUY_ZERO"] == "N") {?>
        <button class="bxr-color-button bxr-trade-request" value="<?=$arElement["ID"]?>" 
                        data-trade-id="<?=$arElement["ID"]?>"
                        data-trade-name="<?=$arElement["NAME"]?>"
                        data-trade-link="<?=$arElement["DETAIL_PAGE_URL"]?>"
                        data-msg="<?=str_replace('#TRADE_NAME#', $arElement["NAME"], GetMessage('TRADE_REQUEST_MSG'))?>">
            <?=GetMessage("REQUEST_BTN")?>
        </button>
    <?} else {
        $qtyMax = ($arElement["CATALOG_CAN_BUY_ZERO"] == "Y") ? 0 : $arElement["CATALOG_QUANTITY"];?>
        <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg" action="">
            <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$arElement["ID"]?>">
            <input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$arElement["ID"]?>">
            <input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$arElement["ID"]?>" data-max="<?=$qtyMax?>">
            <button class="bxr-color-button bxr-basket-add hidden-xs">
                <?=GetMessage("BASKET_BTN")?>
            </button>
            <button class="bxr-color-button bxr-color-button-small-only-icon bxr-basket-add hidden-lg hidden-md hidden-sm">
                <span class="fa fa-shopping-cart"></span>
            </button>
            <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$arElement["ID"]?>">
            <input type="hidden" name="action" value="add">
        </form>
        <div class="clearfix"></div>
    <?}?>
<?}?>