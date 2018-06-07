<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if(isset($_REQUEST["print"]) && $_REQUEST["print"]=="y" && (!isset($arParams["PRINT_ORDER"]) || $arParams["PRINT_ORDER"] == "Y" )) {
    $APPLICATION->RestartBuffer();
    $filename = $_SERVER["DOCUMENT_ROOT"]."".SITE_TEMPLATE_PATH."/include/header_type/version_print.php";
    if (file_exists($filename)) {
        include($filename);
    }
}
foreach ($arResult["GRID"]["ROWS"] as $k => $arItem):
    $parent = CCatalogProduct::GetByIDEx($arItem["PRODUCT_ID"]);
    $parentId = $parent["PROPERTIES"]["CML2_LINK"]["VALUE"];
    if ($parentId) {
        $arParent = CCatalogProduct::GetByIDEx($parentId);
        $arResult["GRID"]["ROWS"][$k]["PARENT"]["DETAIL_PAGE_URL"] = $arParent["DETAIL_PAGE_URL"];
    }
endforeach;