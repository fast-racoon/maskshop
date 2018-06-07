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
                <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg">
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
     <header class="banner hidden-xs">
	     <div class="container">
	     <div class="row">
		     <div class="col-lg-2 col-sm-3">
			     <div style="margin-top: 16px;">
			     		<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/mobile_phone.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_MOBILE_PHONE")
						),
						false
					);?>
			     </div>
		     </div>  
		     
	     <div class="col-lg-6 col-sm-4">  
			<div style="display:block; width:100%;overflow:hidden;">		     
						 <h2 class="topNameSm" style="float: left;
												margin-right: 10px;
												margin: 15px 2px;">
								<?=$arResult["PREVIEW_TEXT"];?>
							</h2>
			</div>
	     </div>
<div class="col-lg-1 col-sm-1">
	<div id="pri" style="margin-top: 12px;
    font-size: 17px;
    font-weight: bold;"></div>
</div>	     

	     <div class="col-lg-1 col-sm-2">
		     
        <?if ($useFavorites):?>
        <!--favor block-->
        <form class="bxr-basket-action bxr-basket-group topBtnFavAndSravnSm">
            <button style="background: #fff;color:#000; box-shadow: none !important;font-size: 9px;    margin-top: 8px;" class="bxr-indicator-item white bxr-indicator-item-favor bxr-basket-favor" data-item="<?=$arResult["ID"]?>" tabindex="0">
                <span style="display: block;
    font-size: 2em;" class="fa fa-heart-o"></span>

            </button>
            <input type="hidden" name="item" value="<?=$arResult["ID"]?>" tabindex="0">
            <input type="hidden" name="action" value="favor" tabindex="0">
            <input type="hidden" name="favor" value="">
        </form>
	<?endif;?>		     
         <form class="bxr-basket-action bxr-basket-group bxr-currnet-torg topBtnFavAndSravnSm" >
            <button style="background: #fff;color:#000; box-shadow: none !important;font-size: 9px;    margin-top: 8px;"class="bxr-color-button bxr-basket-add" id="addBasketTopDetailEl" style="background: #0ba72a !important;">
                   <span style="display: block;
    font-size: 2em;"class="fa fa-shopping-cart"></span>

            </button>
            <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$arResult["ID"]?>">
            <input type="hidden" name="action" value="add">
        </form>    
	     </div>	     
	     <div class="col-lg-2 col-sm-2">
			<?if ($useOneClick):?>
					<!--one click buy block-->
					<div class="bxr-basket-action" style="margin-top: 8px;">
						<button class="bxr-color-button bxr-one-click-buy topBtn1bcSm" data-item="<?=$offer["ID"]?>" style="background: #02a836 !important;">
				<?if (strlen($arParams["USE_ONE_CLICK_TEXT"]) > 0):?>
				<?=$arParams["USE_ONE_CLICK_TEXT"]?>
				<?else:?>
						<?=GetMessage("ONE_CLICK_BUY")?>
				<?endif;?>
						</button>
					</div>
			<?endif;?>
	     </div>
	     </div>
		</div>
    </header> 
    <script>
        trade_name = "<?=$arResult['NAME']?>";
        trade_id = "<?=$arResult['ID']?>";
        trade_link = "<?=$arResult['DETAIL_PAGE_URL']?>";
        formRequestMsg = "<?=GetMessage('TRADE_REQUEST_MSG')?>";
        formRequestMsg = formRequestMsg.replace("#TRADE_NAME#",'<?=htmlspecialchars($arResult['NAME'],ENT_QUOTES, SITE_CHARSET)?>');
    </script>
    <?if ($arResult["CATALOG_QUANTITY"] <= 0 && $arResult["CATALOG_CAN_BUY_ZERO"] == "N") {?>
        <button class="bxr-color-button bxr-trade-request" value="<?=$arResult["ID"]?>" onclick="yaCounter36717630.reachGoal('ostavit_zayavku'); return true;">
	    <?if (strlen($arParams["MESS_BTN_REQUEST"]) > 0):?>
		<?=$arParams["MESS_BTN_REQUEST"]?>
	    <?else:?>
                        <?=GetMessage("REQUEST_BTN")?>!
	    <?endif;?>
        </button>
    <?} else {
        $qtyMax = ($arResult["CATALOG_CAN_BUY_ZERO"] == "Y") ? 0 : $arResult["CATALOG_QUANTITY"];?>
        <form id="formBtn" class="bxr-basket-action bxr-basket-group bxr-currnet-torg sticky-element">
<div class="topBlock" style="display: inline-block;">
            <input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$arResult["ID"]?>">
            <input type="text" name="quantity" value="1" class="bxr-quantity-text" data-item="<?=$arResult["ID"]?>">
            <input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$arResult["ID"]?>" data-max="<?=$qtyMax?>">

			<div class="bxr-share-group">
				<span id="btnShare" class="fa fa-share-alt hidden-sm hidden-xs"></span>
				<div class="hidden-sm hidden-xs">Поделиться</div>
			</div>

			<div class="bxr-detail-torg-btn bxr-basket-action bxr-basket-group" style="float: right;">
				<span id="btnFavoritesMob" class="fa fa-heart-o" onclick="$('#btnFavorites').click();changeFavorites();"></span>
				<div onclick="$('#btnFavorites').click();changeFavorites();" class="hidden-sm hidden-xs">Избранное</div>
			</div>
</div>
			<?if ($useShare):?>
			<div class="bxr-share-icon-wrap hidden-sm hidden-xs">
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
<span class="sticky-anchor"></span>
<div class="boottomBlock sticky-content" style="display: inline-block; vertical-align: top; z-index:1000;">
            <button class="bxr-color-button bxr-basket-add" style="background: #0ba72a !important;" onclick="yaCounter36717630.reachGoal('kupit'); $('#addBasketTopDetailEl').click(); false;">
                    <? // !--<span class="fa fa-shopping-cart"></span>-- ?>
		    <?if (strlen($arParams["MESS_BTN_BUY"]) > 0):?>
			<?=$arParams["MESS_BTN_BUY"]?>
		    <?else:?>
	                <?=GetMessage("TO_BASKET")?>
		    <?endif;?>
            </button>

	<?if ($useOneClick):?>	
        <!--one click buy block-->
		<div class="bxr-basket-action" style="float:right; margin: 0;">
            <button class="bxr-color-button bxr-one-click-buy" data-item="<?=$arResult["ID"]?>" style="background: #ff6953 !important;">
	    <?if (strlen($arParams["USE_ONE_CLICK_TEXT"]) > 0):?>
		<?=$arParams["USE_ONE_CLICK_TEXT"]?>
	    <?else:?>
                <?=GetMessage("ONE_CLICK_BUY")?>
	    <?endif;?>
            </button>
        </div>
	<?endif;?>
</div>
            <input class="bxr-basket-item-id" type="hidden" name="item" value="<?=$arResult["ID"]?>">
            <input type="hidden" name="action" value="add">
        </form>

	<?/*if ($useOneClick):?>	
        <!--one click buy block-->
        <div class="bxr-basket-action hidden-sm hidden-xs btn1cb">
            <button class="bxr-color-button bxr-one-click-buy" data-item="<?=$arResult["ID"]?>" style="background: #ff6953 !important;">
	    <?if (strlen($arParams["USE_ONE_CLICK_TEXT"]) > 0):?>
		<?=$arParams["USE_ONE_CLICK_TEXT"]?>
	    <?else:?>
                <?=GetMessage("ONE_CLICK_BUY")?>
	    <?endif;?>
            </button>
        </div>
	<?endif;*/?>
        <div class="clearfix"></div>
    <?}?>
