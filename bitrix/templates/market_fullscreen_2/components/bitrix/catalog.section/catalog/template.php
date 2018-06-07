<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
use Alexkova\Bxready\Draw;
//use Alexkova\Bxready\Library;

$draw = Alexkova\Bxready\Draw::getInstance();

//echo "<pre>"; print_r($arResult); echo "</pre>";


$this->setFrameMode(true);

$elementTemplate = ".default";

global $unicumID;
if ($unicumID<=0) {$unicumID = 1;} else {$unicumID++;}

$arParams["UNICUM_ID"] = $unicumID;
$arParams["SKU_PROPS_LIST"] = $arResult["SKU_PROPS_LIST"];
$arParams["SKU_PROPS"] = $arResult["SKU_PROPS"];

$colToElem = array();
$bootstrapGridCount = $arParams["BXREADY_LIST_BOOTSTRAP_GRID_STYLE"];
if ($bootstrapGridCount>0){
	for($i=1; $i<=$bootstrapGridCount; $i++){
		if (($bootstrapGridCount % $i) == 0){
			$colToElem[$bootstrapGridCount / $i] = $i;
		}
	}
}

?>

<?if (count($arResult["ITEMS"])>0):?>
        <?if (strlen($arParams["PAGE_BLOCK_TITLE"])>0):
                $addClass = '';
                if (strlen($arParams["PAGE_BLOCK_TITLE_GLYPHICON"])>0){
                        $addClass = 'glyphicon glyphicon-pad '.$arParams["PAGE_BLOCK_TITLE_GLYPHICON"];
                }
                ?>
                <h2 class="<?=$addClass?>"><?=$arParams["PAGE_BLOCK_TITLE"]?></h2>
        <?endif;?>
	<div class="row bxr-list">

		

		<?if ($arParams["BXREADY_LIST_SLIDER"] == "Y") {?>
		<div id="sl_<?=$unicumID?>">
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
                                $arParams["AREA_ID"] = $strMainID;
                                $arParams["~ADD_URL_TEMPLATE"] = $arResult["~ADD_URL_TEMPLATE"];
                                $arParams["~BUY_URL_TEMPLATE"] = $arResult["~BUY_URL_TEMPLATE"];
                                $arParams["~COMPARE_URL_TEMPLATE"] = $arResult["~COMPARE_URL_TEMPLATE"];
				?>

				<?
				$arElementDrawParams = array(
					"ELEMENT" => $arItem,
					"PARAMS" => $arParams
				);
				?>


				<div id="<?=$strMainID?>" class="t_<?=$unicumID?> col-lg-<?=$arParams["BXREADY_LIST_LG_CNT"]?> col-md-<?=$arParams["BXREADY_LIST_MD_CNT"]?> col-sm-<?=$arParams["BXREADY_LIST_SM_CNT"]?> col-xs-<?=$arParams["BXREADY_LIST_XS_CNT"]?>">

					<?
					$draw->setCurrentTemplate($this);
						$draw->showElement($arParams["BXREADY_ELEMENT_DRAW"], $arItem, $arParams);
					?>
				</div>

			<? endforeach; ?>
		</div>


		<?if ($arParams["BXREADY_LIST_SLIDER"] == "Y") {?>
	</div>

	<script>
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
			<?if ($arParams["BXREADY_LIST_HIDE_MOBILE_SLIDER_AUTOSCROLL"] == "Y") {?>
			autoplay: true,
			autoplaySpeed: <?=intval($arParams["BXREADY_LIST_HIDE_MOBILE_SLIDER_SCROLLSPEED"])>0 ? intval($arParams["BXREADY_LIST_HIDE_MOBILE_SLIDER_SCROLLSPEED"]) :  2000?>,
			<?}?>
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
					settings: {
						slidesToShow: <?=$colToElem[$arParams["BXREADY_LIST_XS_CNT"]]?>,
						slidesToScroll: 1
					}
				},
			]
		});



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
<script type="text/javascript">
	var products = [
	<?foreach ($arResult["ITEMS"] as $p_key => $prod):?>
    	{"id": <?=$prod["ID"]?>, "price": <?=$prod['MIN_PRICE']["VALUE"]?><?if($prod['MIN_PRICE']["DISCOUNT_VALUE"] != $prod['MIN_PRICE']["VALUE"]):?>, "price_old": <?=$prod['MIN_PRICE']["DISCOUNT_VALUE"]?><?endif;?>},
    <?endforeach;?>
	];
    window.vkAsyncInit = function() {
        VK.Retargeting.Init('VK-RTRG-84381-PuBb'); 
        VK.Retargeting.Hit();

        var price_list_id = 705;
        var eventParams = { // MIN_PRICE DISCOUNT_VALUE - со скидкой VALUE - без скидки
            "products": products,
            "category_ids": "<?=$arResult['IBLOCK_SECTION_ID']?>",
        };
        console.log(eventParams);
        VK.Retargeting.ProductEvent(price_list_id, "view_category", eventParams); 
        $(".bxr-element-action button.bxr-basket-add").on("click", function(e){
        	var id = $(this).siblings("input.bxr-basket-item-id").val();
        	var price = getPrice(id);
        	
        	var eventParams = {
        		"products": [{
        			"id": id,
        			"price": price
        		}]
        	};
        	VK.Retargeting.ProductEvent(price_list_id, "add_to_cart", eventParams); 
        });
        function getPrice(id){
        	var rez = false;
        	products.forEach(
        		function(el){
	        		if(el.id == id) 
	        			rez = el.price;
        		}
        	);
        	return rez;
        };
        /*var category_ids = "<?
        $ar_section = array();
            foreach($arResult['SECTION']['PATH'] as $cat)
                $ar_section[] = $cat["ID"];
        echo implode(",",$ar_section);
        ?>";
        
        var price_list_id = 705;
        var price_old = <?=$arResult['MIN_PRICE']["VALUE"]?>;
        var price = <?=$arResult['MIN_PRICE']["DISCOUNT_VALUE"]?>;
        var eventParams = { // MIN_PRICE DISCOUNT_VALUE - со скидкой VALUE - без скидки
            "products": [{"id": <?=$arResult["ID"]?>, "price": price, "price_old":price_old}],
            "category_ids": category_ids
        }
        
        VK.Retargeting.ProductEvent(price_list_id, "view_product", eventParams); 
        $("#formBtn .bxr-basket-add").on("click", function(e){
            VK.Retargeting.ProductEvent(price_list_id, "add_to_cart", eventParams); 
        });*/
    };
</script>
<? if ($_GET["test"]) {
    echo "<pre>";
    print_r($arResult);
    echo "</pre>";
}