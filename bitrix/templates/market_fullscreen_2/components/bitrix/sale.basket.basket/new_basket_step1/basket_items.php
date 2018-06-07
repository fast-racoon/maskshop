<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Sale\DiscountCouponsManager;

if (!empty($arResult["ERROR_MESSAGE"]))
	ShowError($arResult["ERROR_MESSAGE"]);

$bDelayColumn  = false;
$bDeleteColumn = false;
$bWeightColumn = false;
$bPropsColumn  = false;
$bPriceType    = false;

if ($normalCount > 0):
?>
<?$countElBasket = 0;;
foreach ($arResult["GRID"]["ROWS"] as $k => $arItem)
{
	if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y")
	{
		$countElBasket++;
	}
};?>
<div class="count_cart hidden-lg hidden-md">Товары: <b><?echo $countElBasket;?></b></div>
<div id="basket_items_list">
	<div class="bx_ordercart_order_table_container">
		<table id="basket_items">
			<thead>
				<tr>
					<td class="margin"></td>
					<?
					foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):
						$arHeader["name"] = (isset($arHeader["name"]) ? (string)$arHeader["name"] : '');
						if ($arHeader["name"] == '')
							$arHeader["name"] = GetMessage("SALE_".$arHeader["id"]);
						$arHeaders[] = $arHeader["id"];

