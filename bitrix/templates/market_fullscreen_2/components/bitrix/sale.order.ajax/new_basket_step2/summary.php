<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//�������� ������
$bDefaultColumns = $arResult["GRID"]["DEFAULT_COLUMNS"];
$colspan = ($bDefaultColumns) ? count($arResult["GRID"]["HEADERS"]) : count($arResult["GRID"]["HEADERS"]) - 1;
$bPropsColumn = false;
$bUseDiscount = false;
$bPriceType = false;
$denomination = 10000;
$bShowNameWithPicture = ($bDefaultColumns) ? true : false; // flat to show name and picture column in one column


if($arResult["GRID"]["ROWS"] == 0)
{
	LocalRedirect($APPLICATION->GetCurPage()."?EMPTY=Y");
}


?>
<div id="showBlockErrors" style="display:none"></div>
<div class="bx_ordercart">
<?/*
	<h4><?=GetMessage("SALE_PRODUCTS_SUMMARY");?></h4>
	<div class="bx_ordercart_order_table_container">
		<table>
			<thead>
				<tr>
					<td class="margin"></td>
					<?
					$bPreviewPicture = false;
					$bDetailPicture = false;
					$imgCount = 0;

					// prelimenary column handling
					foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn)
					{
						if ($arColumn["id"] == "PROPS")
							$bPropsColumn = true;

						if ($arColumn["id"] == "NOTES")
							$bPriceType = true;

						if ($arColumn["id"] == "PREVIEW_PICTURE")
							$bPreviewPicture = true;

						if ($arColumn["id"] == "DETAIL_PICTURE")
							$bDetailPicture = true;
					}

					if ($bPreviewPicture || $bDetailPicture)
						$bShowNameWithPicture = true;


					foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn):

						if (in_array($arColumn["id"], array("PROPS", "TYPE", "NOTES"))) // some values are not shown in columns in this template
							continue;

						if ($arColumn["id"] == "PREVIEW_PICTURE" && $bShowNameWithPicture)
							continue;

						if ($arColumn["id"] == "NAME" && $bShowNameWithPicture):
						?>
							<td class="item" colspan="2">
						<?
							echo GetMessage("SALE_PRODUCTS");
						elseif ($arColumn["id"] == "NAME" && !$bShowNameWithPicture):
						?>
							<td class="item">
						<?
							echo $arColumn["name"];
						elseif ($arColumn["id"] == "PRICE"):
						?>
							<td class="price">
						<?
							echo $arColumn["name"];
						else:
						?>
							<td class="custom">
						<?
							echo $arColumn["name"];
						endif;
						?>
							</td>
					<?endforeach;?>

					<td class="margin"></td>
				</tr>
			</thead>

			<tbody>
				<?foreach ($arResult["GRID"]["ROWS"] as $k => $arData):?>
				<tr>
					<td class="margin"></td>
					<?
					if ($bShowNameWithPicture):
					?>
						<td class="itemphoto">
							<div class="bx_ordercart_photo_container">
								<?
								if (strlen($arData["data"]["PREVIEW_PICTURE_SRC"]) > 0):
									$url = $arData["data"]["PREVIEW_PICTURE_SRC"];
								elseif (strlen($arData["data"]["DETAIL_PICTURE_SRC"]) > 0):
									$url = $arData["data"]["DETAIL_PICTURE_SRC"];
								else:
									$url = $templateFolder."/images/no_photo.png";
								endif;

								if (strlen($arData["data"]["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arData["data"]["DETAIL_PAGE_URL"] ?>"><?endif;?>
									<div class="bx_ordercart_photo" style="background-image:url('<?=$url?>')"></div>
								<?if (strlen($arData["data"]["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
							</div>
							<?
							if (!empty($arData["data"]["BRAND"])):
							?>
								<div class="bx_ordercart_brand">
									<img alt="" src="<?=$arData["data"]["BRAND"]?>" />
								</div>
							<?
							endif;
							?>
						</td>
					<?
					endif;

					// prelimenary check for images to count column width
					foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn)
					{
						$arItem = (isset($arData["columns"][$arColumn["id"]])) ? $arData["columns"] : $arData["data"];
						if (is_array($arItem[$arColumn["id"]]))
						{
							foreach ($arItem[$arColumn["id"]] as $arValues)
							{
								if ($arValues["type"] == "image")
									$imgCount++;
							}
						}
					}

					foreach ($arResult["GRID"]["HEADERS"] as $id => $arColumn):
						$class = ($arColumn["id"] == "PRICE_FORMATED") ? "price" : "";

						if (in_array($arColumn["id"], array("PROPS", "TYPE", "NOTES"))) // some values are not shown in columns in this template
							continue;

						if ($arColumn["id"] == "PREVIEW_PICTURE" && $bShowNameWithPicture)
							continue;

						$arItem = (isset($arData["columns"][$arColumn["id"]])) ? $arData["columns"] : $arData["data"];

						if ($arColumn["id"] == "NAME"):
							$width = 70 - ($imgCount * 20);
						?>
							<td class="item" style="width:<?=$width?>%">

								<h2 class="bx_ordercart_itemtitle">
									<?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arItem["DETAIL_PAGE_URL"] ?>"><?endif;?>
										<?=$arItem["NAME"]?>
									<?if (strlen($arItem["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
								</h2>

								<div class="bx_ordercart_itemart">
									<?
									if ($bPropsColumn):
										foreach ($arItem["PROPS"] as $val):
											echo $val["NAME"].":�<span>".$val["VALUE"]."<span><br/>";
										endforeach;
									endif;
									?>
								</div>
								<?
								if (is_array($arItem["SKU_DATA"])):
									foreach ($arItem["SKU_DATA"] as $propId => $arProp):

										// is image property
										$isImgProperty = false;
										foreach ($arProp["VALUES"] as $id => $arVal)
										{
											if (isset($arVal["PICT"]) && !empty($arVal["PICT"]))
											{
												$isImgProperty = true;
												break;
											}
										}

										$full = (count($arProp["VALUES"]) > 5) ? "full" : "";

										if ($isImgProperty): // iblock element relation property
										?>
											<div class="bx_item_detail_scu_small_noadaptive <?=$full?>">

												<span class="bx_item_section_name_gray">
													<?=$arProp["NAME"]?>:
												</span>

												<div class="bx_scu_scroller_container">

													<div class="bx_scu">
														<ul id="prop_<?=$arProp["CODE"]?>_<?=$arItem["ID"]?>" style="width: 200%;margin-left:0%;">
														<?
														foreach ($arProp["VALUES"] as $valueId => $arSkuValue):

															$selected = "";
															foreach ($arItem["PROPS"] as $arItemProp):
																if ($arItemProp["CODE"] == $arItem["SKU_DATA"][$propId]["CODE"])
																{
																	if ($arItemProp["VALUE"] == $arSkuValue["NAME"])
																		$selected = "class=\"bx_active\"";
																}
															endforeach;
														?>
															<li style="width:10%;" <?=$selected?>>
																<a href="javascript:void(0);">
																	<span style="background-image:url(<?=$arSkuValue["PICT"]["SRC"]?>)"></span>
																</a>
															</li>
														<?
														endforeach;
														?>
														</ul>
													</div>

													<div class="bx_slide_left" onclick="leftScroll('<?=$arProp["CODE"]?>', <?=$arItem["ID"]?>);"></div>
													<div class="bx_slide_right" onclick="rightScroll('<?=$arProp["CODE"]?>', <?=$arItem["ID"]?>);"></div>
												</div>

											</div>
										<?
										else:
										?>
											<div class="bx_item_detail_size_small_noadaptive <?=$full?>">

												<span class="bx_item_section_name_gray">
													<?=$arProp["NAME"]?>:
												</span>

												<div class="bx_size_scroller_container">
													<div class="bx_size">
														<ul id="prop_<?=$arProp["CODE"]?>_<?=$arItem["ID"]?>" style="width: 200%; margin-left:0%;">
															<?
															foreach ($arProp["VALUES"] as $valueId => $arSkuValue):

																$selected = "";
																foreach ($arItem["PROPS"] as $arItemProp):
																	if ($arItemProp["CODE"] == $arItem["SKU_DATA"][$propId]["CODE"])
																	{
																		if ($arItemProp["VALUE"] == $arSkuValue["NAME"])
																			$selected = "class=\"bx_active\"";
																	}
																endforeach;
															?>
																<li style="width:10%;" <?=$selected?>>
																	<a href="javascript:void(0);"><?=$arSkuValue["NAME"]?></a>
																</li>
															<?
															endforeach;
															?>
														</ul>
													</div>
													<div class="bx_slide_left" onclick="leftScroll('<?=$arProp["CODE"]?>', <?=$arItem["ID"]?>);"></div>
													<div class="bx_slide_right" onclick="rightScroll('<?=$arProp["CODE"]?>', <?=$arItem["ID"]?>);"></div>
												</div>

											</div>
										<?
										endif;
									endforeach;
								endif;
								?>
							</td>
						<?
						elseif ($arColumn["id"] == "PRICE_FORMATED"):
						?>
							<td class="price right">
								<div class="current_price"><?=$arItem["PRICE_FORMATED"]?></div>
								<div class="old_price right">
									<?
									if (doubleval($arItem["DISCOUNT_PRICE"]) > 0):
										echo SaleFormatCurrency($arItem["PRICE"] + $arItem["DISCOUNT_PRICE"], $arItem["CURRENCY"]);
										$bUseDiscount = true;
									endif;
									?>
								</div>

								<?if ($bPriceType && strlen($arItem["NOTES"]) > 0):?>
									<div style="text-align: left">
										<div class="type_price"><?=GetMessage("SALE_TYPE")?></div>
										<div class="type_price_value"><?=$arItem["NOTES"]?></div>
									</div>
								<?endif;?>
								<div class="current-price-denom"><?=SaleFormatCurrency($arItem["PRICE"]*$denomination, $arItem["CURRENCY"])?></div>
								<div class="old-price-denom right">
									<?
									if (doubleval($arItem["DISCOUNT_PRICE"]) > 0):
										echo SaleFormatCurrency(($arItem["PRICE"] + $arItem["DISCOUNT_PRICE"])*$denomination, $arItem["CURRENCY"]);
										$bUseDiscount = true;
									endif;
									?>
								</div>

								<?if ($bPriceType && strlen($arItem["NOTES"]) > 0):?>
									<div style="text-align: left">
										<div class="type_price"><?=GetMessage("SALE_TYPE")?></div>
										<div class="type_price_value"><?=$arItem["NOTES"]?></div>
									</div>
								<?endif;?>
							</td>
						<?
						elseif ($arColumn["id"] == "DISCOUNT"):
						?>
							<td class="custom right">
								<span><?=getColumnName($arColumn)?>:</span>
								<?=$arItem["DISCOUNT_PRICE_PERCENT_FORMATED"]?>
							</td>
						<?
						elseif ($arColumn["id"] == "DETAIL_PICTURE" && $bPreviewPicture):
						?>
							<td class="itemphoto">
								<div class="bx_ordercart_photo_container">
									<?
									$url = "";
									if ($arColumn["id"] == "DETAIL_PICTURE" && strlen($arData["data"]["DETAIL_PICTURE_SRC"]) > 0)
										$url = $arData["data"]["DETAIL_PICTURE_SRC"];

									if ($url == "")
										$url = $templateFolder."/images/no_photo.png";

									if (strlen($arData["data"]["DETAIL_PAGE_URL"]) > 0):?><a href="<?=$arData["data"]["DETAIL_PAGE_URL"] ?>"><?endif;?>
										<div class="bx_ordercart_photo" style="background-image:url('<?=$url?>')"></div>
									<?if (strlen($arData["data"]["DETAIL_PAGE_URL"]) > 0):?></a><?endif;?>
								</div>
							</td>
						<?
						elseif ($arColumn["id"] == "SUM"):
						?>
							<td class="custom right">
								<span><?=getColumnName($arColumn)?>:</span>
								<?=$arItem["SUM"]?><br>
							<!--	<span class="sum-denomination"><?=SaleFormatCurrency(($arItem["BASE_PRICE"]-$arItem["DISCOUNT_PRICE"])*$denomination, $arItem["CURRENCY"])?></span>
								<?$arResult["SUM"] += $arItem["BASE_PRICE"];?>-->
							</td>
						<?
						elseif (in_array($arColumn["id"], array("QUANTITY", "WEIGHT_FORMATED", "DISCOUNT_PRICE_PERCENT_FORMATED"))):
						?>
							<td class="custom right">
								<span><?=getColumnName($arColumn)?>:</span>
								<?=$arItem[$arColumn["id"]]?>
							</td>
						<?
						else: // some property value

							if (is_array($arItem[$arColumn["id"]])):

								foreach ($arItem[$arColumn["id"]] as $arValues)
									if ($arValues["type"] == "image")
										$columnStyle = "width:20%";
							?>
							<td class="custom" style="<?=$columnStyle?>">
								<span><?=getColumnName($arColumn)?>:</span>
								<?
								foreach ($arItem[$arColumn["id"]] as $arValues):
									if ($arValues["type"] == "image"):
									?>
										<div class="bx_ordercart_photo_container">
											<div class="bx_ordercart_photo" style="background-image:url('<?=$arValues["value"]?>')"></div>
										</div>
									<?
									else: // not image
										echo $arValues["value"]."<br/>";
									endif;
								endforeach;
								?>
							</td>
							<?
							else: // not array, but simple value
							?>
							<td class="custom" style="<?=$columnStyle?>">
								<span><?=getColumnName($arColumn)?>:</span>
								<?
									echo $arItem[$arColumn["id"]];
								?>
							</td>
							<?
							endif;
						endif;

					endforeach;
					?>
				</tr>
				<?endforeach;?>
			</tbody>
		</table>
	</div>
*/?>

