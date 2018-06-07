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

global $moreSettings;
$templateData = array(
	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css',
	'TEMPLATE_CLASS' => 'bx_'.$arParams['TEMPLATE_THEME']
);

$strMainID = $this->GetEditAreaId($arResult['ID']);
$arItemIDs = array(
	'ID' => $strMainID,
	'PICT' => $strMainID.'_pict',
	'DISCOUNT_PICT_ID' => $strMainID.'_dsc_pict',
	'STICKER_ID' => $strMainID.'_sticker',
	'BIG_SLIDER_ID' => $strMainID.'_big_slider',
	'BIG_IMG_CONT_ID' => $strMainID.'_bigimg_cont',
	'SLIDER_CONT_ID' => $strMainID.'_slider_cont',
	'SLIDER_LIST' => $strMainID.'_slider_list',
	'SLIDER_LEFT' => $strMainID.'_slider_left',
	'SLIDER_RIGHT' => $strMainID.'_slider_right',
	'OLD_PRICE' => $strMainID.'_old_price',
	'PRICE' => $strMainID.'_price',
	'DISCOUNT_PRICE' => $strMainID.'_price_discount',
	'SLIDER_CONT_OF_ID' => $strMainID.'_slider_cont_',
	'SLIDER_LIST_OF_ID' => $strMainID.'_slider_list_',
	'SLIDER_LEFT_OF_ID' => $strMainID.'_slider_left_',
	'SLIDER_RIGHT_OF_ID' => $strMainID.'_slider_right_',
	'QUANTITY' => $strMainID.'_quantity',
	'QUANTITY_DOWN' => $strMainID.'_quant_down',
	'QUANTITY_UP' => $strMainID.'_quant_up',
	'QUANTITY_MEASURE' => $strMainID.'_quant_measure',
	'QUANTITY_LIMIT' => $strMainID.'_quant_limit',
	'BUY_LINK' => $strMainID.'_buy_link',
	'ADD_BASKET_LINK' => $strMainID.'_add_basket_link',
	'COMPARE_LINK' => $strMainID.'_compare_link',
	'PROP' => $strMainID.'_prop_',
	'PROP_DIV' => $strMainID.'_skudiv',
	'DISPLAY_PROP_DIV' => $strMainID.'_sku_prop',
	'OFFER_GROUP' => $strMainID.'_set_group_',
	'BASKET_PROP_DIV' => $strMainID.'_basket_prop',
);
$strObName = 'ob'.preg_replace("/[^a-zA-Z0-9_]/", "x", $strMainID);
$templateData['JS_OBJ'] = $strObName;

$strTitle = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]) && '' != $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_TITLE"]
	: $arResult['NAME']
);
$strAlt = (
	isset($arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]) && '' != $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	? $arResult["IPROPERTY_VALUES"]["ELEMENT_DETAIL_PICTURE_FILE_ALT"]
	: $arResult['NAME']
);

$useVoteRating = ('Y' == $arParams['USE_VOTE_RATING']);
$useReview = ('Y' == $arParams['USE_REVIEW']);
$storeAmount = ('Y' == $arParams['USE_STORE']);
$useCompare = ('Y' == $arParams['DISPLAY_COMPARE']);
$useFavorites = ('Y' == $arParams['USE_FAVORITES']);
$useShare = ('Y' == $arParams['USE_SHARE']);
$useOneClick = ('Y' == $arParams['USE_ONE_CLICK']);

    $show_files = false;
    if( isset($arParams["DETAIL_DISPLAY_SHOW_FILES"]) && $arParams["DETAIL_DISPLAY_SHOW_FILES"] == "Y" &&
     (!empty($arResult["PROPERTIES"]["FILES"]["VALUE"]) || !empty($arResult["PROPERTIES"]["UF_FILES"]))) {
        $show_files = true;
    }
    
    $show_video = false;
    if(isset($arParams["DETAIL_DISPLAY_SHOW_VIDEO"]) && $arParams["DETAIL_DISPLAY_SHOW_VIDEO"] == "Y") {
        if(!empty($arResult["PROPERTIES"]["UF_VIDEO"]))
            $show_video = true;
        
        if(!empty($arResult["PROPERTIES"]["VIDEO"]["VALUE"]) && !empty($arResult["PROPERTIES"]["VIDEO"]["VALUE"][0])) 
            $show_video = true;
        else
            unset($arResult["PROPERTIES"]["VIDEO"]["VALUE"][0]);
    }?>
 <?//echo '<pre>'; echo print_r(v); echo '</pre>';?> 
 <?//if (($USER->IsAuthorized())&&in_array(1,CUser::GetUserGroup(CUser::GetID()))||in_array(5,CUser::GetUserGroup(CUser::GetID()))){ ?>	
 
      <link href='<?=SITE_TEMPLATE_PATH?>/js/main.css' rel='stylesheet' type='text/css'>  
         <link href='<?=SITE_TEMPLATE_PATH?>/js/headhesive.css' rel='stylesheet' type='text/css'>

