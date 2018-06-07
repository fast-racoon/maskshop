<!--basket-btns block-->
<?if (count($arResult["OFFERS"]) > 0) {
    foreach ($arResult["OFFERS"] as $offer) :?>
   
        <div class="offers-btn-wrap" style="display: none" data-item="<?=$offer["ID"]?>">
            <?if ($offer["CATALOG_QUANTITY"] <= 0 && $offer["CATALOG_CAN_BUY_ZERO"] == "N") :?>
                <button class="bxr-color-button bxr-trade-request" value="<?=$offer["ID"]?>">
		    <?if (strlen($arParams["MESS_BTN_REQUEST"]) > 0):?>
			<?=$arParams["MESS_BTN_REQUEST"]?>
		    <?else:?>
                        <?=GetMessage("REQUEST_BTN")?>
		    <?endif;?>
                </button>
            <? else:
                $qtyMax = ($offer["CATALOG_CAN_BUY_ZERO"] == "Y") ? 0 : $offer["CATALOG_QUANTITY"];?>
                <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg" action="">
                    <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$offer["ID"]?>">
                    <input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$offer["ID"]?>">
                    <input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$offer["ID"]?>" data-max="<?=$qtyMax?>">
                    <button class="bxr-color-button bxr-basket-add" style="background: #0ba72a !important;">
                            <?/*!--<span class="fa fa-shopping-cart"></span>--*/?>
		    <?if (strlen($arParams["MESS_BTN_BUY"]) > 0):?>
			<?=$arParams["MESS_BTN_BUY"]?>
		    <?else:?>
	                <?=GetMessage("TO_BASKET")?>
		    <?endif;?>
                    </button>
                    <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$offer["ID"]?>">
                    <input type="hidden" name="action" value="add">
                </form>
		<?if ($useOneClick):?>
                <!--one click buy block-->
                <div class="bxr-basket-action">
					<button class="bxr-color-button bxr-one-click-buy" data-item="<?=$offer["ID"]?>" style="background: #ff6953 !important;">
		    <?if (strlen($arParams["USE_ONE_CLICK_TEXT"]) > 0):?>
			<?=$arParams["USE_ONE_CLICK_TEXT"]?>
		    <?else:?>
	                <?=GetMessage("ONE_CLICK_BUY")?>
		    <?endif;?>
                    </button>
                </div>
		<?endif;?>
                <div class="clearfix"></div>
            <?endif;?>
        </div>
<?  endforeach;?>
<?} else {?>
    <?if ($arResult["CATALOG_QUANTITY"] <= 0 && $arResult["CATALOG_CAN_BUY_ZERO"] == "N") {?>
        <button class="bxr-color-button bxr-trade-request" value="<?=$arResult["ID"]?>">
	    <?if (strlen($arParams["MESS_BTN_REQUEST"]) > 0):?>
		<?=$arParams["MESS_BTN_REQUEST"]?>
	    <?else:?>
                        <?=GetMessage("REQUEST_BTN")?>
	    <?endif;?>
        </button>
    <?} else {
        $qtyMax = ($arResult["CATALOG_CAN_BUY_ZERO"] == "Y") ? 0 : $arResult["CATALOG_QUANTITY"];?>
        <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg" action="">
            <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$arResult["ID"]?>">
            <input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$arResult["ID"]?>">
            <input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$arResult["ID"]?>" data-max="<?=$qtyMax?>">
            <button class="bxr-color-button bxr-basket-add" style="background: #0ba72a !important;">
                    <? // !--<span class="fa fa-shopping-cart"></span>-- ?>
		    <?if (strlen($arParams["MESS_BTN_BUY"]) > 0):?>
			<?=$arParams["MESS_BTN_BUY"]?>
		    <?else:?>
	                <?=GetMessage("TO_BASKET")?>
		    <?endif;?>
            </button>
            <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$arResult["ID"]?>">
            <input type="hidden" name="action" value="add">
        </form>
	<?if ($useOneClick):?>	
        <!--one click buy block-->
        <div class="bxr-basket-action">
            <button class="bxr-color-button bxr-one-click-buy" data-item="<?=$arResult["ID"]?>" style="background: #ff6953 !important;">
	    <?if (strlen($arParams["USE_ONE_CLICK_TEXT"]) > 0):?>
		<?=$arParams["USE_ONE_CLICK_TEXT"]?>
	    <?else:?>
                <?=GetMessage("ONE_CLICK_BUY")?>
	    <?endif;?>
            </button>
        </div>
	<?endif;?>
        <div class="clearfix"></div>
    <?}?>
<?}?>

    <?if ($useShare || $useCompare || $useFavorites):?>
    <div class="bxr-detail-torg-btn">
        <?if ($useShare):?>
        <!--share block-->
        <div class="bxr-share-group">
            <span class="fa fa-share-alt hidden-md"></span>
	    <?if (strlen($arParams["USE_SHARE_TEXT"]) > 0):?>
		<?=$arParams["USE_SHARE_TEXT"]?>
	    <?else:?>
	    	<?=GetMessage("SHARE")?>
	    <?endif;?>
        </div>
	<?endif;?>
        <?if ($useCompare):?>
        <!--compare block-->
        <div class="bxr-basket-group">
            <button class="bxr-indicator-item white bxr-indicator-item-compare bxr-compare-button" value="" data-item="<?=$arResult["ID"]?>">
                <span class="fa fa-bar-chart hidden-md" aria-hidden="true"></span>
		    <?if (strlen($arParams["MESS_BTN_COMPARE"]) > 0):?>
			<?=$arParams["MESS_BTN_COMPARE"]?>
		    <?else:?>
		    	<?=GetMessage("COMPARE")?>
		    <?endif;?>
            </button>
        </div>
        <?endif;?>
        <?if ($useFavorites):?>
        <!--favor block-->
        <form class="bxr-basket-action bxr-basket-group" action="">
            <button class="bxr-indicator-item white bxr-indicator-item-favor bxr-basket-favor" data-item="<?=$arResult["ID"]?>" tabindex="0">
                <span class="fa fa-heart-o hidden-md"></span>
		    <?if (strlen($arParams["USE_FAVORITES_TEXT"]) > 0):?>
			<?=$arParams["USE_FAVORITES_TEXT"]?>
		    <?else:?>
	                <?=GetMessage("FAVORITES")?>
		    <?endif;?>
            </button>
            <input type="hidden" name="item" value="<?=$arResult["ID"]?>" tabindex="0">
            <input type="hidden" name="action" value="favor" tabindex="0">
            <input type="hidden" name="favor" value="yes">
        </form>
	<?endif;?>
        <div class="clearfix"></div>
    </div>
    <?endif;?>
    <?if ($useShare):?>
	<div class="bxr-share-icon-wrap">
	    <?$APPLICATION->IncludeComponent(
	            "bitrix:main.share",
	            "element_detail",
	            Array(
	                    "COMPONENT_TEMPLATE" => ".default",
	                    "HANDLERS" => $arParams["HANDLERS"],
	                    "HIDE" => "N",
	                    "PAGE_TITLE" => $arResult["NAME"],
	                    "PAGE_URL" => $arResult["DETAIL_PAGE_URL"],
	                    "SHORTEN_URL_KEY" => "",
	                    "SHORTEN_URL_LOGIN" => ""
	            ),
	            false,
	            array("HIDE_ICONS" => "Y")
	    );?>        
	</div>
    <?endif;?>
    <a id="showHere"></a>
       <script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/headhesive.js"></script>

    <script>

        // Set options
        var options = {
            offset: '#showHere',
            offsetSide: 'top',
            classes: {
                clone:   'banner--clone',
                stick:   'banner--stick',
                unstick: 'banner--unstick'
            }
        };

        // Initialise with options
		var banner = new Headhesive('.banner', options);

        // Headhesive destroy
        // banner.destroy();

    </script>