<?}?>

    <?if ($useShare || $useCompare || $useFavorites):?>
	<div class="bxr-detail-torg-btn hidden-sm hidden-xs" style="display:none;">
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
        <form class="bxr-basket-action bxr-basket-group hidden-sm hidden-xs">
				<button id="btnFavorites" class="bxr-indicator-item white bxr-indicator-item-favor bxr-basket-favor" data-item="<?=$arResult["ID"]?>" tabindex="0">
					<span class="fa fa-heart-o hidden-md"></span>
				<?if (strlen($arParams["USE_FAVORITES_TEXT"]) > 0):?>
				<?=$arParams["USE_FAVORITES_TEXT"]?>
				<?else:?>
						<?=GetMessage("FAVORITES")?>
				<?endif;?>
				</button>
            <input type="hidden" name="item" value="<?=$arResult["ID"]?>" tabindex="0">
            <input type="hidden" name="action" value="favor" tabindex="0">
			<input id="favoritesBool" type="hidden" name="favor" value="yes">
        </form>

		<script>
			function changeFavorites()
			{
				//var style = 'background: #f44336;color: #ffffff;';
				var style = 'color: #f44336;';
				var curStyle = $('#btnFavoritesMob').attr('style');
				if(curStyle != style)
				{
					$('#btnFavoritesMob').attr('style', style);
					fbq('track', 'AddToWishlist', {});//включаю отслеживание в пикселе фейсбука
				}
				else
				{
					$('#btnFavoritesMob').attr('style', '');
				}
			}
			function changeFavoritesStart()
			{
				//var style = 'background: #f44336;color: #ffffff;';
				var style = 'color: #f44336;';
				var classActive = 'bxr-indicator-item white bxr-indicator-item-favor bxr-basket-favor bxr-indicator-item-active';
				var curClass = $('#btnFavorites').attr('class');
				if(curClass == classActive)
				{
					$('#btnFavoritesMob').attr('style', style);
				}
				else
				{
					$('#btnFavoritesMob').attr('style', '');
				}
			}
			$( window ).load(function() {
				changeFavoritesStart();
			});
		</script>

	<?endif;?>
        <div class="clearfix"></div>
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
<style>
@media (min-width: 768px) and (max-width: 991px)
{
	#pri
	{
		font-size: 9px !important;
		margin-top: 22px !important;
	}
}
@media (min-width: 992px) and (max-width: 1199px)
{
	#pri
	{
		font-size: 11px !important;
		margin-top: 17px !important;
	}
}
@media (max-width: 1200px)
{
	.topNameSm
	{
		font-size: 14px;
		height: 32px;
    	overflow: hidden;
	}
	.topBtn1bcSm /*.bxr-one-click-buy.bxr-color-button*/
	{
		font-size: 8px !important;
	}
	.topBtnFavAndSravnSm /*.bxr-basket-action*/
	{
   		margin-bottom: 0;
	}
	/*.bxr-basket-action button
	{
		font-size: 6px !important;
		margin-top: 0 !important;
		padding-top: 4px;
    	padding-bottom: 4px;
	}*/
}

