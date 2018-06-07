<?IncludeTemplateLangFile(__FILE__);?>
<?php define('SITE_TEMPLATE_VERSION', '?v=' . time());?>
<?
if (!CModule::IncludeModule('alexkova.market')) return;
if (!CModule::IncludeModule('alexkova.bxready')) return;

use Alexkova\Market\Core;
use Alexkova\Bxready\Core as BXRCore;
use Alexkova\Bxready\Bxready;

global $templateType, $catalogType, $mainPageType, $arTopMenu, $arLeftMenu;

$arTopMenu = array (
	"TYPE" => "only_catalog",
	"TEMPLATE" => "version_v1",
	"FIXED_MENU" => "",
	"FULL_WIDTH" => "Y",
	"STYLE_MENU" => "colored_light",
	"TEMPLATE_MENU_HOVER" => "classic",
	"STYLE_MENU_HOVER" => "colored_light",
	"PICTURE_SECTION" => "N",
	"PICTURE_CATEGARIES" => "N",
	"HOVER_MENU_COL_LG" => "3",
	"HOVER_MENU_COL_MD" => "3",
		"SEARCH_FORM" => "N"
);

$arLeftMenu = array (
	"TYPE" => "only_catalog",
	"LEFT_MENU_TEMPLATE" => "left_hover",
	"STYLE_MENU" => "colored_light",
	"PICTURE_SECTION" => "N",
	"SUBMENU" => "ACTIVE_SHOW",
		"HOVER_TEMPLATE" => "list",
		"STYLE_MENU_HOVER" => "colored_light",
		"PICTURE_SECTION_HOVER" => "N",
		"PICTURE_CATEGARIES" => "N",
		"HOVER_MENU_COL_LG" => "2",
		"HOVER_MENU_COL_MD" => "2"
	
);

$BXReady = \Alexkova\Market\Core::getInstance();
/******************default settings************************/
if($APPLICATION->GetCurDir() != '/test/')
{
$BXReady->setAreaType('top_line_type', 'v21');
$BXReady->setAreaType('header_type', 'version_6');
$BXReady->setAreaType('top_menu_type', 'v1');
$BXReady->setAreaType('left_menu_type', 'v2');
}

$BXReady->setBannerSettings(array(
	"TOP"=>"FIXED",
	"BOTTOM"=>"FIXED",
	"CATALOG_TOP"=>"RESPONSIVE",
	"CATALOG_BOTTOM"=>"RESPONSIVE",
	"LEFT"=>"RESPONSIVE",
));

if ($USER->IsAdmin()) $BXReady->getBitrixTopPanelMenu();

$mainPageType = "one_col";
//$mainPageType = "two_col";
$templateType = "two_col";
//$templateType = "one_col";
$catalogType = "two_col";
?>



<?
/*
if($APPLICATION->GetCurDir() == '/test/')
{
*/

$BXReady->setAreaType('top_line_type', 'v21_new');
$BXReady->setAreaType('header_type', 'version_6_new');
$BXReady->setAreaType('top_menu_type', 'v1');
$BXReady->setAreaType('left_menu_type', 'v2');

$noIndexArr = [
	'/brands/holika-holika/pudry/',
	'/brands/holika-holika/shampuni/',
	'/brands/holika-holika/sprei-misty/',
	'/brands/holika-holika/tonery/',
	'/brands/holika-holika/ukhod-za-volosami/',
	'/brands/holika-holika/mitsellyarnaya-voda/',
	'/brands/tony-moly/petitfee/',
	'/blog/karboksiterapiya-ahttp:/www.uaua.info/planirovaniye-semji/oslozhnenia-beremennosti/article-9838-beremennost-i-vich/',
];

?>
	<!DOCTYPE html>
	<html>
	<head>

	<?php if (in_array($_SERVER['REQUEST_URI'], $noIndexArr)): ?>
		<meta name="robots" content="noindex, follow" />	
	<?php endif ?>
	
	<?php if ($_SERVER['REQUEST_URI'] == '/'): ?>
		<meta name="copyright" lang="ru" content="MaskShop" />
	<?php endif ?>
	
		<title><?$APPLICATION->ShowTitle();?></title>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,700,700italic&subset=latin,cyrillic,cyrillic-ext' rel='stylesheet' type='text/css'>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<?$APPLICATION->ShowHead();?>
	
			<?
			$APPLICATION->SetAdditionalCSS("/bitrix/css/main/bootstrap.css".SITE_TEMPLATE_VERSION);
			$APPLICATION->SetAdditionalCSS("/bitrix/css/main/font-awesome.css".SITE_TEMPLATE_VERSION);
			?>
			
		<?
		$APPLICATION->SetAdditionalCSS("/local/fonts/raleway.css");
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/library/bootstrap/css/grid10_column.css'.SITE_TEMPLATE_VERSION, true);
		$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/library/less/less.css".SITE_TEMPLATE_VERSION, true);
			$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/my_css.css".SITE_TEMPLATE_VERSION);
		?>
	
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/jquery-1.11.3.js'.SITE_TEMPLATE_VERSION);?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/inputmask.js'.SITE_TEMPLATE_VERSION);?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/readmore.min.js'.SITE_TEMPLATE_VERSION);?>
			<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/script.js'.SITE_TEMPLATE_VERSION);?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/library/bootstrap/js/bootstrap.min.js'.SITE_TEMPLATE_VERSION);?>

 <!-- Google Tag Manager -->
