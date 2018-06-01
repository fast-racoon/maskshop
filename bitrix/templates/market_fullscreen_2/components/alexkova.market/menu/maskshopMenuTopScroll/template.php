<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
const MY_HL_BLOCK_ID = 2;
$this->setFrameMode(true);
?>
<?if (!empty($arResult["TREE"])):?>
	<?
	$classUl = "";
	$classLi = "";
	$classLiSelected = "";

	$bigMode = "N";
	$lightMode = "N";

	if (strripos($arParams['STYLE_MENU'], "_big") !== false) {
		$bigMode = "Y";
		$arParams['STYLE_MENU'] = str_replace("_big", "", $arParams['STYLE_MENU']);
	}

	if (strripos($arParams['STYLE_MENU'], "_lighten") !== false) {
		$lightMode = "Y";
		$arParams['STYLE_MENU'] = str_replace("_lighten", "", $arParams['STYLE_MENU']);
	}

	switch ($arParams['STYLE_MENU']) {
		case "colored_light":
			$classLi = "bxr-children-color-hover";
			$classLiSelected = "bxr-children-color";
			$arColor['ico'] = "ico_color";
			$arColorH['ico'] = "ico_color";
			break;
		case "colored_color":
			$classUl = "bxr-color-flat";
			$classLi = "bxr-color-flat bxr-bg-hover-dark-flat";
			$classLiSelected = "bxr-color-dark-flat";
			$arColor['ico'] = "ico_light";
			$arColorH['ico'] = "ico_light";
			break;
		case "colored_dark":
			$classUl = "bxr-dark-flat";
			$classLi = "bxr-dark-flat bxr-bg-hover-flat";
			$classLiSelected = "bxr-color-flat";
			$arColor['ico'] = "ico_color";
			$arColorH['ico'] = "ico_light";
			break;
	}

	$classLiParent = "";
	if(isset($arParams["TEMPLATE_MENU_HOVER"]) && $arParams["TEMPLATE_MENU_HOVER"]!="classic")
		$classLiParent = "bxr-li-top-menu-parent";

	if($bigMode == "Y")
		$classUl .= " bxr-big-menu ";

	if($lightMode == "Y")
		$classUl .= " bxr-light-menu ";

	if($arParams['STYLE_MENU']=="colored_light")
		$classUl .= " line-top ";
	?>
	<?if($arParams["FULL_WIDTH"] == "Y"):?>
        <div <?if($arParams["FIXED_MENU"] == "Y") echo 'data-fixed="Y"';?> class="bxr-v-line_menu hidden-sm hidden-xs <?=$classUl;?> <?=$arParams["STYLE_MENU"];?>"><div class="container">
	<?else:?>
        <div <?if($arParams["FIXED_MENU"] == "Y") echo 'data-fixed="Y"';?>  class="container hidden-sm hidden-xs bxr-v-line_menu <?=$arParams["STYLE_MENU"];?>">
	<?endif;?>

    <div class="row"><div class="col-sm-12"><nav>
                <?/*<div class="ph-menu hidden-xs hidden-sm hidden-md">
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
                </div>*/?>
                <ul data-style-menu="<?=$arParams['STYLE_MENU']?>" data-style-menu-hover="<?=$arParams['STYLE_MENU_HOVER']?>"  class="bxr-flex-menu  <?//=$classUl;?> bxr-top-menu basket-menu-fix-" style="height: 100%;">
					<?//if (($USER->IsAuthorized())&&in_array(1,CUser::GetUserGroup(CUser::GetID()))||in_array(5,CUser::GetUserGroup(CUser::GetID()))){?>

					<?php
					// подключаем пространство имен класса HighloadBlockTable и даём ему псевдоним HLBT для удобной работы

					// id highload-инфоблока

					//подключаем модуль highloadblock
					CModule::IncludeModule('highloadblock');
					//Напишем функцию получения экземпляра класса:
					function GetEntityDataClass($HlBlockId) {
						if (empty($HlBlockId) || $HlBlockId < 1)
						{
							return false;
						}
						$hlblock = HLBT::getById($HlBlockId)->fetch();
						$entity = HLBT::compileEntity($hlblock);
						$entity_data_class = $entity->getDataClass();
						return $entity_data_class;
					}
					?>

					<?php
					//const MY_HL_BLOCK_ID = 2;
					//CModule::IncludeModule('highloadblock');
					$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID);
					$rsData = $entity_data_class::getList(array(
						'select' => array('*')
					));

					?>

					<?//}?>
                    <li class="bxr-children-color-hover  wd-auto brand-link" style="display: block; width: 80px;">
                        <a href="/brands/" style="padding: 14px 5px; color:#414141;">
                            <?/*<img class="bxr-ico-menu-top" width="16px" height="16px" src="<?=SITE_TEMPLATE_PATH?>/images/brand.png" style=" display: inline; ">*/?>
							<?='Ѕренды';?><span class="fa fa-angle-down"></span>
                        </a>
                        <div class="bxr-classic_hover_menu  menu-arrow-top">
                            <ul>
								<?		$arSelect = Array();
								$arFilter = Array("IBLOCK_ID"=>11, "ACTIVE"=>"Y", "!PROPERTY_78"=>false);
								$arGroupBy = Array("PROPERTY_78");
								$res = CIBlockElement::GetList(Array(), $arFilter, $arGroupBy, Array("nPageSize"=>50), $arSelect);
								while($ob = $res->GetNextElement()){
									$arFields = $ob->GetFields();
									$arrValue[] = $arFields["PROPERTY_78_VALUE"];
								}

								$arrValue = array_unique($arrValue);
								//echo var_dump($arrValue);
								foreach ($arrValue as $itemValue){?>

								<?}?>
								<?while($el = $rsData->fetch()){?>
                                    <li class="bxr-bg-hover-flat"><a style="padding: 10px 15px 7px 15px;text-transform: uppercase;" href="<?=$el["UF_LINK"];?>"><?=$el["UF_NAME"];?></a></li>
								<?}?>

                            </ul>
                        </div>
                    </li>
					<?//}?>
					<?
					$previousLevel = 0;
					$flagFirst = true;
					$i = 0;

					foreach($arResult["TREE"] as $arItem):
                        if($arResult["NOT_SHOW_SECTIONS"][$arItem['PARAMS']['SECTION_ID']])
                            continue;

						$isChildren = false;
						$glyphicon = "";
						if(isset($arItem["CHILDREN"])) {
							$isChildren = true;
							$glyphicon = '<span class="fa fa-angle-down"></span>';
						}

						$s_ico = "";
						if(isset($arItem[$arColor['ico']]) && !empty($arItem[$arColor['ico']])) {
							if(is_numeric($arItem[$arColor['ico']])) {
								$img = CFile::ResizeImageGet($arItem[$arColor['ico']], array('width'=>16, 'height'=>16), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							}
							else {
								$img['src'] = $arItem[$arColor['ico']];
							}
							$s_ico = "<img class='bxr-ico-menu-top' style='display: inline-block;' src='" . $img['src'] . "'>";
						}

						$s_ico_h = "";
						if(isset($arItem[$arColorH['ico']]) && !empty($arItem[$arColorH['ico']])) {
							if(is_numeric($arItem[$arColorH['ico']])) {
								$img = CFile::ResizeImageGet($arItem[$arColorH['ico']], array('width'=>16, 'height'=>16), BX_RESIZE_IMAGE_PROPORTIONAL, true);
							}
							else {
								$img['src'] = $arItem[$arColorH['ico']];
							}
							$s_ico_h = "<img class='bxr-ico-menu-top-hover' style='position: absolute; left: 19px; top: 17px; opacity: 0;' src='" . $img['src'] . "'>";
						}

						?>
                        <li class="<?=$classLi . " " . $classLiParent;?> <?if($arItem['SELECTED'] == 1) echo $classLiSelected;?> wd-auto">
                            <a href="<?=$arItem["LINK"]?>"<?if($arItem['PARAMS']['COLOR']):?> style="color:#f44336"<?endif;?>><?=$s_ico.$s_ico_h.$arItem["TEXT"].$glyphicon;?></a>
							<?if($isChildren):?>
								<?
								$TemplateMenuHover = "classic";
								if(isset($arParams["TEMPLATE_MENU_HOVER"]))
									$TemplateMenuHover = $arParams["TEMPLATE_MENU_HOVER"];


								$arParamsHoverMenu = array(
									"PICTURE_SECTION" => $arParams['PICTURE_SECTION'],
									"CACHE_TYPE" => $arParams['CACHE_TYPE'],
									"CACHE_TIME" => $arParams['CACHE_TIME'],
									"MENU_TREE" => $arItem["CHILDREN"],
									"STYLE_MENU" => $arParams["STYLE_MENU"],
									"STYLE_MENU_HOVER" => $arParams["STYLE_MENU_HOVER"],
								);

								if(isset($arParams["TEMPLATE_MENU_HOVER"]) && $arParams["TEMPLATE_MENU_HOVER"]=="list") {
									$arParamsHoverMenu["PICTURE_CATEGARIES"] = $arParams["PICTURE_CATEGARIES"];
									$arParamsHoverMenu["HOVER_MENU_COL_LG"] = $arParams["HOVER_MENU_COL_LG"];
									$arParamsHoverMenu["HOVER_MENU_COL_MD"] = $arParams["HOVER_MENU_COL_MD"];
									$arParamsHoverMenu["HOVER_MENU_COL_SM"] = $arParams["HOVER_MENU_COL_SM"];
									$arParamsHoverMenu["HOVER_MENU_COL_XS"] = $arParams["HOVER_MENU_COL_XS"];

									if(isset($arItem["IMG"])) {
										$arParamsHoverMenu["IMG"] = $arItem["IMG"];
									}
								}
								?>
								<?$APPLICATION->IncludeComponent("alexkova.market:menu.hover", $TemplateMenuHover, $arParamsHoverMenu, false, array("HIDE_ICONS" => "Y"));?>
							<?endif;?>
                        </li>
					<?endforeach;?>
					<?/*<!--<li class="other <?=$classLi;?>" id="bxr-flex-menu-li">&nbsp;</li>-->*/?>
					<?/*<!--li class="last li-visible <?=$classLi;?>" id="vis" style="display: none;"><a href="#"><span class="fa fa-search"></span></a></li-->*/?>

					<?if($arParams['SEARCH_FORM'] == "Y"):?>
						<?/*<!--<li class="other <?=$classLi;?>" id="bxr-flex-menu-li">&nbsp;</li>-->*/?>
						<?/*<!--<li class="last li-visible <?=$classLi;?>" ><a href="#"><span class="fa fa-search"></span></a></li>-->*/?>
					<?else:?>
						<?/*<!--<li class="other pull-right <?=$classLi;?>" id="bxr-flex-menu-li">&nbsp;</li>-->*/?>
					<?endif;?>
					<?/*<!--	<li class="basket-fix"></li>
				-->*/?>

                    <div class="clearfix"></div>
                </ul>
				<?//if (($USER->IsAuthorized())&&in_array(1,CUser::GetUserGroup(CUser::GetID()))||in_array(5,CUser::GetUserGroup(CUser::GetID()))){ ?>
                <?/*div class="last basket-fix hidden-xs hidden-sm" style="margin-top: 8px;
																		    margin-right: 32px;
																		    float: right;
																			display: none;">
					<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_small_basket");
					$basketFrame->begin();?>
					<?$APPLICATION->IncludeComponent(
						"alexkova.market:basket.small",
						"smallMenuFix",
						array(
							"COMPONENT_TEMPLATE" => ".default",
							"PATH_TO_BASKET" => SITE_DIR."personal/basket/",
							"PATH_TO_ORDER" => SITE_DIR."personal/order/",
							"USE_COMPARE" => "Y",
							"IBLOCK_TYPE" => "catalog",
							"IBLOCK_ID" => "11",
							"USE_DELAY" => "Y"
						),
						false
					);?>
					<?$basketFrame->beginStub();
					echo "...";
					$basketFrame->end();?>

                </div*/?>
				<?//}?>
            </nav>
            <div class="menu-phone">
				<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/phone.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_MOBILE_PHONE")
						),
						false
					);?>
			</div>
        </div></div>
	<?if($arParams["FULL_WIDTH"] == "Y"):?>
        </div></div>
	<?else:?>
        </div>
	<?endif;?>
