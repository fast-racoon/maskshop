<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (isset($arParams["TEMPLATE_THEME"]) && !empty($arParams["TEMPLATE_THEME"]))
{
	$arAvailableThemes = array();
	$dir = trim(preg_replace("'[\\\\/]+'", "/", dirname(__FILE__)."/themes/"));
	if (is_dir($dir) && $directory = opendir($dir))
	{
		while (($file = readdir($directory)) !== false)
		{
			if ($file != "." && $file != ".." && is_dir($dir.$file))
				$arAvailableThemes[] = $file;
		}
		closedir($directory);
	}

	if ($arParams["TEMPLATE_THEME"] == "site")
	{
		$solution = COption::GetOptionString("main", "wizard_solution", "", SITE_ID);
		if ($solution == "eshop")
		{
			$theme = COption::GetOptionString("main", "wizard_eshop_adapt_theme_id", "blue", SITE_ID);
			$arParams["TEMPLATE_THEME"] = (in_array($theme, $arAvailableThemes)) ? $theme : "blue";
		}
	}
	else
	{
		$arParams["TEMPLATE_THEME"] = (in_array($arParams["TEMPLATE_THEME"], $arAvailableThemes)) ? $arParams["TEMPLATE_THEME"] : "blue";
	}
}
else
{
	$arParams["TEMPLATE_THEME"] = "blue";
}
$arParams["POPUP_POSITION"] = (isset($arParams["POPUP_POSITION"]) && in_array($arParams["POPUP_POSITION"], array("left", "right"))) ? $arParams["POPUP_POSITION"] : "left";

if($arParams['FILTER_SECTION_CODE']) {
	$sefPath = "/brands/{$arParams['FILTER_SECTION_CODE']}";
	$arResult['FILTER_URL'] = str_replace('/brands', $sefPath, $arResult["FILTER_URL"]);
	$arResult['SEF_SET_FILTER_URL'] =
	$arResult['JS_FILTER_PARAMS']['SEF_DEL_FILTER_URL'] =
		str_replace('/brands', $sefPath, $arResult["SEF_SET_FILTER_URL"]);
	$arResult['SEF_DEL_FILTER_URL'] =
	$arResult['JS_FILTER_PARAMS']['SEF_DEL_FILTER_URL'] =
		str_replace('/brands', $sefPath, $arResult["SEF_DEL_FILTER_URL"]);
}

if(!empty($arParams["PRICE_RANGE"])) {
	$arResult["ITEMS"][$arParams["PRICE_CODE"][0]]['VALUES']['MIN']['VALUE'] = $arParams["PRICE_RANGE"][0];
	$arResult["ITEMS"][$arParams["PRICE_CODE"][0]]['VALUES']['MAX']['VALUE'] = $arParams["PRICE_RANGE"][1];
}

$activeValues = array();
$propCodes = array();
foreach($arResult["ITEMS"] as $key=>$arItem)
{
	if(in_array($arItem["CODE"], $arParams['DISABLE_PROPERTY_CODE']))
		unset($arResult["ITEMS"][$key]);

	if(!is_array($arItem["VALUES"]) || isset($arItem["PRICE"]))
		continue;
	$propCodes[] = $arItem["CODE"]?:$arItem["ID"];
	foreach ($arItem["VALUES"] as $activeId => $value)
	{
		if ($value["CHECKED"])
		{
			$arResult["ITEMS"][$key]["CHECKED"] = 'Y';
			if(!$activeValues[$arItem["ID"]])
				$activeValues[$arItem["ID"]] = array(
					"ID" => $arItem["ID"],
					"CODE" => $arItem["CODE"],
					"NAME" => $arItem["NAME"],
					"IBLOCK_ID" => $arItem["IBLOCK_ID"]
				);
			$activeValues[$arItem["ID"]]["VALUES"][$activeId] = array(
				"ID" => $activeId,
				"VALUE" => $value["VALUE"],
			);
		}
	}
}
$cp = $this->__component;
if (is_object($cp))
{
	$cp->arResult["ACTIVE_VALUES"] = $activeValues;
	$cp->arResult["PROP_CODES"] = $propCodes;
	$cp->SetResultCacheKeys(array('ACTIVE_VALUES', 'PROP_CODES'));
}