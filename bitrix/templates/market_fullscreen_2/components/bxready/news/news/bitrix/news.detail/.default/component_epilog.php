<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $ELEMENT_DATA;
$ELEMENT_DATA = array(
	"ID" => $arResult["ID"]
);
if (isset($arResult["PROPERTIES"][$arParams["LINK_PROPERTY_CODE"]])
&& count($arResult["PROPERTIES"][$arParams["LINK_PROPERTY_CODE"]]["VALUE"])>0)
$ELEMENT_DATA["OTHER_ELEMENTS"] = $arResult["PROPERTIES"][$arParams["LINK_PROPERTY_CODE"]]["VALUE"];

$APPLICATION->AddHeadString('<meta property="og:title" content="'.$arResult["NAME"].'" />');
$APPLICATION->AddHeadString('<meta property="og:description" content="'.$arResult["PREVIEW_TEXT"].'" />');
$APPLICATION->AddHeadString('<meta property="og:image" content="'.$arResult["DETAIL_PICTURE"]["SRC"].'" />');
$APPLICATION->AddHeadString('<meta property="og:url" content="'.$APPLICATION->GetCurPage().'" />');
?>