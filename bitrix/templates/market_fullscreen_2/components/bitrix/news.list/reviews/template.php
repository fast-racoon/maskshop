<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

//add fancybox
$this->addExternalCss(SITE_TEMPLATE_PATH."/js/fancybox/jquery.fancybox.css");
$this->addExternalJS(SITE_TEMPLATE_PATH."/js/fancybox/jquery.fancybox.js");
?>
<script>
$(document).ready(function() {
    $(".single_image").fancybox();
});
</script>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
<?//print_r($arItem["DISPLAY_PROPERTIES"]["PEOPLE"]);?>
	<div class="review-list" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div class="shopreview-customfields">
					<?if($arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["PERSONAL_PHOTO"] != "")
					{?>
						<img src="<?=CFile::GetPath($arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["PERSONAL_PHOTO"]);?>" alt="">
					<?}else{?>
						<img src="/images/no-photo.png" alt="">
					<?}?>
			
					<h3>
						<?if(($arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["NAME"] != "") || ($arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["LAST_NAME"] != ""))
						{
							echo $arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["NAME"]." ".$arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["LAST_NAME"];
						}else{
							echo $arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["LOGIN"];
						}?>
					</h3>
					<span>
						<?if($arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["PERSONAL_CITY"] != ""){?> Город: <?=$arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"]["PERSONAL_CITY"]?> <br><?}?>
						<?if($arItem["DISPLAY_PROPERTIES"]["DATE"]["VALUE"] != ""){?> Дата: <?=$arItem["DISPLAY_PROPERTIES"]["DATE"]["VALUE"]?> <br><?}?>
						<?/*if($arItem["DISPLAY_PROPERTIES"]["ORDER_N"]["VALUE"] != ""){?> Номер заказа: <?=$arItem["DISPLAY_PROPERTIES"]["ORDER_N"]["VALUE"]?> <br><?}*/?>
					</span>
				</div>

			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

				<ul class="summary-index">
					<li class="head">
						<span class="rating-name">Обслуживание</span>
						<span class="rating-empty"><span class="rating-star-<?=$arItem["DISPLAY_PROPERTIES"]["SERVICES_RAIT"]["VALUE"]?>"></span></span>
					</li>
					<li class="head">
						<span class="rating-name">Скорость доставки</span>
						<span class="rating-empty"><span class="rating-star-<?=$arItem["DISPLAY_PROPERTIES"]["DELIVERY_RAIT"]["VALUE"]?>"></span></span>
					</li>
					<li class="head">
						<span class="rating-name">Удобство сайта</span>
						<span class="rating-empty"><span class="rating-star-<?=$arItem["DISPLAY_PROPERTIES"]["SITE_RAIT"]["VALUE"]?>"></span></span>
					</li>
					<li class="head">
						<hr style="border: solid 1px #dbdbdb;">
						<span class="rating-name"><b>Общий рейтинг</b></span>
						<span class="rating-empty"><span class="rating-star-<?=$arItem["DISPLAY_PROPERTIES"]["TOTAL_RAIT"]["VALUE"]?>"></span></span>
					</li>
				</ul>

			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

				<hr style="border: solid 1px #dbdbdb;">
				<ul class="summary-index">
					<li>
						<?echo $arItem["PREVIEW_TEXT"];?>
					</li>
				</ul>
				<?if($arItem["DETAIL_TEXT"] != "")
				{?>
					<ul class="summary-index">
						<li>
							<p class="review-comment"><?echo $arItem["DETAIL_TEXT"];?></p>
						</li>
					</ul>
				<?}?>
		
				<?if(isset($arItem["DISPLAY_PROPERTIES"]["IMGS"]["FILE_VALUE"]["SRC"]))
				{//одна картинка?>
					<div class="shopreview-images">
						<a class="shopreview-image single_image" href="<?=$arItem["DISPLAY_PROPERTIES"]["IMGS"]["FILE_VALUE"]["SRC"]?>">
							<img src="<?=$arItem["DISPLAY_PROPERTIES"]["IMGS"]["FILE_VALUE"]["SRC"]?>"  style="max-width:125px; max-height:85px" alt="">
						</a>
					</div>
				<?}else if(isset($arItem["DISPLAY_PROPERTIES"]["IMGS"]["FILE_VALUE"][0]["SRC"]))
				{//много картинок?>
					<div class="shopreview-images">
						<?foreach($arItem["DISPLAY_PROPERTIES"]["IMGS"]["FILE_VALUE"] as $imgKey=>$imgVal)
						{?>
							<a class="shopreview-image single_image" rel="group" href="<?=$imgVal["SRC"]?>">
								<img src="<?=$imgVal["SRC"]?>" style="max-width:125px; max-height:85px" alt="">
							</a>
						<?}?>
					</div>
				<?}?>

			</div>
		</div>
	
	</div>
<?endforeach;?>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>