<div class="col-lg-7 col-xs-12 no_padding">
		<div class="bx_section">
			<h4><?=GetMessage("SOA_TEMPL_SUM_COMMENTS")?></h4>
			<div class="bx_block w100"><textarea name="ORDER_DESCRIPTION" id="ORDER_DESCRIPTION" placeholder="��� �����������" style="max-width: 340px; margin-left: 120px;"><?=$arResult["USER_VALS"]["ORDER_DESCRIPTION"]?></textarea></div>
			<input type="hidden" name="" value="">
			<div style="clear: both;"></div><br />
		</div>

</div>
<div class="col-lg-5 hidden-xs hidden-sm">
	<div>
		<p></p>
	</div>
</div>


		<div style="clear:both;"></div>

<div id="sum_left_block" class="col-lg-7 col-xs-12 no_padding" style="background: #f5f5f5; padding-bottom: 34px; padding-right: 0px; min-height: 244px;">

<?$APPLICATION->ShowViewContent('coupon2step');?>

<br>
<div class="bx_ordercart_order_pay_center hidden-sm hidden-xs" style="border-top: 1px solid #f5f5f5;">
	<span class="left_span_txt">�������� �����, �� ������������<br>
		� ��������� <a href="/terms/" class="blue_link_a">������</a>.</span>
	<a href="javascript:void();" onclick="submitForm('Y'); return false;" id="ORDER_CONFIRM_BUTTON" class="checkout" style="background: #02a836 !important; border-radius: 13px; margin-right: 10px; text-transform: uppercase;"><?=GetMessage("SOA_TEMPL_BUTTON")?></a>
