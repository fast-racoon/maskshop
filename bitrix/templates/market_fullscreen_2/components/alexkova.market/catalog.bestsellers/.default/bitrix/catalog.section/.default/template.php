<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Alexkova\Bxready\Draw;

if (!CModule::IncludeModule('alexkova.bxready')) return;

$this->setFrameMode(true);



$elementTemplate = ".default";

$unicumID = 0;
if (isset($_REQUEST["bxr_ajax"]) && $_REQUEST["bxr_ajax"] == "yes"){
	$unicumID = 10000+intval($_REQUEST["ID"]);
}

$arParams["UNICUM_ID"] = $unicumID;


$colToElem = array();
$bootstrapGridCount = $arParams["BXREADY_LIST_BOOTSTRAP_GRID_STYLE"];
if ($bootstrapGridCount>0){
	for($i=1; $i<=$bootstrapGridCount; $i++){
		if (($bootstrapGridCount % $i) == 0){
			$colToElem[$bootstrapGridCount / $i] = $i;
		}
	}
}

$addGridClass = '';

if ($arParams["BXREADY_LIST_BOOTSTRAP_GRID_STYLE"] == 10){
	$addGridClass = 'row10grid';
}

?>

<?if (count($arResult["ITEMS"])>0):?>

	<div id="c<?=intval($_REQUEST["ID"])?>" class="row bxr-list bxr-bestseller-list <?=$addGridClass?>" data-slider="<?=$unicumID?>" >

		<?if (strlen($arParams["PAGE_BLOCK_TITLE"])>0):
			$addClass = '';
			if (strlen($arParams["PAGE_BLOCK_TITLE_GLYPHICON"])>0){
				$addClass = 'glyphicon glyphicon-pad '.$arParams["PAGE_BLOCK_TITLE_GLYPHICON"];
			}
			?>
			<h2 class="<?=$addClass?>"><?=$arParams["PAGE_BLOCK_TITLE"]?></h2>
		<?endif;?>

		<?if ($arParams["BXREADY_LIST_SLIDER"] == "Y") {?>
		<div id="sl_<?=$unicumID?>" class="bestseller-slick-animation">
			<?}else{
				if ($arParams["DISPLAY_TOP_PAGER"])
				{
					?><? echo $arResult["NAV_STRING"]; ?><?
				}
			}?>
			<?

			foreach ($arResult["ITEMS"] as $cell => $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
				$strMainID = $this->GetEditAreaId($arItem['ID']);
				?>

				<?
				$arElementDrawParams = array(
					"ELEMENT" => $arItem,
					"PARAMS" => $arParams
				);
				?>
                                <?
                                // central manage mode
                                $module_id = "alexkova.market";
                                $managment_element_mode = COption::GetOptionString($module_id, "managment_element_mode", "N");
                                if ($managment_element_mode == "Y") {
                                    $ownOptElementLib = COption::GetOptionString($module_id, "own_list_element_type_".SITE_TEMPLATE_ID, $arParams["BXREADY_ELEMENT_DRAW"]);
                                    if (strlen($ownOptElementLib) > 0) {
                                        $arParams["BXREADY_ELEMENT_DRAW"] = trim($ownOptElementLib); 
                                    } else {
                                        $optElementLib = COption::GetOptionString($module_id, "list_element_type_".SITE_TEMPLATE_ID, $arParams["BXREADY_ELEMENT_DRAW"]);
                                        if (strlen($optElementLib) > 0) {
                                            $arParams["BXREADY_ELEMENT_DRAW"] = $optElementLib; 
                                        }
                                    }
                                }
                                ?>

				<div id="<?=$strMainID?>" class="t_<?=$unicumID?> col-lg-<?=$arParams["BXREADY_LIST_LG_CNT"]?> col-md-<?=$arParams["BXREADY_LIST_MD_CNT"]?> col-sm-<?=$arParams["BXREADY_LIST_SM_CNT"]?> col-xs-<?=$arParams["BXREADY_LIST_XS_CNT"]?>">

					<?
					$elementDraw = Draw::getInstance($this);
					$elementDraw->showElement($arParams["BXREADY_ELEMENT_DRAW"], $arItem, $arParams);
					?>
				</div>

			<? endforeach; ?>
		</div>


		<?if ($arParams["BXREADY_LIST_SLIDER"] == "Y" && false) {?>
	</div>

	<script>

/*
			function isTouchDevice() {
				try {
					document.createEvent('TouchEvent');
					return true;
				}
				catch(e) {
					return false;
				}
			}
			<?if ($arParams["HIDE_SLIDER_ARROWS"] == "Y" || !isset($arParams["HIDE_SLIDER_ARROWS"])) {?>
			if (!isTouchDevice()) {
				prevBtn = '<button type="button" class="bxr-color-button slick-prev hidden-arrow"></button>';
				nextBtn = '<button type="button" class="bxr-color-button slick-next hidden-arrow"></button>';
			}
			<?} else {?>
			if (!isTouchDevice()) {
				prevBtn = '<button type="button" class="bxr-color-button slick-prev"></button>';
				nextBtn = '<button type="button" class="bxr-color-button slick-next"></button>';
			}
			<?}?>
			<?if ($arParams["HIDE_MOBILE_SLIDER_ARROWS"] == "Y") {?>
			if (isTouchDevice()) {
				prevBtn = '<button type="button" class="bxr-color-button slick-prev hidden-arrow"></button>';
				nextBtn = '<button type="button" class="bxr-color-button slick-next hidden-arrow"></button>';
			}
			<?} else {?>
			if (isTouchDevice()) {
				prevBtn = '<button type="button" class="bxr-color-button slick-prev"></button>';
				nextBtn = '<button type="button" class="bxr-color-button slick-next"></button>';
			}
			<?}?>

				$('#sl_'+<?=$unicumID?>).slick({
					<?if ($arParams["BXREADY_LIST_SLIDER_MARKERS"] == "Y") {?>
					dots: true,
					<?}?>
					infinite: true,
					speed: 300,
					<?if ($arParams["VERTICAL_SLIDER_MODE"] == "Y") {?>
					vertical: true,
					<?}?>
					slidesToShow: <?=$colToElem[$arParams["BXREADY_LIST_LG_CNT"]]?>,
					slidesToScroll: 1,
					prevArrow: prevBtn,
					nextArrow: nextBtn,
					responsive: [
						{
							breakpoint: 1199,
							settings: {
								slidesToShow: <?=$colToElem[$arParams["BXREADY_LIST_MD_CNT"]]?>,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 991,
							settings: {
								slidesToShow: <?=$colToElem[$arParams["BXREADY_LIST_SM_CNT"]]?>,
								slidesToScroll: 1
							}
						},
						{
							breakpoint: 767,
							settings: "unslick"/*{
								slidesToShow: <?=$colToElem[$arParams["BXREADY_LIST_XS_CNT"]]?>,
								slidesToScroll: 1
							}*/
						},
					]
				});*/

	</script>
<?}
	else{
		if ($arParams["DISPLAY_BOTTOM_PAGER"])
		{
			?><? echo $arResult["NAV_STRING"]; ?><?
		}
	}
	?>

<?endif;?>
