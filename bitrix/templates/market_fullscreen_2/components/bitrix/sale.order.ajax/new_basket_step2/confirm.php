<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams["SET_TITLE"] == "Y")
	$APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
?>
<style>
.predsucOrderTitle {
    text-align: center;
}
</style>
<? if (!empty($arResult["ORDER"])): ?>
<?/*
<script>
  fbq('track', 'Purchase');
</script>
*/?>

	<b class="sucOrderTitle"><?=GetMessage("SOA_TEMPL_ORDER_COMPLETE")?></b><br /><br />
	<img src="/images/good_girl_face.png">
	<br>
	<br>
	<table class="sale_order_full_table">
		<tr>
			<td>
				<?= GetMessage("SOA_TEMPL_ORDER_SUC", Array("#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"], "#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"]))?>
				<br /><hr class="sucOrderTitleHr">
				<?$tmp_url = $arParams["PATH_TO_PERSONAL"];
				if(!$USER->IsAuthorized()){
					$tmp_url = 'javascript:void(0)" onclick="openAuthorizePopup()';
				}?>
				<?= GetMessage("SOA_TEMPL_ORDER_SUC1", Array("#LINK#" => $tmp_url)) ?>
			</td>
		</tr>
	</table>

	<?
	if (!empty($arResult["PAYMENT"]))
	{
		foreach ($arResult["PAYMENT"] as $payment)
		{
			if ($payment["PAID"] != 'Y')
			{
				if (!empty($arResult['PAY_SYSTEM_LIST'])
					&& array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
				)
				{
					$arPaySystem = $arResult['PAY_SYSTEM_LIST'][$payment["PAY_SYSTEM_ID"]];

					if (empty($arPaySystem["ERROR"]))
					{
					?>
						<br /><br />

						<table class="sale_order_full_table" style="margin: auto;">
							<tr>
								<td class="ps_logo" style="display: none;">
									<div class="pay_name"><?= Loc::getMessage("SOA_PAY") ?></div>
									<?= CFile::ShowImage($arPaySystem["LOGOTIP"], 100, 100, "border=0\" style=\"width:100px\"", "", false) ?>
									<div class="paysystem_name"><?= $arPaySystem["NAME"] ?></div>
									<br/>
								</td>
							</tr>
							<tr>
								<td>
									<? if (strlen($arPaySystem["ACTION_FILE"]) > 0 && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
										<?
										$orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
										$paymentAccountNumber = $payment["ACCOUNT_NUMBER"];
										?>
										<script>
											window.open('<?=$arParams["PATH_TO_PAYMENT"]?>?ORDER_ID=<?=$orderAccountNumber?>&PAYMENT_ID=<?=$paymentAccountNumber?>');
										</script>
										<?=Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&PAYMENT_ID=".$paymentAccountNumber))?>
										<? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
											<br/>
											<?=Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"]."?ORDER_ID=".$orderAccountNumber."&pdf=1&DOWNLOAD=Y"))?>
										<? endif ?>
									<? else: ?>
										<?=$arPaySystem["BUFFERED_OUTPUT"]?>
									<? endif ?>
								</td>
							</tr>
						</table>
						
					<?
					}
					else
					{
					?>
						<span style="color:red;"><?= Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
					<?
					}
				}
				else
				{
				?>
					<span style="color:red;"><?= Loc::getMessage("SOA_ORDER_PS_ERROR")?></span>
				<?
				}
			}
		}
	}
	?>
	

<?/*
if($_GET["test"]){
	echo "<pre>";
	print_r($arResult["ORDER"]);
	echo "</pre>";
}*/?>
<script>
	window.vkAsyncInit = function() {
        VK.Retargeting.Init('VK-RTRG-84381-PuBb'); 
        VK.Retargeting.Hit();
	var products = [
<?	
	$dbBasketItems = CSaleBasket::GetList(
    array(
            "NAME" => "ASC",
            "ID" => "ASC"
        ),
    array(
            "FUSER_ID" => CSaleBasket::GetBasketUserID(),
            "LID" => SITE_ID,
            "ORDER_ID" => $arResult["ORDER"]["ID"]
        ),
    false,
    false,
    array("*")
    );

	while ($arItems = $dbBasketItems->Fetch()){
		$iii = '{"id":"'.$arItems["ID"].'","price":'.$arItems["PRICE"];
		if($arItems["BASE_PRICE"] && $arItems["PRICE"] != $arItems["BASE_PRICE"]) 
			$iii .= ',"price_old":'.$arItems["BASE_PRICE"];
		$iii .= '},';
		echo $iii;
	}

?>];


        var price_list_id = 705;
        var eventParams = { // MIN_PRICE DISCOUNT_VALUE - со скидкой VALUE - без скидки
            "products": products,
            "total_price": <?=$arResult["ORDER"]["PRICE"]?>,
            "currency_code": "RUR"
            //"category_ids": "<?=$arResult['IBLOCK_SECTION_ID']?>",
        };
        
		VK.Retargeting.ProductEvent(price_list_id, "purchase", eventParams); 
		console.log("purchase >>>");
		console.log(eventParams);
        
    };


</script>
<? else: ?>
	
	<b><?=Loc::getMessage("SOA_ERROR_ORDER")?></b>
	<br /><br />

	<table class="sale_order_full_table">
		<tr>
			<td>
				<?=Loc::getMessage("SOA_ERROR_ORDER_LOST", array("#ORDER_ID#" => $arResult["ACCOUNT_NUMBER"]))?>
				<?=Loc::getMessage("SOA_ERROR_ORDER_LOST1")?>
			</td>
		</tr>
	</table>
	
<? endif; ?>