</div>

		</div>

<div id="sum_right_block" class="col-lg-5 col-xs-12 no_padding" style="background: #f5f5f5; padding-bottom: 20px; min-height: 244px;">

	<div class="bx_ordercart_order_pay">
		<div class="bx_ordercart_order_pay_right" style="margin-left: 10%; width: 80% !important; border-radius: 10px; padding: 15px; /*box-shadow: 3px 3px 5px rgba(204,204,204,0.5);*/ background: url(/bitrix/templates/market_fullscreen_2/components/bitrix/sale.order.ajax/new_basket_step2/images/r_itog_bottom.png) right bottom no-repeat #fff;">
			<table class="bx_ordercart_order_sum">
				<tbody>
					<?/*
					if (floatval($arResult['ORDER_WEIGHT']) > 0):
					?>
					<tr>
						<td class="custom_t1" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_WEIGHT_SUM")?></td>
						<td class="custom_t2 price"><?=$arResult["ORDER_WEIGHT_FORMATED"]?></td>
					</tr>
					<?
					endif;
					*/?>
					<tr>
						<td class="custom_t1 itog <?=($bUseDiscount?'with_discount' :'')?>" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_SUMMARY")?></td>
						<?
						if ($bUseDiscount)
						{
							?>
								<td class="custom_t2 price">
									<?=$arResult["ORDER_PRICE_FORMATED"]?><br/><span style="text-decoration:line-through; color:#828282;"><?=$arResult["PRICE_WITHOUT_DISCOUNT"]?></span></td>
							<?
						}
						else
						{
							?>
							<td class="custom_t2 price"><?=$arResult["ORDER_PRICE_FORMATED"]?></td>
							<?
						}
						?>
					</tr>
					<?
					if (doubleval($arResult["DISCOUNT_PRICE"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?><?if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0):?> (<?echo $arResult["DISCOUNT_PERCENT_FORMATED"];?>)<?endif;?>:</td>
							<td class="custom_t2"><?echo $arResult["DISCOUNT_PRICE_FORMATED"]?></td>
						</tr>
						<?
					}
					if(!empty($arResult["TAX_LIST"]))
					{
						foreach($arResult["TAX_LIST"] as $val)
						{
							?>
							<tr>
								<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=$val["NAME"]?> <?=$val["VALUE_FORMATED"]?>:</td>
								<td class="custom_t2"><?=$val["VALUE_MONEY_FORMATED"]?></td>
							</tr>
							<?
						}
					}
					if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>" style="padding-bottom: 17px;"><?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?></td>
							<td class="custom_t2" style="padding-bottom: 17px;"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></td>
						</tr>
					<?
					}
					/*
					if (strlen($arResult["PAYED_FROM_ACCOUNT_FORMATED"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_IT")?></td>
							<td class="custom_t2" class="price"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></td>
						</tr>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_PAYED")?></td>
							<td class="custom_t2" class="price"><?=$arResult["PAYED_FROM_ACCOUNT_FORMATED"]?></td>
						</tr>
						<tr>
							<td class="custom_t1 fwb" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_LEFT_TO_PAY")?></td>
							<td class="custom_t2 fwb" class="price"><?=$arResult["ORDER_TOTAL_LEFT_TO_PAY_FORMATED"]?></td>
						</tr>
					<?
					}
					else
					{
					*/
						?>
						<tr class="itog_sum_all">
							<td colspan="5">
								<span class="itog_sum_all_title"><?=GetMessage("SOA_TEMPL_SUM_IT")?></span><br>
								<span class="itog_sum_all_val"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></span>
							</td>

							<?/*<td class="custom_t1 fwb" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_IT")?></td>
							<td class="custom_t2 fwb" class="price"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></td>*/?>
						</tr>
					<?
					/*}*/
					?>
				</tbody>
			</table>
			<div style="clear:both;"></div>
		<!--	<table class="bx_ordercart_order_sum">
				<thead>
				<tr><td colspan="7">
				<p></p><?echo GetMessage("KZN_DENOMINATION")?>
				</td></tr>
				</thead>
				<tbody>
					<?
					if (floatval($arResult['ORDER_WEIGHT']) > 0):
					?>
					<tr>
						<td class="custom_t1" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_WEIGHT_SUM")?></td>
						<td class="custom_t2 price"><?=$arResult["ORDER_WEIGHT_FORMATED"]?></td>
					</tr>
					<?
					endif;
					?>
					<tr>
						<td class="custom_t1 itog <?=($bUseDiscount?'with_discount' :'')?>" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_SUMMARY")?></td>
						<?
						if ($bUseDiscount)
						{
							?>
								<td class="custom_t2 price">
									<?=SaleFormatCurrency($arResult["ORDER_PRICE"]*$denomination, $arResult["BASE_LANG_CURRENCY"])?><br/><span style="text-decoration:line-through; color:#828282;"><?=SaleFormatCurrency(($arResult["SUM"])*$denomination, $arResult["BASE_LANG_CURRENCY"])?></span></td>
							<?
						}
						else
						{
							?>
							<td class="custom_t2 price"><?=SaleFormatCurrency($arResult["ORDER_PRICE"]*$denomination, $arResult["BASE_LANG_CURRENCY"])?></td>
							<?
						}
						?>
					</tr>
					<?
					if (doubleval($arResult["DISCOUNT_PRICE"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_DISCOUNT")?><?if (strLen($arResult["DISCOUNT_PERCENT_FORMATED"])>0):?> (<?echo $arResult["DISCOUNT_PERCENT_FORMATED"];?>)<?endif;?>:</td>
							<td class="custom_t2"><?echo $arResult["DISCOUNT_PRICE_FORMATED"]?></td>
						</tr>
						<?
					}
					if(!empty($arResult["TAX_LIST"]))
					{
						foreach($arResult["TAX_LIST"] as $val)
						{
							?>
							<tr>
								<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=$val["NAME"]?> <?=$val["VALUE_FORMATED"]?>:</td>
								<td class="custom_t2"><?=$val["VALUE_MONEY_FORMATED"]?></td>
							</tr>
							<?
						}
					}
					if (doubleval($arResult["DELIVERY_PRICE"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>"><?=GetMessage("SOA_TEMPL_SUM_DELIVERY")?></td>
							<td class="custom_t2"><?=SaleFormatCurrency($arResult["DELIVERY_PRICE"]*$denomination, $arResult["BASE_LANG_CURRENCY"])?></td>
						</tr>
					<?
					}

					if (strlen($arResult["PAYED_FROM_ACCOUNT_FORMATED"]) > 0)
					{
						?>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_IT")?></td>
							<td class="custom_t2" class="price"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></td>
						</tr>
						<tr>
							<td class="custom_t1" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_PAYED")?></td>
							<td class="custom_t2" class="price"><?=$arResult["PAYED_FROM_ACCOUNT_FORMATED"]?></td>
						</tr>
						<tr>
							<td class="custom_t1 fwb" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_LEFT_TO_PAY")?></td>
							<td class="custom_t2 fwb" class="price"><?=$arResult["ORDER_TOTAL_LEFT_TO_PAY_FORMATED"]?></td>
						</tr>
					<?
					}
					else
					{
						?>
						<tr>
							<td class="custom_t1 fwb" colspan="<?=$colspan?>" class="itog"><?=GetMessage("SOA_TEMPL_SUM_IT")?></td>
							<td class="custom_t2 fwb" class="price"><?=SaleFormatCurrency(($arResult["DELIVERY_PRICE"]+$arResult["ORDER_PRICE"])*$denomination, $arResult["BASE_LANG_CURRENCY"])?></td>
						</tr>
					<?
					}
					?>
				</tbody>
			</table>-->
			<div style="clear:both;"></div>

		</div>

<div class="bx_ordercart_order_pay_center hidden-md hidden-lg" style="border-top: 1px solid #f5f5f5;">
	<a href="javascript:void();" onclick="submitForm('Y'); return false;" id="ORDER_CONFIRM_BUTTON" class="checkout" style="background: #02a836 !important; border-radius: 13px; margin-right: 10px; text-transform: uppercase;"><?=GetMessage("SOA_TEMPL_BUTTON")?></a>
	<span class="left_span_txt">�������� �����, �� ������������
		� ��������� <a href="/terms/" class="blue_link_a">������</a>.</span>
</div>

	</div>

</div>

</div>