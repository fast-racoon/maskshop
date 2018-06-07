<div class="bxr-detail-tab bxr-detail-review" data-tab="review">
<h3 class="bxr-detail-tab-mobile-title  hidden-lg hidden-md hidden-sm hidden-xs"><?=GetMessage("REVIEWS_TEXT")?></h3>
    <?$APPLICATION->IncludeComponent("bitrix:catalog.comments",
            "", 
            Array(
                    "ELEMENT_ID" => $arResult["ID"],	
                    "ELEMENT_CODE" => "",	
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "URL_TO_COMMENT" => "",
                    "WIDTH" => "",	
                    "COMMENTS_COUNT" => "10",	
                    "BLOG_USE" => $arParams["BLOG_USE"],	
                    "FB_USE" => $arParams["FB_USE"],	
                    "FB_APP_ID" => $arParams["FB_APP_ID"],
                    "VK_USE" => $arParams["VK_USE"],	
                    "VK_API_ID" => $arParams["VK_API_ID"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],	
                    "CACHE_TIME" => $arParams["CACHE_TIME"],	
                    "BLOG_TITLE" => "",
                    "BLOG_URL" => "catalog_comments"."_".SITE_ID,
                    "PATH_TO_SMILE" => "",
                    "EMAIL_NOTIFY" => $arParams["BLOG_EMAIL_NOTIFY"],
                    "AJAX_POST" => "Y",
                    "SHOW_SPAM" => "Y",
                    "SHOW_RATING" => "N",
                    "FB_TITLE" => "",
                    "FB_USER_ADMIN_ID" => "",
                    "FB_COLORSCHEME" => "light",
                    "FB_ORDER_BY" => "reverse_time",
                    "VK_TITLE" => "",
                    "TEMPLATE_THEME" => $arParams["~TEMPLATE_THEME"],	
            ),
            false,
            array("HIDE_ICONS" => "Y")
    );?>
</div>
        