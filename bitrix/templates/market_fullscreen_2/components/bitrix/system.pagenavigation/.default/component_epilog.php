<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*if ($GLOBALS["USER"]->GetId() == 2) {
print_r($arResult);
}*/

/*if($APPLICATION->GetCurPage(false) != '/' && ($arResult["NavNum"] > 0 || $arResult["NavPageNomer"] > 0)) {
	if ($arResult["bShowAll"] == 1) {
		//$APPLICATION->AddHeadString('<meta name="robots" content="noindex, nofollow" />');
		$APPLICATION->AddHeadString('<link rel="canonical" href="http://'.SITE_SERVER_NAME.$APPLICATION->GetCurPageParam("SHOWALL_".$arResult["NavNum"]."=1", array("PAGEN_".$arResult["NavNum"], "SHOWALL_".$arResult["NavNum"])).'" />');
	} else {
		$APPLICATION->AddHeadString('<link rel="canonical" href="http://'.SITE_SERVER_NAME.$APPLICATION->GetCurPage(false).'" />');
	}
	if ($arResult["NavPageNomer"] > 1 && $arResult["NavPageNomer"] < $arResult["NavPageCount"]) {
		$APPLICATION->AddHeadString('<link rel="next" href="http://'.SITE_SERVER_NAME.$APPLICATION->GetCurPageParam("PAGEN_".$arResult["NavNum"]."=".($arResult["NavPageNomer"]+1), array("PAGEN_".$arResult["NavNum"])).'" />');
		$APPLICATION->AddHeadString('<link rel="prev" href="http://'.SITE_SERVER_NAME.$APPLICATION->GetCurPageParam("PAGEN_".$arResult["NavNum"]."=".($arResult["NavPageNomer"]-1), array("PAGEN_".$arResult["NavNum"])).'" />');
	} elseif($arResult["NavPageNomer"] > 1 && $arResult["NavPageNomer"] >= $arResult["NavPageCount"]) {
		$APPLICATION->AddHeadString('<link rel="prev" href="http://'.SITE_SERVER_NAME.$APPLICATION->GetCurPageParam("PAGEN_".$arResult["NavNum"]."=".($arResult["NavPageNomer"]-1), array("PAGEN_".$arResult["NavNum"])).'" />');
	} elseif($arResult["NavPageNomer"] == 1 && $arResult["NavPageCount"] > 1) {
		$APPLICATION->AddHeadString('<link rel="next" href="http://'.SITE_SERVER_NAME.$APPLICATION->GetCurPageParam("PAGEN_".$arResult["NavNum"]."=".($arResult["NavPageNomer"]+1), array("PAGEN_".$arResult["NavNum"])).'" />');
	}
*/
/*
	$APPLICATION->AddHeadString('<link rel="canonical" href="http://'.SITE_SERVER_NAME.$APPLICATION->GetCurPage(false).'" />');
*/
/*
}*/