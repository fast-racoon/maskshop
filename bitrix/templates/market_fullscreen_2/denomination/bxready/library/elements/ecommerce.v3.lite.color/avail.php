<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!function_exists('printAvailHtmlV3LiteColor'))
{
    function printAvailHtmlV3LiteColor($qty, $measure, $params, $showCatalogQtyCnt) {
        if ($qty > 0) {
            $html = '<div class="bxr-instock-wrap 555">';
            if ($params["QTY_SHOW_TYPE"] == "NUM" || $params["QTY_SHOW_TYPE"] == "") {
                    $qtyText = $qty;
            } elseif ($qty > $params["QTY_MANY_GOODS_INT"]) {
                $qtyText = $params["QTY_MANY_GOODS_TEXT"];
            } else {
                $qtyText = $params["QTY_LESS_GOODS_TEXT"];
            };
            $html .= "<i class='fa fa-check'> ".$qtyText."</i>";
            $html .= '</div>';
        }
        
        return $html;
    }
}

$params = array(
    "IN_STOCK" => $arElementParams["IN_STOCK"],
    "NOT_IN_STOCK" => $arElementParams["NOT_IN_STOCK"],
    "QTY_SHOW_TYPE" => $arElementParams["QTY_SHOW_TYPE"],
    "QTY_MANY_GOODS_INT" => $arElementParams["QTY_MANY_GOODS_INT"],
    "QTY_MANY_GOODS_TEXT" => $arElementParams["QTY_MANY_GOODS_TEXT"],
    "QTY_LESS_GOODS_TEXT" => $arElementParams["QTY_LESS_GOODS_TEXT"]
);

echo printAvailHtmlV3LiteColor($arElement["CATALOG_QUANTITY"], $arElement["CATALOG_MEASURE_NAME"], $params, $showCatalogQtyCnt);?>
