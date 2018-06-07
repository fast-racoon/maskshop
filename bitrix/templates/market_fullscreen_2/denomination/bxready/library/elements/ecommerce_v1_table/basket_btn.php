<!--basket-btns block-->
<?if (count($arElement["OFFERS"]) > 0) {?>
    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" class="bxr-color-button" id="<?=$arItemIDs["BUY_LINK"]?>">
	<?=GetMessage("MORE_INFO_TITLE")?>
    </a>
<?} else {?>
    <?if ($arElement["CATALOG_QUANTITY"] <= 0 && $arElement["CATALOG_CAN_BUY_ZERO"] == "N") {?>
        <button class="bxr-color-button bxr-trade-request" value="<?=$arElement["ID"]?>" 
                        data-trade-id="<?=$arElement["ID"]?>"
                        data-trade-name="<?=$arElement["NAME"]?>"
                        data-trade-link="<?=$arElement["DETAIL_PAGE_URL"]?>"
                        data-msg="<?=str_replace('#TRADE_NAME#', $arElement["NAME"], GetMessage('TRADE_REQUEST_MSG'))?>">
            <?=GetMessage("REQUEST_BTN")?>
        </button>
    <?} else {?>
        <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg" action="">
            <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$arElement["ID"]?>">
            <input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$arElement["ID"]?>">
            <input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$arElement["ID"]?>" data-max="<?=$arElement["CATALOG_QUANTITY"]?>">
            <button class="bxr-color-button bxr-color-button-small-only-icon bxr-basket-add">
                <span class="fa fa-shopping-cart"></span>
                <div class="bxr-cart-basket-indicator">
                    <div class="bxr-indicator-item bxr-indicator-item-basket" data-item="<?=$arElement["ID"]?>">
                        <span class="bxr-counter-item bxr-counter-item-basket" data-item="<?=$arElement["ID"]?>">0</span>
                    </div>
                </div>
            </button>
            <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$arElement["ID"]?>">
            <input type="hidden" name="action" value="add">
        </form>
        <div class="clearfix"></div>
    <?}?>
<?}?>