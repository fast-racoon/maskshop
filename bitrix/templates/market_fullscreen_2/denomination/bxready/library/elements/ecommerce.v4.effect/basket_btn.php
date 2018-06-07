<!--basket-btns block-->
<?if (count($arElement["OFFERS"]) > 0) {?>
    <a href="<?=$arElement["DETAIL_PAGE_URL"]?>" id="<?=$arItemIDs["BUY_LINK"]?>">
	<span class="fa fa-external-link"></span>
    </a>
    <div class="btn-tooltip"><?=GetMessage("DETAIL_T")?><i class="fa fa-caret-down"></i></div>
<?} else {?>
	<?if ($arElement["CATALOG_QUANTITY"] <= 0 && $arElement["CATALOG_CAN_BUY_ZERO"] == "N") {?>
            <button class="bxr-trade-request" value="<?=$arElement["ID"]?>"
                            data-trade-id="<?=$arElement["ID"]?>"
                            data-trade-name="<?=$arElement["NAME"]?>"
                            data-trade-link="<?=$arElement["DETAIL_PAGE_URL"]?>"
                            data-msg="<?=str_replace('#TRADE_NAME#', $arElement["NAME"], GetMessage('TRADE_REQUEST_MSG'))?>">
                    <i class="fa fa-pencil-square-o"></i>
            </button>
            <div class="btn-tooltip"><?=GetMessage("REQUEST_T")?><i class="fa fa-caret-down"></i></div>
	<?} else {
            $qtyMax = ($arElement["CATALOG_CAN_BUY_ZERO"] == "Y") ? 0 : $arElement["CATALOG_QUANTITY"];?>
            <div class="bxr-basket-btn-wr">
                <button class="bxr-basket-btn-form">
                    <span class="fa fa-shopping-cart"></span>
                </button>
		<form class="bxr-basket-action bxr-basket-group bxr-currnet-torg" action="">
                        <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$arElement["ID"]?>">
			<input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$arElement["ID"]?>">
			<input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$arElement["ID"]?>" data-max="<?=$qtyMax?>">
			<button class="bxr-color-button bxr-color-button-small-only-icon bxr-basket-add">
				<span class="fa fa-shopping-cart"></span>
			</button>
			<input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$arElement["ID"]?>">
			<input type="hidden" name="action" value="add">
                        <i class="fa fa-caret-down"></i>
		</form>
		<div class="clearfix"></div>
            </div>
            <div class="btn-tooltip"><?=GetMessage("ADD_TO_BASKET_T")?><i class="fa fa-caret-down"></i></div>
	<?}?>
<?}?>