@media (max-width: 600px)
{
	#formBtn .boottomBlock
	{
    	font-family: "Open Sans";
		font-weight: bold;
		/*font-family: Open Sans Bold;*/
		float: left;
		padding-top: 10px;
 	    width: 112%;
    	margin: 0 0 0 -12%;
	}
	#formBtn .boottomBlock .bxr-basket-add
	{
		font-size: 14px;
		border: 1px solid #02a836;
		color: #02a836;
		margin-left: -5% !important;
		margin-right: 0px !important;
		width: 58%;
			/*float: left;*/
		padding: 17px 8px;
	    border-radius: 0px;
	}
	#formBtn .boottomBlock .bxr-basket-action
	{
		border: 1px solid #02a836;
		margin-right: -11% !important;
		width: 58%;
		padding: 0;
	}
	#formBtn .boottomBlock .bxr-basket-action button
	{
		padding: 17px 0 !important;
		width: 100%;
		margin-bottom: 0px !important;
	    border-radius: 0px;
	    height: 54px;
	}
	#formBtn .bxr-quantity-button-minus, 
	#formBtn .bxr-quantity-text,
	#formBtn .bxr-quantity-button-plus
	{
		margin-top: -6px;
	}
	.sticky-content{
		overflow: hidden;
		/*background: #DaD;
		padding: 10px;*/
	}
	
	.sticky-content.fixed{
		overflow: visible;
		position: fixed;
		bottom: 0px;
		left: 16%;
		max-width: 87%;
		z-index: 500;
	    padding-top: 0px !important;
	}
	.bxr-detail-tabs {
		text-align: center;
	}
	.bxr-detail-tabs li {
		float: none !important;
		display: inline-block;
	}
}
@media (min-width: 414px) and (max-width: 600px)
{
	#formBtn .boottomBlock .bxr-basket-add
	{
		width: 57%;
	}
}
@media (max-width: 365px)
{
	.bxr-detail-tabs li {
	    padding: 9px !important;
	}
}
@media (max-width: 992px)
{
	#formBtn
	{
		/*width: 100%;
		padding: 0 10px;*/
		width: 112%;
		padding: 25px 25px 12px 40px;
		background: #f6f6f7;
		margin: 0 0 0 -6%;
		text-align: center;
	}
	#formBtn .topBlock
	{
		display: block !important;
	}
	#btnFavoritesMob
	{
		font-size: 25px;
		float: right;
		margin-right: 60px;
  	    cursor: pointer;
	}
}
@media (min-width: 992px) and (max-width: 1199px)
{
	#formBtn .topBlock .bxr-share-group, 
	#formBtn .topBlock .bxr-basket-group 
	{
    	font-size: 12px !important;
	}
}
@media (min-width: 992px)/* and (max-width: 1200px)*/
{
	#formBtn
	{
			/*max-width: 105px;*/
		width: 100%;
	}
	#formBtn .topBlock
	{
		display: inline-block;
		width: 100%;
		padding: 14px 15px;
		background: #f6f6f7;
		text-align: center;
		height: 70px;
	}
	#formBtn .bxr-quantity-button-minus, 
	#formBtn .bxr-quantity-text,
	#formBtn .bxr-quantity-button-plus
	{
		margin-top: 5px;
	}
	#formBtn .topBlock .bxr-share-group 
	{
		display: inline-block;
		padding: 2px;
		margin-top: -3px;
	}
	#formBtn .topBlock .bxr-share-group:hover
	{
		border: 1px solid #d4d4d6;
		border-radius: 4px;
		padding: 2px;
	}
	#formBtn .topBlock .bxr-basket-group 
	{
		padding: 2px;
		margin-top: -3px;
	}
	#formBtn .topBlock .bxr-basket-group:hover
	{
		border: 1px solid #d4d4d6;
		border-radius: 4px;
		padding: 2px;
		margin-right: -2px;
	}
	#formBtn .bxr-share-icon-wrap
	{
    	left: 30%;
	}
	#btnFavoritesMob, #btnShare
	{
    	font-size: 20px;
	}
	#formBtn .boottomBlock
	{
		width: 100%;
    	margin: 20px 0px;
	}
	#formBtn .boottomBlock .bxr-basket-add
	{
		font-size: 14px;
		border: 1px solid #02a836;
		color: #02a836;
	    height: 60px;
		width: 49%;
	    margin-right: 0px !important;
	}
	#formBtn .boottomBlock .bxr-basket-action
	{
		border: 1px solid #02a836;
		width: 50%;
		border-radius: 2px;
	}
	#formBtn .boottomBlock .bxr-basket-action button
	{
		width: 100%;
		margin-bottom: 0px !important;
	    border-radius: 0px;
	    height: 58px;
	}
}
</style>