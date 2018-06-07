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
use Alexkova\Market\Core;
$BXReady = \Alexkova\Market\Core::getInstance();

$this->addExternalCss("/bitrix/css/main/bootstrap.css");
?>
<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
    <?if (isset($arParams["SHOW_LEFT_MENU"]) && $arParams["SHOW_LEFT_MENU"]=="Y"):?>
	<?$APPLICATION->IncludeComponent(
		"alexkova.market:menu",
		isset($arParams["LEFT_MENU_TEMPLATE"]) ? $arParams["LEFT_MENU_TEMPLATE"] : "left",
		array(
                    "ROOT_MENU_TYPE" => isset($arParams["ROOT_MENU_TYPE"]) ? $arParams["ROOT_MENU_TYPE"] : "left",
                    "MAX_LEVEL" => isset($arParams["MAX_LEVEL"]) ? $arParams["MAX_LEVEL"] : "2",
                    "CHILD_MENU_TYPE" => isset($arParams["CHILD_MENU_TYPE"]) ? $arParams["CHILD_MENU_TYPE"] : "left",
                    "USE_EXT" => isset($arParams["USE_EXT"]) ? $arParams["USE_EXT"] : "Y",
                    "DELAY" => isset($arParams["DELAY"]) ? $arParams["DELAY"] : "N",
                    "TITLE_MENU" => isset($arParams["TITLE_MENU"]) ? $arParams["TITLE_MENU"] : "",                    
                    "STYLE_MENU" => isset($arParams["STYLE_MENU"]) ? $arParams["STYLE_MENU"] : "colored_light", 			
                    "PICTURE_SECTION" => isset($arParams["PICTURE_SECTION"]) ? $arParams["PICTURE_SECTION"] : "N", 
                    "STYLE_MENU_HOVER" => isset($arParams["STYLE_MENU_HOVER"]) ? $arParams["STYLE_MENU_HOVER"] : "colored_light",
                    "PICTURE_SECTION_HOVER" => isset($arParams["PICTURE_SECTION_HOVER"]) ? $arParams["PICTURE_SECTION_HOVER"] : "N",
                    "PICTURE_CATEGARIES" => isset($arParams["PICTURE_CATEGARIES"]) ? $arParams["PICTURE_CATEGARIES"] : "N",
                    "HOVER_MENU_COL_LG" => isset($arParams["HOVER_MENU_COL_LG"]) ? $arParams["HOVER_MENU_COL_LG"] : "2",
                    "HOVER_MENU_COL_MD" => isset($arParams["HOVER_MENU_COL_MD"]) ? $arParams["HOVER_MENU_COL_MD"] : "2",
                    "HOVER_MENU_COL_SM" => isset($arParams["HOVER_MENU_COL_SM"]) ? $arParams["HOVER_MENU_COL_SM"] : "2",
                    "HOVER_MENU_COL_XS" => isset($arParams["HOVER_MENU_COL_XS"]) ? $arParams["HOVER_MENU_COL_XS"] : "2",
                    "SUBMENU" => isset($arParams["SUBMENU"]) ? $arParams["SUBMENU"] : "ACTIVE_SHOW",
                    "HOVER_TEMPLATE" => isset($arParams["HOVER_TEMPLATE"]) ? $arParams["HOVER_TEMPLATE"] : "classic",
                    "MENU_CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "MENU_CACHE_TIME" => $arParams["CACHE_TIME"],
                    "MENU_CACHE_USE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "MENU_CACHE_GET_VARS" => array(
                    ),
                    "SHOW_TREE" => "Y",
		),
		false,
                array("HIDE_ICONS" => "Y")
	);?>
    <?endif;?>

	<?$BXReady->showBannerPlace("LEFT");?>

</div>
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
		<?$BXReady->showBannerPlace("CATALOG_TOP");?>
	<h1><?$APPLICATION->ShowTitle(false);?></h1>

<?/*global $USER;
if(!$USER->IsAdmin()){?>

	<?$APPLICATION->IncludeComponent(
		"bitrix:catalog.section.list",
		"catalog_index",
		array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
			"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
			"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
			"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
			"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
			"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
			"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : ''),
                        "SECTIONS_SHOW_DESCRIPTION" => (isset($arParams["SECTIONS_SHOW_DESCRIPTION"]) ? $arParams["SECTIONS_SHOW_DESCRIPTION"] : 'Y')
		),
		$component,
		array("HIDE_ICONS" => "Y")
	);
	?>

<?}else{*/?>