<script data-skip-moving=true>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5D8K2B');</script>
 <!-- End Google Tag Manager -->

	</head>
	
	<body id="top">

	<div id="vk_api_transport"></div> 
	<script type="text/javascript"> 
	  window.vkAsyncInit = function() { 
	    VK.Retargeting.Init('VK-RTRG-84381-PuBb'); 
	    VK.Retargeting.Hit();
	  }; 

	setTimeout(function() { 
	    var el = document.createElement("script"); 
	    el.type = "text/javascript"; 
	    el.src = "https://vk.com/js/api/openapi.js?150";; 
	    el.async = true; 
	    document.getElementById("vk_api_transport").appendChild(el); 
	  }, 0); 
	</script> 
	<!-- THIS IS TEMPLATE BIPLANE -->
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5D8K2B"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
		  ga('create', 'UA-76267011-1', 'auto');
		  ga('require', 'displayfeatures');
		  ga('send', 'pageview');
	</script>
	
		<div id="panel">
			<?$APPLICATION->ShowPanel();?>
		</div>
	
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"named_area",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_DIR."include/schema.php"
			),
			false
		);?>	
		<?if ($GLOBALS["USER"]->isAdmin() && false){?>
			<?$APPLICATION->IncludeComponent(
				"bxr.demo:customize.panel",
				".default",
				array(),
				false
			);?>
		<?}?>
		<?
		$BXReady->showBannerPlace("TOP");
		?>
		<?
		// Headline and Small Basket Interface
		/*if ($BXReady->getArea('top_line_type')){
			include($BXReady->getAreaPath('top_line_type'));
		};*/
		include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/include/top_line_type/v1_new.php");
		// end Headline
		?>
		<?
		// Header Basket Interface
		/*
		if ($BXReady->getArea('header_type')){
			include($BXReady->getAreaPath('header_type'));
		};
		*/
		include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/include/header_type/version_6_new.php");
		// end Headline
		?>
		<?$APPLICATION->IncludeComponent("alexkova.market:buttonUp", ".default", array(
		"COMPONENT_TEMPLATE" => ".default",
			"LOCATION_HORIZONTALLY" => "left",
			"BUTTON_UP_HORIZONTALLY_INDENT" => "15",
			"BUTTON_UP_VERTICAL_INDENT" => "15",
			"BUTTON_UP_TOP_SHOW" => "300",
			"BUTTON_UP_SPEED" => "5000",
			"COMPOSITE_FRAME_MODE" => "A",
			"COMPOSITE_FRAME_TYPE" => "AUTO"
		),
		false,
		array(
		"ACTIVE_COMPONENT" => "N"
		)
	);?>
	   <?
		// TopMenu
			if (strlen($arTopMenu["TYPE"])) {
				switch ($arTopMenu["TYPE"]) {
					case "with_catalog": $BXReady->setAreaType('top_menu_type', 'v1'); break;
					case "only_catalog": $BXReady->setAreaType('top_menu_type', 'v2'); break;
				}
			}
		if ($BXReady->getArea('top_menu_type')){
					include($BXReady->getAreaPath('top_menu_type'));
		};
		// end TopMenu
		?>    
		<?if ($APPLICATION->GetCurPage(true) != SITE_DIR.'index.php' && $APPLICATION->GetCurPage(true) != SITE_DIR.'contacts/index.php' && $APPLICATION->GetCurPage(true) != SITE_DIR.'auth/index.php'):?>
		<div class="container">
			<div class="row">
				<div class="col-lg-12 hidden-xs">
					<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"breadcrumb", 
	array(
		"COMPONENT_TEMPLATE" => "breadcrumb",
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
				</div>
			</div>
		</div>
		<?endif;?>
		<?if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php' && $mainPageType != "two_col"):?>
			<?$APPLICATION->IncludeComponent(
		"bitrix:main.include", 
		"named_area", 
		array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."include/main_page_promo_slider.php",
			"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_PROMO_SLIDER"),
			"COMPONENT_TEMPLATE" => "named_area",
			"COMPOSITE_FRAME_MODE" => "A",
			"COMPOSITE_FRAME_TYPE" => "DYNAMIC_WITH_STUB"
		),
		false
	);?>
		<?endif;?>
		<div class="container <?if ($mainPageType == "two_col" || $APPLICATION->GetCurPage(true) != SITE_DIR.'index.php') echo "tb20"; ?>" id="content">
			<div class="row">
		<?if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php') :?>
			<?if ($mainPageType == "two_col"):?>
				<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/main_page_left_column.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_LEFT")
						),
						false
					);?>
				</div>
				<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 hidden-xs pull-right">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/main_page_promo_column.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_PROMO")
						),
						false
					);?>
			<?else:?>
				<div class="col-xs-12">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/main_page_promo.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_PROMO")
						),
						false
					);?>
			<?endif;?>
		<?endif;?>
	
	<?//размер основых блоков контента, другой для раздела статей
		$col1_lg = 3;
		$col1_md = 3;
		$col2_lg = 9;
		$col2_md = 9;
		$pull_right = "pull-right";
	if(preg_match("/blog/", $APPLICATION->GetCurDir())){//для раздела статей
		$col1_lg = 2;
		$col1_md = 2;
		$col2_lg = 8;
		$col2_md = 8;
		$pull_right = "";
	}?>
	
		<?if (($APPLICATION->GetCurPage(true) != SITE_DIR.'index.php'&& $APPLICATION->GetCurPage(true) != SITE_DIR.'contacts/index.php')
			&& ($APPLICATION->GetCurDir() != '/expiry/')
			&& ($APPLICATION->GetCurDir() != '/best/')
//			&& ($APPLICATION->GetCurDir() != '/new/')
//			&& ($APPLICATION->GetCurDir() != '/sale/')
			&& ($APPLICATION->GetCurDir() != '/maskomaniya/')
			&& ($APPLICATION->GetCurDir() != '/gifts/')
			&& ($APPLICATION->GetCurDir() != '/reviews/')
			&& ($APPLICATION->GetCurDir() != '/reviews/add/')
			):?>
			<?if ($templateType == "one_col" || substr($APPLICATION->GetCurDir(),0,(8+strlen(SITE_DIR))) == SITE_DIR.'catalog/' ){?>
					<div class="col-xs-12">
			<?}else if($APPLICATION->GetCurDir() == '/personal/basket/' || $APPLICATION->GetCurDir() == '/auth/'){?>
					<div class="col-md-1 col-lg-1 hidden-xs hidden-sm">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
			<?}else{?>
						<div class="col-lg-<?=$col1_lg?> col-md-<?=$col1_md?> hidden-sm hidden-xs">
							<?$APPLICATION->ShowViewContent("LeftFilter");?>
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "named_area", array(
		"AREA_FILE_SHOW" => "sect",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => SITE_DIR."include/page_left_column.php",
			"INCLUDE_PTITLE" => GetMessage("GHANGE_PAGE_LEFT")
		),
		false,
		array(
		"ACTIVE_COMPONENT" => "Y"
		)
	);?>
	
	<?if(preg_match("/blog/", $APPLICATION->GetCurDir()) && ($APPLICATION->GetCurDir() != "/blog/")){//для раздела статей(только для детальной страницы) подключаю левый блок?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include", 
			".default", 
			array(
				"AREA_FILE_SHOW" => "sect", //Показывать включаемую область для раздела
				"AREA_FILE_SUFFIX" => "left_inc", //Суффикс имени файла включаемой области
				"EDIT_TEMPLATE" => "",
				"PATH" => "",
				"AREA_FILE_RECURSIVE" => "Y" //Рекурсивное подключение включаемых областей разделов
			),
			false
		);?>
	<?}?>
	
						</div>
						<div <?if(preg_match("/blog/", $APPLICATION->GetCurDir())){?> itemscope itemtype="http://schema.org/Article" <?}?>class="col-lg-<?=$col2_lg?> col-md-<?=$col2_md?> col-sm-12 col-xs-12 <?=$pull_right?>">
							<?if(!preg_match("/personal/", $APPLICATION->GetCurDir())){?><h1 <?if(preg_match("/blog/", $APPLICATION->GetCurDir())){?> itemprop="name" style="font-family: 'Raleway';font-weight: 700; font-style: normal;font-size: 22px;margin: 0 0 30px 15px;"<?}?>><?$APPLICATION->ShowTitle(false);?></h1><?}?>
			<?}?>
		<?endif;?>