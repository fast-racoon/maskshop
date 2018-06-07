<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$pictureID = (
	is_array($arResult["PRODUCT_INFO"]["DETAIL_PARENT"])
	&&
	$arResult["PRODUCT_INFO"]["DETAIL_PARENT"]["DETAIL_PICTURE"] != ""
)
	? $arResult["PRODUCT_INFO"]["DETAIL_PARENT"]["DETAIL_PICTURE"]
	: $arResult["PRODUCT_INFO"]["DETAIL_PICTURE"];
$URL = CFile::GetPath($pictureID);
?>

<? $addData = 'data-nshow="0"';?>
<?if (isset($_REQUEST['delay']) && ($_REQUEST['delay'] == "yes" || $_REQUEST['delay'] == "no") && $_REQUEST["action"] == 'add'):?>
	<? $addData = 'data-nshow="1"';?>
<?endif;?>

<div id="bxr-basket-popup" <?=$addData?> style="padding: 15px 0px;">
	<div id="basket-popup-product-name" class="basket-popup-name" style="font-weight: 100;">
		<?=$arResult["PRODUCT_INFO"]["NAME"]?>
	</div>
	<div id="basket-popup-product-image">
		<img src="<?=$URL?>" alt="<?=$arResult["PRODUCT_INFO"]["NAME"]?>" width="150px"/>
	</div>

	<div id="basket-popup-buttons" style="margin-top: 30px;">

		<a class="bxr-color-button  bxr-corns" href="<?=$arParams["PATH_TO_BASKET"]?>" style="background: #9cca68; text-decoration: none;margin-left: 0px; font-size: 1.1em;
    padding: 17px 4px; border-radius: 6px;">
			<!--span class="fa fa-check-square-o" aria-hidden="true"></span-->
			<?=GetMessage('BASKET_TO_ORDER')?></a> или 
		<button class="bxr-color-button bxr-corns" style="background: #000; font-size: 1.1em;
    padding: 17px 4px; border-radius: 6px;" onclick="BXReady.basketPopup.close()">
			<!--span class="fa fa-undo" aria-hidden="true"></span-->
			<?=GetMessage('BASKET_ADD_CONTINUE')?></button>			
	</div>
</div>
<style>
.popup-window-content{
	margin: 0 2px !important;
}
.div.popup-window.popup-window-with-titlebar .popup-window-titlebar{
	text-align: center !important;
}
</style>