<style>
.color_row {
    font-size: 40px;
    background: #fee1ee;
    text-align: center;
    padding-top: 25px;
    padding-bottom: 25px;
    font-family: Raleway Medium;
}
.noPaddingRow{
	padding: inherit !important;
}
.imgRow{
	max-width: 100%;
}
.txtRowTitle{
    color: #000;
    font-size: 15px;
    font-family: Raleway Simibold;
    text-decoration: underline;
    padding: 25px 10px 15px 10px;
    text-align: center;
    font-weight: bold;
    display: block;
}
.txtRowTxt{
    color: #000;
    font-size: 13px;
    margin: 0px 10px;
    display: block;
    text-align: center;
}
@media (max-width: 768px) {
	.noPaddingRow{
		min-height: 150px;
	}
	.imgRow {
		max-height: 150px;
	}
	.color_row{
    	font-size: 25px;
	}
}
</style>
	<div class="row color_row">
		ОСНОВНОЙ УХОД
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/1.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<div class="txtRowTitle"><a href="/catalog/base/ochishchenie/snyatie-makiyazha/" style="color:#000">СНЯТИЕ МАКИЯЖА</a> + <a href="/catalog/base/ochishchenie/gidrofilnoe-maslo/" style="color:#000">ГИДРОФИЛЬНОЕ МАСЛО</a></div>
			<a href="/catalog/base/ochishchenie/snyatie-makiyazha/" class="txtRowTxt hidden-xs">Средства для снятия макияжа</a>
			<a href="/catalog/base/ochishchenie/mitsellyarnaya-voda/" class="txtRowTxt hidden-xs">Мицеллярная вода</a>
			<a href="/catalog/base/ochishchenie/gidrofilnoe-maslo/" class="txtRowTxt hidden-xs">Гидрофильное масло</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/2.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs">
			<div class="txtRowTitle"><a href="/catalog/base/ochishchenie/penki/" style="color:#000">ПЕНКА</a> +<br><a href="/catalog/base/ochishchenie/mylo/" style="color:#000">МЫЛО</a></div>
			<a href="/catalog/base/ochishchenie/penki/" class="txtRowTxt">Пенки</a>
			<a href="/catalog/base/ochishchenie/mylo/" class="txtRowTxt">Мыло</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow"><br>
			<div class="txtRowTitle"><a href="/catalog/base/ochishchenie/pilingi/" style="color:#000">ПИЛИНГ</a>/<a href="/catalog/base/ochishchenie/skraby/" style="color:#000">СКРАБ</a></div>
			<a href="/catalog/base/ochishchenie/pilingi/" class="txtRowTxt">Пилинги</a>
			<a href="/catalog/base/ochishchenie/skraby/" class="txtRowTxt">Скрабы</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/3.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br>
			<a href="/catalog/base/tonery/" class="txtRowTitle">ТОНЕР</a>
			<a href="/catalog/base/tonery/" class="txtRowTxt">Тонеры</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/4.png">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/5.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br>
			<a href="/catalog/base/essentsii/" class="txtRowTitle">ЭССЕНЦИЯ</a>
			<a href="/catalog/base/essentsii/" class="txtRowTxt">Эссенция</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/6.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs">
			<div class="txtRowTitle">СПЕЦИАЛЬНЫЙ<br>УХОД</div>
			<a href="/catalog/base/syvorotki/" class="txtRowTxt">Сыворотки</a>
			<a href="/catalog/base/syvorotki/" class="txtRowTxt">Ампулы</a>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<div class="txtRowTitle">МАСКИ/ПАТЧИ</div>
			<a href="/catalog/base/maski-i-patchi/alginatnye-maski/" class="txtRowTxt">Альгинатные</a>
			<a href="/catalog/base/maski-i-patchi/tkanevye-maski/" class="txtRowTxt">Тканевые</a>
			<a href="/catalog/base/maski-i-patchi/gidrogelevye-maski/" class="txtRowTxt">Гидрогелевые</a>
			<a href="/catalog/base/maski-i-patchi/ampulnye-maski/" class="txtRowTxt hidden-xs">Ампульные</a>
			<a href="/catalog/base/maski-i-patchi/nochnye-maski/" class="txtRowTxt hidden-xs">Ночные</a>
			<a href="/catalog/base/maski-i-patchi/smyvaemye/" class="txtRowTxt hidden-xs">Смываемые</a>
			<a href="/catalog/base/maski-i-patchi/karboksiterapiya/" class="txtRowTxt hidden-xs">Карбокситерапия</a>
			<a href="/catalog/base/maski-i-patchi/patchi/" class="txtRowTxt hidden-xs">Патчи</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/7.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br>
			<a href="/catalog/base/krem-dlya-glaz/" class="txtRowTitle">КРЕМ ДЛЯ ГЛАЗ</a>
			<a href="/catalog/base/krem-dlya-glaz/" class="txtRowTxt">Кремы для глаз</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/8.png">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/9.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br>
			<a href="/catalog/base/kremy/" class="txtRowTitle">КРЕМ ДЛЯ ЛИЦА</a>
			<a href="/catalog/base/kremy/" class="txtRowTxt">Кремы для лица</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/10.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs">
			<a href="/catalog/base/solntsezashchitnye-sredstva/" class="txtRowTitle">ЗАЩИТА ОТ СОЛНЦА</a>
			<a href="/catalog/base/solntsezashchitnye-sredstva/" class="txtRowTxt">Средства с защитой от солнца</a>
		</div>
	</div>

	<div class="row color_row">
		УХОД ЗА ТЕЛОМ
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br>
			<a href="/catalog/telo/ukhod-za-telom/" class="txtRowTitle">КОСМЕТИКА ДЛЯ ТЕЛА</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/11.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br>
			<a href="/catalog/telo/ukhod-za-rukami/" class="txtRowTitle">КОСМЕТИКА ДЛЯ РУК</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/12.png">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/13.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br><br>
			<a href="/catalog/telo/ukhod-za-nogami/" class="txtRowTitle">КОСМЕТИКА ДЛЯ НОГ</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/14.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br>
			<a href="/catalog/telo/ukhod-za-nogtyami/" class="txtRowTitle">УХОД ЗА НОГТЯМИ</a>
		</div>
	</div>

	<div class="row color_row">
		УХОД ЗА ВОЛОСАМИ
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br><br>
			<a href="/catalog/volosy/shampuni/" class="txtRowTitle">ШАМПУНИ</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/15.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br><br>
			<a href="/catalog/volosy/konditsionery/" class="txtRowTitle">КОНДИЦИОНЕРЫ</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/16.png">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/17.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br>
			<a href="/catalog/volosy/ukhod-za-volosami/" class="txtRowTitle">УХОД ЗА ВОЛОСАМИ</a>
		</div>
	</div>

	<div class="row color_row">
		МАКИЯЖ
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow"><br>
			<a href="/catalog/makiyazh/dlya-litsa/" class="txtRowTitle">ДЛЯ ЛИЦА</a>
			<a href="/catalog/makiyazh/dlya-litsa/bazy-pod-makiyazh/" class="txtRowTxt">Базы под макияж</a>
			<a href="/catalog/makiyazh/dlya-litsa/bb-cc-krema/" class="txtRowTxt">BB / CC - кремы</a>
			<a href="/catalog/makiyazh/dlya-litsa/tonalnye-sredstva/" class="txtRowTxt hidden-xs">Тональные средства</a>
			<a href="/catalog/makiyazh/dlya-litsa/konsilery/" class="txtRowTxt hidden-xs">Корректирующие средства</a>
			<a href="/catalog/makiyazh/dlya-litsa/pudry/" class="txtRowTxt hidden-xs">Пудры</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/18.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br><br>
			<a href="/catalog/makiyazh/dlya-glaz/" class="txtRowTitle">ДЛЯ ГЛАЗ</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/19.png">
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/20.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br><br>
			<a href="/catalog/makiyazh/dlya-brovey/" class="txtRowTitle">ДЛЯ БРОВЕЙ</a>
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow">
			<img class="imgRow" src="/images/new_catalog/21.png">
		</div>
		<div class="col-md-3 col-xs-6 noPaddingRow"><br class="hidden-xs"><br class="hidden-xs"><br class="hidden-xs"><br><br>
			<a href="/catalog/makiyazh/dlya-gub/" class="txtRowTitle">ДЛЯ ГУБ</a>
		</div>
	</div>

<?//}?>

	<?$BXReady->showBannerPlace("CATALOG_BOTTOM");?>
</div>