<?//}?>

	<?if(!empty($arResult["PREVIEW_TEXT"])):?>
		<h2 class="cl-h2-element hidden-sm hidden-xs"><?=$arResult["PREVIEW_TEXT"];?></h2>
	<?endif;?>

<?include_once 'top_tabs.php';?>
<div class="row">
    <script>
        fbq('track', 'ViewContent', {
            value: <? echo $arResult['CATALOG_PRICE_1']; ?>,
            currency: 'RUB',
            content_ids: '<? echo $arResult['ID']; ?>',
            content_type: 'product',
        });
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=547066658979761&ev=PageView&noscript=1"/>
    </noscript>
   <!-- <div style="display:none;">
        <?/* print_r($arResult); */?>
    </div>-->
	<div class="hidden-lg hidden-md col-sm-12 col-xs-12" style=" border-bottom: 1px solid #e4e4e6; /*width: 112%; margin: 0 0 0 -6%; padding: 0 0 0 9%;*/ position: relative; ">
		<div style="padding: 10px 0 10px;">
			<a href="javascript:void(0)" onclick="history.back();" style="color: #000;"><img src="/images/left-arrow.png">&nbsp;&nbsp;Назад</a>
		</div>
	</div>
    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
        <!--slider block, also includes manufacturer logo, sale icons and value-->
        <?if (count($arResult["MORE_PHOTO"])>0):?>
            <?  include_once 'slider.php';?>
        <?endif;?>
    </div>

	<div class="hidden-lg hidden-md col-sm-12 col-xs-12" style="border-bottom: 2px solid #e1e1e1;margin: 10px 0;">
		<p itemprop="name" style="text-align: center; margin: -3px 0 16px; font-size: 17px; font-weight: 700;"><?=$arResult["NAME"]?></p>
		<?if(!empty($arResult["PREVIEW_TEXT"])):?>
			<h2 class="cl-h2-element" style="text-align: center;"><?=$arResult["PREVIEW_TEXT"];?></h2>
		<?endif;?>
	</div>

    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 bxr-detail-right">
        <?
        //rating block
        if ($useVoteRating)
        {?>
            <div class="bxr-rating-wrap"<?=($arResult["PROPERTIES"]["rating"]["VALUE"])?' itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating"':'';?>>
<?if($arResult["PROPERTIES"]["rating"]["VALUE"]):?>
		<meta itemprop="ratingValue" content="<?=($arResult["PROPERTIES"]["rating"]["VALUE"])?$arResult["PROPERTIES"]["rating"]["VALUE"]:0?>">
		<meta itemprop="ratingCount" content="<?=($arResult["PROPERTIES"]["vote_count"]["VALUE"])?$arResult["PROPERTIES"]["vote_count"]["VALUE"]:'0'?>">
<?endif;?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:iblock.vote",
                "stars_new",
                array(
                        "IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
                        "IBLOCK_ID" => $arParams['IBLOCK_ID'],
                        "ELEMENT_ID" => $arResult['ID'],
                        "ELEMENT_CODE" => "",
                        "MAX_VOTE" => "5",
                        "VOTE_NAMES" => array("1", "2", "3", "4", "5"),
                        "SET_STATUS_404" => "N",
                        "DISPLAY_AS_RATING" => $arParams['VOTE_DISPLAY_AS_RATING'],
                        "CACHE_TYPE" => $arParams['CACHE_TYPE'],
                        "CACHE_TIME" => $arParams['CACHE_TIME']
                ),
                $component,
                array("HIDE_ICONS" => "Y")
            );?>
            </div>
        <?}?>
		<span class="hidden-sm hidden-xs" id="top_reviews">
			<a href="#tabs" onclick="$('#tab_review').click();"><span id="count_top_reviews">0</span> отзывов</a> | <a href="#tabs" id="addNewComment" onclick="yaCounter36717630.reachGoal('napisat_otziv'); $('#tab_review').click(); $('.blog-add-comment a').click();">Написать отзыв</a>
		</span>
		<span class="hidden-sm hidden-xs" id="quantity_pc">
        	<?  include_once 'quantity.php';?>
		</span>
		<span id="top_delivery">
			<?//блок доставки?>
			<a href="javascript:void(0)" rel="nofollow" class="popup" onclick="SetDeliveryBlock()">Варианты доставки</a>
			<div id="top_delivery_info" data-state="0"></div>
		</span>
        <div class="clearfix"></div>
        <?if ($arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"] && false) {?>
            <div class="bxr-good-article">
                <?=GetMessage("BXR_ARTICLE_TITLE_DETAIL").": ".$arResult["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?> 
            </div>
        <?}?>
        <div class="clearfix"></div>
        <!--prices block -->
        <div id="bxr-market-price-wrap" itemprop="offers" itemscope <?=(count($arResult["OFFERS"]) > 0)?'itemtype="http://schema.org/AggregateOffer"':'itemtype="http://schema.org/Offer"'?>>
            <?  include_once 'prices.php';?>
        </div>

		<span class="hidden-lg hidden-md" id="quantity_mob" style="text-align: center; width: 100%; float: right;">
		</span>
		<script>
			$( document ).ready(function() {
				var tmp = $('#quantity_pc').html();
				$('#quantity_mob').html(tmp);
			});
		</script>

        <!--sku-select block -->
        <?if (count($arResult["OFFERS"]) > 0) {?>
            <div id="bxr-market-sku-select-wrap" class="tb20">
                <?  include_once 'sku_select.php';?>
            </div>
        <?}?>
        <!--basket-btns block-->
        <div id="bxr-market-detail-basket-btn-wrap">
            <?  include_once 'basket_btn.php';?>
        </div>
        <?if ($arResult["PreviewBlockShow"]) {?>
            <div class="bxr-detail-preview-wrap">
                <?if ($arResult["PREVIEW_TEXT"]) {?>
                    <?  /*include_once 'anounce.php';*/?>
                <?}?>
                <?if (count($arParams["PREVIEW_DETAIL_PROPERTY_CODE"]) > 0) {?>
                    <?  include_once 'preview_props.php';?>
                <?}?>
            </div>
        <?}?>
    </div>
    <div class="clearfix"></div>
</div>

<div class="row tb20" id="bxr-detail-block-wrap">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
        <?if ($arResult['OFFER_GROUP']) {?>
            <?  include_once 'set.php';?>
        <?}?>
		<a id="tabs" name="tabs"></a>
        <?  include_once 'tabs.php';?>
        <?if (count($arResult["OFFERS"]) > 0) {?>
            <?  include_once 'script.php';?>
            <?
                if ($arParams["HIDE_OFFERS_LIST"] != "Y"){
                    include_once 'offers_list.php';
                }
            ?>
        <?}?>
        <?if ($arResult["DETAIL_TEXT"]) {?>
            <?  include_once 'detail_text.php';?>
        <?} else {?>
	    <meta itemprop="description" content="<?=$arResult["NAME"]?>">
	<?}?>
        <?if  (!empty($arResult["PROPERTIES"]["PROP_sposob"]["VALUE"]["TEXT"])) {?>
            <?  include_once 'properties_list.php';?>
        <?}?>
        <?if  (!empty($arResult["PROPERTIES"]["PROP_sostav"]["VALUE"]["TEXT"])) {?>
            <?  include_once 'sostav_list.php';?>
        <?}?>		
        <?if ($show_files) {?>
            <?  include_once 'files.php';?>
        <?}?>
        <?if ($show_video) {?>
            <?  include_once 'video.php';?>
        <?}?>
        <?if ($storeAmount) {?>
            <?  include_once 'store_amount.php';?>
        <?}?>
	<?if ($arParams["ADDITIONAL_TAB_SHOW"] == 'Y' && strlen($arParams["ADDITIONAL_TAB_PATH"]) > 0 ):?>

	    <div class="bxr-detail-tab bxr-detail-review" data-tab="additional-tab">
			<h3 class="bxr-detail-tab-mobile-title  hidden-lg hidden-md hidden-sm hidden-xs"><?=$arParams["ADDITIONAL_TAB_NAME"]?>?</h3>		
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"PATH" => $arParams["ADDITIONAL_TAB_PATH"],
				"AREA_FILE_RECURSIVE" => "N",
				"EDIT_MODE" => "html",
			),
			false,
			Array('HIDE_ICONS' => 'Y')
		);?>
	    </div>
	<?endif;?>
    </div>