<?endif?>
<?//if($arParams["FULL_WIDTH"] == "Y"):?>
<div class="bxr-menu-search-line-container <?if($arParams["FULL_WIDTH"] == "Y") echo "bxr-menu-search-line-container-color"; ?>">
	<?//endif;?>
    <div class="container">
        <div class="row">
            <div id="bxr-menu-search-line" class="col-md-12 hidden-xs hidden-sm">
				<?$APPLICATION->IncludeComponent(
					"alexkova.market:search.title",
					"menu",
					$arParams,
					false,
					array("HIDE_ICONS" => "N")
				);?>
            </div>
			<?if($arParams['SEARCH_FORM'] == "Y"):?>
                <div id="bxr-menu-search-line" class="col-md-12 hidden-xs hidden-sm">
					<?$APPLICATION->IncludeComponent(
						"alexkova.market:search.title",
						"menu",
						$arParams,
						false,
						array("HIDE_ICONS" => "Y")
					);?>
                </div>
			<?endif;?>
        </div>
    </div>
	<?//if($arParams["FULL_WIDTH"] == "Y"):?>
</div>
<?//endif;?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-xs-12 hidden-lg hidden-md bxr-mobile-menu-button-container" style="text-align:center; margin-right:0px; padding: 0 0 0 0;">
            <div class="bxr-color-flat" style="background-color: #f6f6f7;">

                <div id="bxr-menuitem" class="bxr-mobile-menu-button col-sm-3 col-xs-3" style="text-align: left; padding-left: 25px; margin-right:0px; width:25%;"><i class="fa fa-bars" style="color: #000; margin-left: 0px;"></i><span class="mob_menu_name">меню</span></div>
                <div class="col-sm-3 col-xs-3 hidden-lg hidden-md bxr-mobile-phone-area " style="text-align:center;">
                    <div id="bxr-menu-search-form" class="bxr-mobile-menu-button" style="color: #000;margin: 0 auto;"><i class="fa fa-search"></i><span class="mob_menu_name">поиск</span></div>
                </div>
                <div class="col-sm-3 col-xs-3 hidden-lg hidden-md bxr-mobile-phone-area " style="text-align:left;">
					<?if($USER->IsAuthorized()){?><a href="/personal/main/"> <?}else{?><a href="javascript:void(0);" onclick="openAuthorizePopup()"> <?}?>
                            <div class="bxr-counter-mobile hidden-lg hidden-md bxr-mobile-phone-icon auth-ico" style="background: #f6f6f7;color: #000; font-size: 24px; padding: 4px; float: none; margin-left: 0px;">
                                <i class="fa fa-user"></i>
                            </div>
                            <span class="mob_menu_name" style="padding: 2px;">личный кабинет</span>
                        </a>
                </div>
                <a href="/personal/basket/">
                    <div class="hidden-lg hidden-md col-sm-3 col-xs-3 " id="bxr-basket-mobile" style="text-align:left;">
						<?// this block if basket mobile container base?>
                    </div>
                    <span class="mob_menu_name" style="padding: 0px; margin: 11px 0 0 -90px;">корзина</span>
                </a>
                <style>
                    .bxr-counter-mobile-favor{
                        display:none;
                    }
                    .bxr-counter-mobile-basket{
                        font-size: 24px;
                        color: #000;
                        background: #f6f6f7;
                        padding: 4px;
                        float: none;
                    }
                </style>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-xs-12 hidden-lg hidden-md bxs-search-mobil-menu">
			<?$APPLICATION->IncludeComponent("bitrix:search.form", "market", array(

			),
				false,
				array(
					"HIDE_ICONS" => "N",
					"ACTIVE_COMPONENT" => "N"
				)
			);?>
        </div>
    </div>
	<?//if($arParams['SEARCH_FORM'] == "Y"):?>
    <div class="row">
        <div class="col-sm-12 col-xs-12 hidden-lg hidden-md bxs-search-mobil-menu">
			<?$APPLICATION->IncludeComponent(
				"bitrix:search.form",
				"market",
				$arParams,
				false,
				array("HIDE_ICONS" => "N")
			);?>
        </div>
    </div>
	<?//endif;?>
    <div class="row">
        <div class="col-sm-12 col-xs-12 hidden-lg hidden-md" id="bxr-mobile-menu-container">
            <div id="bxr-mobile-menu-body"></div>
        </div>
    </div>