/*if($arHeader["id"] == "PRICE")
{
	$arResult["GRID"]["HEADERS"][$id] = "";
}*/

						// remember which values should be shown not in the separate columns, but inside other columns
						if (in_array($arHeader["id"], array("TYPE")))
						{
							$bPriceType = true;
							continue;
						}
						elseif ($arHeader["id"] == "PROPS")
						{
							$bPropsColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "DELAY")
						{
							$bDelayColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "DELETE")
						{
							$bDeleteColumn = true;
							continue;
						}
						elseif ($arHeader["id"] == "WEIGHT")
						{
							$bWeightColumn = true;
						}

						if ($arHeader["id"] == "NAME"):
						?>
							<td class="item" colspan="2" id="col_<?=$arHeader["id"];?>">
						<?
						elseif ($arHeader["id"] == "PRICE"):
						?>
								<td class="price hidden-lg hidden-md" id="col_<?=$arHeader["id"];?>" style="display:none;">
						<?
						else:
						?>
								<td class="custom <?if($arHeader["id"] == "DISCOUNT"){?>hidden-lg hidden-md<?}?>" id="col_<?=$arHeader["id"];?>" <?if($arHeader["id"] == "QUANTITY"){?>style="padding-left: 20px;"<?}?>>
						<?
						endif;
						?>
									<?=$arHeader["name"];?><?if($arHeader["id"] == "NAME"){?>: <b><?echo $countElBasket;//COUNT($arResult["GRID"]["ROWS"]);?></b><?}?>
							</td>
					<?
					endforeach;

					if ($bDeleteColumn || $bDelayColumn):
					?>
						<td class="custom"></td>
					<?
					endif;
					?>
						<td class="margin"></td>
				</tr>
			</thead>

			<tbody>
				<?$tmpCount = 0;
				foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):
					$tmpCount++;
					if ($arItem["DELAY"] == "N" && $arItem["CAN_BUY"] == "Y"):
				?>
				<!--<pre><?print_r($arItem)?></pre>-->
				<tr id="<?=$arItem["ID"]?>" <?if($tmpCount == COUNT($arResult["GRID"]["ROWS"])){?>style="border-bottom: none !important;"<?}?>>
						<td class="margin"></td>
						<?
						foreach ($arResult["GRID"]["HEADERS"] as $id => $arHeader):

							if (in_array($arHeader["id"], array("PROPS", "DELAY", "DELETE", "TYPE"))) // some values are not shown in the columns in this template
								continue;

							if ($arHeader["id"] == "NAME"):
							?>
								<td class="item hidden-lg hidden-md" style="width: 106%; margin: 0 0 0 -2% !important; background: #f6f6f7; padding: 0;">
									<h2 class="bx_ordercart_itemtitle" style="font-weight: normal; padding: 15px 10px; font-size: 14px;">
										<?if (strlen($arItem["PARENT"]["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["PARENT"]["DETAIL_PAGE_URL"] ?>"><?endif;?>
											<?=$arItem["NAME"]?>
										<?if (strlen($arItem["PARENT"]["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
									</h2>
									<div class="bx_ordercart_itemart bx_ordercart_itemart_new">
<?
								if ($bDelayColumn):
								?>
								<a class="bxr-icon-button-delay-big-baske" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delay"])?>" style="display: inline-block;"><img src="/images/ico_like.png"><?/*<span class="fa fa-heart-o" aria-hidden="true"></span>*/?></a>
								<?
								endif;?>&nbsp;<?
								if ($bDeleteColumn):
								?>
								<a class="bxr-icon-button-delete-big-baske" title="Удалить" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>" style="display: inline-block;"><img src="/images/ico_close.png"><?/*<span class="fa fa-close" aria-hidden="true"></span>*/?></a>
								<?
								endif;
								?>

										<?/*
										if ($bPropsColumn):
											foreach ($arItem["PROPS"] as $val):

												if (is_array($arItem["SKU_DATA"]))
												{
													$bSkip = false;
													foreach ($arItem["SKU_DATA"] as $propId => $arProp)
													{
														if ($arProp["CODE"] == $val["CODE"])
														{
															$bSkip = true;
															break;
														}
													}
													if ($bSkip)
														continue;
												}

												echo $val["NAME"].":&nbsp;<span>".$val["VALUE"]."<span><br/>";
											endforeach;
										endif;
										*/?>
									</div>
								</td>
								<td class="itemphoto" style="min-width: 180px; min-height: 155px; line-height: 45px; padding-top: 6%;">
									<div class="bx_ordercart_photo_container">
										<?
										if (strlen($arItem["PREVIEW_PICTURE_SRC"]) > 0):
											$url = $arItem["PREVIEW_PICTURE_SRC"];
										elseif (strlen($arItem["DETAIL_PICTURE_SRC"]) > 0):
											$url = $arItem["DETAIL_PICTURE_SRC"];
										else:
											$url = $templateFolder."/images/no_photo.png";
										endif;
										?>

										<?if (strlen($arItem["PARENT"]["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["PARENT"]["DETAIL_PAGE_URL"] ?>"><?endif;?>
                                                                                   
                                                                                        <img src="<?=$url?>">
                                                                                   
										<?if (strlen($arItem["PARENT"]["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
									</div>
									<?
									if (!empty($arItem["BRAND"])):
									?>
									<div class="bx_ordercart_brand">
										<img alt="" src="<?=$arItem["BRAND"]?>" />
									</div>
									<?
									endif;
									?>
								</td>
								<td class="item hidden-sm hidden-xs" style=" vertical-align: middle; ">
									<h2 class="bx_ordercart_itemtitle">
										<?if (strlen($arItem["PARENT"]["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["PARENT"]["DETAIL_PAGE_URL"] ?>"><?endif;?>
											<?=$arItem["NAME"]?>
										<?if (strlen($arItem["PARENT"]["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
									</h2>
									<?/*<div class="bx_ordercart_itemart">
										<?
										if ($bPropsColumn):
											foreach ($arItem["PROPS"] as $val):

												if (is_array($arItem["SKU_DATA"]))
												{
													$bSkip = false;
													foreach ($arItem["SKU_DATA"] as $propId => $arProp)
													{
														if ($arProp["CODE"] == $val["CODE"])
														{
															$bSkip = true;
															break;
														}
													}
													if ($bSkip)
														continue;
												}

												echo $val["NAME"].":&nbsp;<span>".$val["VALUE"]."<span><br/>";
											endforeach;
										endif;
										?>
									</div>*/?>
								</td>
							<?
							elseif ($arHeader["id"] == "QUANTITY"):
							?>
								<td class="custom mobQnt" style=" vertical-align: middle; padding-top: 35px; ">
									<span class="qnt_span">Кол-во<?//=$arHeader["name"]; ?>:</span>
									<div class="centered">
										<table cellspacing="0" cellpadding="0" class="counter">
											<tr style="border-bottom: none !important;">
												<td>
													<?
													$ratio = isset($arItem["MEASURE_RATIO"]) ? $arItem["MEASURE_RATIO"] : 0;
													$max = isset($arItem["AVAILABLE_QUANTITY"]) ? "max=\"".$arItem["AVAILABLE_QUANTITY"]."\"" : "";
													$useFloatQuantity = ($arParams["QUANTITY_FLOAT"] == "Y") ? true : false;
													$useFloatQuantityJS = ($useFloatQuantity ? "true" : "false");
                                                                                                        
                                                                                                        if (!isset($arItem["MEASURE_RATIO"]))
                                                                                                        {
                                                                                                            $arItem["MEASURE_RATIO"] = 1;
                                                                                                        }

                                                                                                        $buttonControl = false;
                                                                                                        if (floatval($arItem["MEASURE_RATIO"]) != 0)
                                                                                                            $buttonControl = true;
                                                                                                        
													?>
                                                                                                        <?if($buttonControl):?>
                                                                                                            <a href="javascript:void(0);" class="minus bxr-quantity-button-minus-big-basket" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'down', <?=$useFloatQuantityJS?>);">-</a>
                            										<?endif;?>
                                                                                                        <input
														type="text"
														size="3"
														id="QUANTITY_INPUT_<?=$arItem["ID"]?>"
														name="QUANTITY_INPUT_<?=$arItem["ID"]?>"
														size="2"
														maxlength="18"
                                                                                                                class="bxr-quantity-text-big-basket"
														min="0"
														<?=$max?>
														step="<?=$ratio?>"
														value="<?=$arItem["QUANTITY"]?>"
														onchange="updateQuantity('QUANTITY_INPUT_<?=$arItem["ID"]?>', '<?=$arItem["ID"]?>', <?=$ratio?>, <?=$useFloatQuantityJS?>)"
													>

                                                                                                        <?if($buttonControl):?>
                                                                                                            <a href="javascript:void(0);" class="plus bxr-quantity-button-plus-big-basket" onclick="setQuantity(<?=$arItem["ID"]?>, <?=$arItem["MEASURE_RATIO"]?>, 'up', <?=$useFloatQuantityJS?>);">+</a>
                                                                                                        <?endif;?>
                                                                                                </td>                                                                                                
												<?/*
												if (isset($arItem["MEASURE_TEXT"]))
												{
													?>
														<td style="text-align: left" class="hidden-sm hidden-xs"><?=$arItem["MEASURE_TEXT"]?></td>
													<?
												}*/
												?>
											</tr>
										</table>
									</div>
									<input type="hidden" id="QUANTITY_<?=$arItem['ID']?>" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem["QUANTITY"]?>" />
								</td>
							<?
							elseif ($arHeader["id"] == "PRICE"):
							?>
								<td class="price hidden-lg hidden-md">
										<span>Цена:</span>
										<div class="current_price" id="current_price_<?=$arItem["ID"]?>">
											<?=$arItem["PRICE_FORMATED"]?>
										</div>
										<div class="old_price hidden-sm hidden-xs" id="old_price_<?=$arItem["ID"]?>">
											<?if (floatval($arItem["DISCOUNT_PRICE_PERCENT"]) > 0):?>
												<?=$arItem["FULL_PRICE_FORMATED"]?>
											<?endif;?>
										</div>

									<?if ($bPriceType && strlen($arItem["NOTES"]) > 0):?>
										<div class="type_price"><?=GetMessage("SALE_TYPE")?></div>
										<div class="type_price_value"><?=$arItem["NOTES"]?></div>
									<?endif;?>
								</td>
							<?
							elseif ($arHeader["id"] == "DISCOUNT"):
							?>
								<td class="custom hidden-lg hidden-md">
									<span><?//=$arHeader["NAME"]; ?>Скидка:</span>
									<div class="discount_value" id="discount_value_<?=$arItem["ID"]?>"><?=$arItem["DISCOUNT_PRICE_PERCENT_FORMATED"]?></div>
									<?
									if ($bDelayColumn || $bDeleteColumn):
									?>
										<span class="hidden-lg hidden-md" style="float: right; padding-right: 15px;">
											<?/*
											if ($bDelayColumn):
											?>
																			<a class="bxr-icon-button-delay-big-baske" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delay"])?>"><span class="fa fa-heart-o" aria-hidden="true"></span></a>
											<?
											endif;
											if ($bDeleteColumn):
											?>
																			<a class="bxr-icon-button-delete-big-baske" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>"><span class="fa fa-close" aria-hidden="true"></span></a>
											<?
											endif;*/?>
										</span>
									<?
									endif;
									?>
								</td>

							<?
							elseif ($arHeader["id"] == "WEIGHT"):
							?>
								<td class="custom">
									<span><?=$arHeader["name"]; ?>:</span>
									<?=$arItem["WEIGHT_FORMATED"]?>
								</td>

							<?elseif($arHeader["id"] == "SUM"):?>
								<td class="custom custom_sum" style="font-weight: bold; vertical-align: middle;">
									<span style="font-weight: bold !important;">Сумма<?//=$arHeader["name"]; ?>:</span>
									<?if($arItem["SUM_FULL_PRICE"] > $arItem["SUM_VALUE"]):?>
										<div class="summ_old_value" id="sum_old_<?=$arItem["ID"]?>">
											<?=$arItem["SUM_FULL_PRICE_FORMATED"];?>
										</div>
									<?endif;?>
									<div class="summ_value" id="sum_<?=$arItem["ID"]?>">
										<?=$arItem["SUM"];?>
									</div>
								</td>
							<?
							else:
							?>
								<td class="custom custom_sum" style="font-weight: bold; vertical-align: middle;">
									<span style="font-weight: bold !important;">Сумма<?//=$arHeader["name"]; ?>:</span>
									<?= $arItem[$arHeader["id"]];?>
								</td>
							<?
							endif;
						endforeach;

						if ($bDelayColumn || $bDeleteColumn):
						?>
							<td class="control hidden-sm hidden-xs" style=" vertical-align: middle; ">
								<?
								if ($bDelayColumn):
								?>
								<a class="bxr-icon-button-delay-big-baske" title="Добавить в избранное" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delay"])?>" style="display: inline-block;"><img src="/images/ico_like.png"><?/*<span class="fa fa-heart-o" aria-hidden="true"></span>*/?></a>
								<?
								endif;
								if ($bDeleteColumn):
								?>
								<a class="bxr-icon-button-delete-big-baske" onclick="if(!confirm('Удалить товар из корзины?')) {return false;}" title="Удалить из корзины" href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>" style="display: inline-block;"><img src="/images/ico_close.png"><?/*<span class="fa fa-close" aria-hidden="true"></span>*/?></a>
								<?
								endif;
								?>
							</td>
						<?
						endif;
						?>
							<td class="margin"></td>
					</tr>
					<?
					endif;
				endforeach;
				?>
			</tbody>
		</table>
	</div>
	<input type="hidden" id="column_headers" value="<?=CUtil::JSEscape(implode($arHeaders, ","))?>" />
	<input type="hidden" id="offers_props" value="<?=CUtil::JSEscape(implode($arParams["OFFERS_PROPS"], ","))?>" />
	<input type="hidden" id="action_var" value="<?=CUtil::JSEscape($arParams["ACTION_VARIABLE"])?>" />
	<input type="hidden" id="quantity_float" value="<?=$arParams["QUANTITY_FLOAT"]?>" />
	<input type="hidden" id="count_discount_4_all_quantity" value="<?=($arParams["COUNT_DISCOUNT_4_ALL_QUANTITY"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="price_vat_show_value" value="<?=($arParams["PRICE_VAT_SHOW_VALUE"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="hide_coupon" value="<?=($arParams["HIDE_COUPON"] == "Y") ? "Y" : "N"?>" />
	<input type="hidden" id="use_prepayment" value="<?=($arParams["USE_PREPAYMENT"] == "Y") ? "Y" : "N"?>" />

	<div class="bx_ordercart_order_pay">

<div class="bx_ordercart_order_pay_left hidden-xs hidden-sm">
<?$this->SetViewTarget('coupon2step');?>
		<div id="coupons_block">
		<?
		if ($arParams["HIDE_COUPON"] != "Y")
		{
		?>
			<div class="bx_ordercart_coupon bx_ordercart_coupon-enter">
				<span>Есть промокод?<?//=GetMessage("STB_COUPON_PROMT")?></span>
				<div class="ordercart_coupon-enter">
				<?/*if (!empty($arResult['COUPON_LIST']))
				{
					foreach ($arResult['COUPON_LIST'] as $oneCoupon)
					{
						$couponClass = 'disabled';
						switch ($oneCoupon['STATUS'])
						{
							case DiscountCouponsManager::STATUS_NOT_FOUND:
							case DiscountCouponsManager::STATUS_FREEZE:
								$couponClass = 'bad';
								break;
							case DiscountCouponsManager::STATUS_APPLYED:
								$couponClass = 'good';
								break;
						}
						if($couponClass == 'good'){?>
							<span class="coupon-label-good"><div class="arrow"></div>
								<?if (isset($oneCoupon['CHECK_CODE_TEXT'])){
									echo (is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
								}?>
							</span>
						<?}
						unset($couponClass, $oneCoupon);
					}
				}*/?>
				<input type="text" id="coupon" name="COUPON" value="" placeholder="<?=GetMessage("STB_COUPON_PROMT")?>">
				<button class="cupon-enter" onclick="enterCoupon();">Применить</button>
				</div>
			</div><?
				if (!empty($arResult['COUPON_LIST']))
				{
					foreach ($arResult['COUPON_LIST'] as $oneCoupon)
					{
						$couponClass = 'disabled';
						switch ($oneCoupon['STATUS'])
						{
							case DiscountCouponsManager::STATUS_NOT_FOUND:
							case DiscountCouponsManager::STATUS_FREEZE:
								$couponClass = 'bad';
								break;
							case DiscountCouponsManager::STATUS_APPLYED:
								$couponClass = 'good';
								break;
						}
						?><div class="bx_ordercart_coupon <? echo $couponClass; ?>">
							<input disabled readonly type="text" name="OLD_COUPON[]" value="<?=htmlspecialcharsbx($oneCoupon['COUPON']);?>" 
									class="coupon-input <? echo $couponClass; ?>">
							<span class="coupon-status <? echo $couponClass; ?>" data-coupon="<? echo htmlspecialcharsbx($oneCoupon['COUPON']); ?>" onclick="deleteCoupon();"></span>
							<div class="bx_ordercart_coupon_notes"><?
								if (isset($oneCoupon['CHECK_CODE_TEXT']))
								{
									echo (is_array($oneCoupon['CHECK_CODE_TEXT']) ? implode('<br>', $oneCoupon['CHECK_CODE_TEXT']) : $oneCoupon['CHECK_CODE_TEXT']);
								}
								?>
							</div>
						</div><?
					}
					unset($couponClass, $oneCoupon);
				}?>
				&nbsp;
		<?}
		else
		{
			?>&nbsp;<?
		}
?>
		</div>
<?$this->EndViewTarget();?> 
&nbsp;
</div>

		<div class="bx_ordercart_order_pay_right">
			<div class="itogo_txt hidden" style="text-align: center; font-size: 22px; font-weight: bold; margin-top: 25px;">ИТОГО <span id="allSum_FORMATED3" style="display:none;"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></span></div>
			<table class="bx_ordercart_order_sum">
				<?if ($bWeightColumn):?>
					<tr>
						<td class="custom_t1"><?=GetMessage("SALE_TOTAL_WEIGHT")?></td>
						<td class="custom_t2" id="allWeight_FORMATED"><?=$arResult["allWeight_FORMATED"]?></td>
					</tr>
				<?endif;?>
				<?if ($arParams["PRICE_VAT_SHOW_VALUE"] == "Y"):?>
					<tr>
						<td><?echo GetMessage('SALE_VAT_EXCLUDED')?></td>
						<td id="allSum_wVAT_FORMATED"><?=$arResult["allSum_wVAT_FORMATED"]?></td>
					</tr>
					<tr>
						<td><?echo GetMessage('SALE_VAT_INCLUDED')?></td>
						<td id="allVATSum_FORMATED"><?=$arResult["allVATSum_FORMATED"]?></td>
					</tr>
				<?endif;?>

					<tr class="itogo_table_summ">
						<td class="fwb" style=" text-transform: uppercase; font-weight: normal; padding-right: 15px; font-size: 20px; "><?=GetMessage("SALE_TOTAL")?></td>
						<td class="fwb points points_txt hidden"><span>Товаров на сумму</span></td>
						<td class="fwb points_txt" id="allSum_FORMATED" style=" font-size: 20px; "><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></td>
					</tr>
					<tr>
					</tr>
					<tr class="hidden" style="clear:both;">
						<td class="fwb points points_txt"><span>Скидка</span></td>
						<td id="DISCOUNT_PRICE_ALL_FORMATED" class="fwb points_txt"><?=str_replace(" ", "&nbsp;", $arResult["DISCOUNT_PRICE_ALL_FORMATED"])?></td>
						<?
						/*
						if ($USER->IsAdmin())
						{
							echo "<pre>";
							print_r($arResult);
							echo "</pre>";
						}
						*/
						?>
					</tr>
					<tr>
						<td class="custom_t1 hidden-sm hidden-xs"></td>
						<td class="custom_t2 hidden" style="text-decoration:line-through; color:#828282;" id="PRICE_WITHOUT_DISCOUNT">
							<?if (floatval($arResult["DISCOUNT_PRICE_ALL"]) > 0):?>
								<?=$arResult["PRICE_WITHOUT_DISCOUNT"]?>
							<?endif;?>
						</td>
					</tr>

			</table>
<br>
<div class="sum_order_txt hidden" style="text-align: center;">Сумма заказа</div>
<div id="allSum_FORMATED2" class="hidden" style="text-align: center; font-size: 22px; font-weight: bold;"><?=str_replace(" ", "&nbsp;", $arResult["allSum_FORMATED"])?></div>
<script>
$( document ).ready(function() {
  	$('#allSum_FORMATED').on('DOMSubtreeModified', function(e){
		$('#allSum_FORMATED2').html($('#allSum_FORMATED').html());
		$('#allSum_FORMATED3').html($('#allSum_FORMATED').html());
	});
});
</script>
			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
                <!--<div><a href="javascript:void(0)" onclick="" class="checkout bxr-color-button bxr-basket-add print_order checkout"><?//=GetMessage("PRINT")?></a></div>-->
		<div class="bx_ordercart_order_pay_center" style=" display: none; ">

			<?if ($arParams["USE_PREPAYMENT"] == "Y" && strlen($arResult["PREPAY_BUTTON"]) > 0):?>
				<?=$arResult["PREPAY_BUTTON"]?>
				<span><?=GetMessage("SALE_OR")?></span>
			<?endif;?>
                        <?if(!isset($arParams["PRINT_ORDER"]) || $arParams["PRINT_ORDER"] == "Y" ):?>
                            <a href="?print=y" class="print_order" style="background: none !important;" target="_blanck"  ><?=GetMessage("PRINT")?></a>
                        <?endif;?>
			<a href="javascript:void(0)" onclick="checkOut();" class="checkout" style="background: #02a836 !important;"><?=GetMessage("SALE_ORDER")?></a>
		</div>
	</div>
</div>
<?
else:
?>
<div id="basket_items_list">
	<table>
		<tbody>
			<tr>
				<td colspan="<?=$numCells?>" style="text-align:center">
					<div class=""><?=GetMessage("SALE_NO_ITEMS");?></div>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<?
endif;
?>