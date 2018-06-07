<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<!--<ul class="bxr-detail-tabs hidden-xxs">-->
<ul class="bxr-detail-tabs">
    <?if (count($arResult["OFFERS"]) > 0 && $arParams["HIDE_OFFERS_LIST"] != "Y") {?>
        <li data-tab="offers" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=GetMessage("OFFERS_TEXT")?>
        </li>
    <?}?>
    <?if ($arResult["DETAIL_TEXT"]) {?>
        <li class="active" data-tab="detail" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=GetMessage("DETAIL_TEXT")?>
        </li>
    <?}?>
    <?if (!empty($arResult["PROPERTIES"]["PROP_sposob"]["VALUE"]["TEXT"])) {?>
        <li data-tab="props" id="tab_props" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=GetMessage("PROPS_TEXT")?>
        </li>
    <?}?>
    <?if (!empty($arResult["PROPERTIES"]["PROP_sostav"]["VALUE"]["TEXT"])) {?>
        <li data-tab="sostav" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=GetMessage("PROPS_SOSTAV")?>
        </li>
    <?}?>	
    <?if ($show_files) {?>
        <li data-tab="element-files" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=$arResult["PROPERTIES"]["FILES"]["NAME"]?>
        </li>
    <?}?>
    <?if ($show_video) {?>
        <li data-tab="element-video" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=$arResult["PROPERTIES"]["VIDEO"]["NAME"]?>
        </li>
    <?}?>
    <?if ($useReview) {?>
        <li data-tab="review" id="tab_review" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=GetMessage("REVIEWS_TEXT")?>
        </li>
    <?}?>
    <?if ($storeAmount) {?>
        <li data-tab="storeamount" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=GetMessage("STORE_AMOUNT_TEXT")?>
        </li>
    <?}?>
    <?if ($arParams["ADDITIONAL_TAB_SHOW"] == 'Y'):?>
        <li class="bxr-font-hover-light" data-tab="additional-tab" onclick="$('html, body').animate({scrollTop: $('#tabs').offset().top - 50 }, 800);">
            <?=($arParams["ADDITIONAL_TAB_NAME"]?$arParams["ADDITIONAL_TAB_NAME"]:GetMessage("ADDITIONAL_TAB_NAME_DEFAULT"))?>
        </li>	
    <?endif;?>
    <div class="clearfix"></div>
</ul>