</div>

<?//на странице успешного оформлени€ заказа вывожу верхнее меню
if($_GET["ORDER_ID"] != "")
{?>
	<script>
		$( document ).ready(function() {
			$('.basket-menu-fix').attr("style", "width: 100%;height: 100%;overflow: visible;visibility: visible;");
		});
	</script>
<?}?>

<style>
    .ph-menu{
        display: none;
        float: left;
        padding: 14px;
        color: #e34444;
    }
    @media (min-width: 768px) and (max-width: 992px)
    {
        .mob_menu_name{
            color: #000;
            padding-left: 15px;
            position: absolute;
            font-weight: bold;
        }
    }
    @media (max-width: 768px)
    {
        .mob_menu_name{
            display:none;
        }
    }
    @media (max-width: 1200px)
    {
        .basket-fix{
            margin-right: 0px !important;
        }
        #bxr-basket-row > div{
            margin-left: 0px !important;
        }
    }
    @media (min-width: 992px) and (max-width: 1200px)
    {
        .basket-menu-fix{
            /*width: 90%;*/
        }
        .basket-menu-fix li img
        {
            display: none !important;
        }
        ul.bxr-service-menu li
        {
            margin-right: 5px;
        }
    }
    @media (min-width: 1200px)
    {
        .basket-menu-fix{
            /*width: 74%;*/
        }
    }
    /*ul.bxr-flex-menu > li:hover .bxr-ico-menu-top-hover  {
		display: none;
	}

	.basket-fix{
		width: 136px !important;
		display: block;
	}
	*/
</style>