</div>
<?if($_GET["ADD_COMMENT"] == "Y")
{
	echo '<script>
		$(document).ready(function() {
			//перехожу к добавлению комментария
			$("#addNewComment").trigger("click");
			//$(".blog-add-comment a").click();
		});
		</script>';
}?>
<script>

	var menuf = $('.bxr-v-line_menu').data();

	if (menuf.fixed == 'Y'){
		menuf.fixed = 'N';
$('#vis').remove();		
	};

	//$('div.ph-menu').css('display':'block');
	

//jQuery.data($('.bxr-v-line_menu'), 'fixed', 'N');
//$('div.bxr-v-line_menu').data

	
	//$("ul.bxr-top-menu li").
	//$(".bxr-flex-menu").attr("style", "width: 100%;height: 100%; overflow: visible;visibility: visible;");

</script>
<script type="text/javascript">

	var price = $('.bxr-market-current-price').data("id");
	
document.getElementById('pri').innerHTML = price+' р.';
</script>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Product",
  "description": "<?echo $arResult["DETAIL_TEXT"];?>",
  "name": "<?echo $arResult['NAME']?>",
  "brand": "<?echo $arResult['PROPERTIES']['MANUFACTURER']['VALUE'];?>",
  "image": "<?echo $arResult['DETAIL_PICTURE']['SRC'];?>",
  "offers": {
	"@type": "Offer",
	"availability": "http://schema.org/InStock",
	"price": "<?echo $arResult['CATALOG_PRICE_1'];?>",
	"priceCurrency": "RUB"
  }
<?if($arResult["PROPERTIES"]["rating"]["VALUE"] > 0):?>
  ,"aggregateRating": {
	"@type": "AggregateRating",
    "bestRating": "5",
	"ratingValue": "<?echo $arResult["PROPERTIES"]["rating"]["VALUE"];?>",
	"reviewCount": "<?echo ($arResult["PROPERTIES"]["vote_count"]["VALUE"])?$arResult["PROPERTIES"]["vote_count"]["VALUE"]:1?>"
  }
<?endif;?>
  }
  </script>
<script type="text/javascript">
    window.vkAsyncInit = function() {
        VK.Retargeting.Init('VK-RTRG-84381-PuBb'); 
        VK.Retargeting.Hit();
        //var section = <?=$arResult['SECTION_ID']?>;
        var category_ids = "<?
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
        console.log(eventParams);
        VK.Retargeting.ProductEvent(price_list_id, "view_product", eventParams); 
        $("#formBtn .bxr-basket-add").on("click", function(e){
            VK.Retargeting.ProductEvent(price_list_id, "add_to_cart", eventParams); 
        });
    }
</script>
<? if ($_GET["test"]) {
    echo "<pre>";
    print_r($arResult);
    echo "</pre>";
}