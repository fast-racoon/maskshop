<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
if (!isset($_REQUEST['ajaxbuy']) || $_REQUEST['ajaxbuy'] != "yes"){die();}

$template = ".default";//"new";//
if (isset($_SESSION["BXR_BASKET_TEMPLATE"]) && strlen($_SESSION["BXR_BASKET_TEMPLATE"])>0)
	$template= $_SESSION["BXR_BASKET_TEMPLATE"];


$APPLICATION->IncludeComponent(
	"wapxaz:basket.small",
	$template,
	Array(
		"PATH_TO_BASKET" => SITE_DIR."personal/basket/",
		"PATH_TO_ORDER" => SITE_DIR."personal/order/"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>