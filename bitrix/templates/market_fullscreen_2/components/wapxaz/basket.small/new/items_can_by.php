<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (count($arResult["BASKET_ITEMS"]["CAN_BUY"])>0){?>

	<div class="basket-body-title">
		<div class="">
				<span class="top_cart_title"><?=GetMessage('BASKET_PRODUCTS')?>:
				<span class="gray-line top_cart_title_val"><b><?=count($arResult["BASKET_ITEMS"]["CAN_BUY"])?></b></span>
					<span class="top_cart_title"><?=GetMessage('BASKET_SUM')?></span>
					<span class="gray-line top_cart_title_val"><b><span class="bxr-format-price"><?=$arResult["FORMAT_SUMM"]?></span></b></span>
					<?/*<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="bxr-color-button" style="background: #02a836 !important;">
						<span class="fa fa-check-square-o" aria-hidden="true"></span>
						<?=GetMessage('BASKET_TO_ORDER')?></a>*/?>

<button class="bxr-close-basket">X</button>

                                    <div class="clearfix"></div>
                                </span>
		</div>
            <div class="clearfix"></div>
	</div>

	<table width="100%">
		<tr>
			<th colspan="2" class="first" style="font-weight: normal;"><?=GetMessage('BASKET_TD_NAME')?></th>
			<th style="font-weight: normal; text-align: center;"><?=GetMessage('BASKET_TD_PRICE')?></th>
			<th style="font-weight: normal; text-align: center;"><?=GetMessage('BASKET_TD_QTY')?></th>
			<th style="font-weight: normal; text-align: center;"><?=GetMessage('BASKET_TD_SUM')?></th>
			<th style="font-weight: normal; text-align: center;" class="last">&nbsp;</th>
		</tr>
		<?foreach($arResult["BASKET_ITEMS"]["CAN_BUY"] as $arBasketItem):

			$img = $arBasketItem["PICTURE"];
			$img = (strlen($img)>0)
				? '<a href="'.$arBasketItem["URL"].'"
						style="background: url('.$img.') no-repeat center center;
						background-size: contain;
						"></a>'
				: "&nbsp;";
			?>
			<tr>
				<td class="basket-image first">
					<?=$img?>
					<?if ($img){?>
					<?}else{?>
					<?}?>
				</td>
				<td class="basket-name xs-hide"><a href="<?=$arBasketItem["URL"]?>" class="bxr-font-hover-light"><?=$arBasketItem["NAME"]?></a></td>
				<td class="basket-price bxr-format-price"><?=$arBasketItem["FORMAT_PRICE"]?></td>
				<td class="basket-line-qty xs-hide sm-hide">
					<div class="bxr-basket-group">
					<input type="button" class="bxr-quantity-button-minus" value="-" data-item="<?=$arBasketItem["ID"]?>" data-operation="auto_save">
					<input type="text" value="<?=round($arBasketItem["QUANTITY"])?>" class="bxr-quantity-text" name="quantity" data-item="<?=$arBasketItem["ID"]?>">
					<input type="button" class="bxr-quantity-button-plus" value="+" data-item="<?=$arBasketItem["ID"]?>" data-operation="auto_save" data-max="0">
					</div>

				</td>
				<td class="basket-summ bxr-format-price"><?=$arBasketItem["FORMAT_SUMM"]?></td>
				<td class="basket-action last">
					<button id="button-delay-<?=$arBasketItem["ID"]?>" class="icon-button-delay" value="" data-item="<?=$arBasketItem["ID"]?>" style=" background: none; ">
						<?/*<span class="fa fa-bookmark-o" aria-hidden="true"></span>*/?>
						<img src="/images/ico_like.png">
					</button>
					<button id="button-delay-<?=$arBasketItem["ID"]?>" class="icon-button-delete" value="" data-item="<?=$arBasketItem["ID"]?>" style=" background: none; ">
						<?/*<span class="fa fa-close" aria-hidden="true"></span>*/?>
						<img src="/images/ico_close.png">
					</button>

				</td>
			</tr>
		<?endforeach;?>
	</table>

	<div class="basket-body-title">
		<div class="pull-right" style=" margin: 10px 0; ">
			<?/*<button class="btn btn-default bxr-close-basket bxr-corns">
				<span class="fa fa-power-off" aria-hidden="true"></span>
				<?=GetMessage('BASKET_CLOSE')?></button>*/?>

				<a href="<?=$arParams["PATH_TO_BASKET"]?>" class="bxr-color-button" style="background: #02a836 !important; border-radius: 10px; text-transform: uppercase; font-weight: bold; color: #000;">
						<?/*<span class="fa fa-check-square-o" aria-hidden="true"></span>*/?>
						<?=GetMessage('BASKET_TO_ORDER')?></a>

		</div>
	</div>

<?}else{?>
	<div class="basket-body-title">
		<div class="">
			<button class="bxr-close-basket">X</button>
		</div>
        <div class="clearfix"></div>
	</div>
	<div class="noOrders">
		<div class="txt"><?=GetMessage('SPOL_TPL_EMPTY_ORDER_LIST')?></div>
		<br><br>
		<div class="img"><img src="/images/personal/girl-order-no.png"></div>
		<br><br>
		<a href="/catalog/" class="green_btn">
			<?=GetMessage('SPOL_TPL_EMPTY_ORDER_LIST_START_BUY_NOW')?>
		</a>
		<br>
	</div>
	<?/*
	<p class="bxr-helper bg-info">
		<?=GetMessage('BASKET_DROP_EMPTY')?>
	</p>*/?>
<?}?>
<div class="icon-close"></div>