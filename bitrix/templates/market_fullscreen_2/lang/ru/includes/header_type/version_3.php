<div class="bxr-full-width bxr-container-headline head_v3 <?=($BXReady->inverseHead) ? 'bxr-inverse':''?>">
    <div class="container">
        <div class="row headline">
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 bxr-v-autosize">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "named_area",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/logo.php",
                        "INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO")
                    ),
                    false
                );?>
            </div>
            <div class="col-lg-7 col-md-7 hidden-sm hidden-xs content-left bxr-v-autosize">
               <?$APPLICATION->IncludeComponent(
                    "alexkova.market:menu", 
                    ".default", 
                    array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "ROOT_MENU_TYPE" => "service",
                            "MENU_CACHE_TYPE" => "A",
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "MENU_CACHE_GET_VARS" => array(
                            ),
                            "MAX_LEVEL" => "1",
                            "CHILD_MENU_TYPE" => "service",
                            "USE_EXT" => "N",
                            "DELAY" => "N",
                            "ALLOW_MULTI_SELECT" => "N"
                    ),
                    false
                );?>
            </div>
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs bxr-v-autosize">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    "include_with_btn", 
                    array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/phone.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_PHONE"),
                            "COMPONENT_TEMPLATE" => "include_with_btn",
                            "SHOW_BTN" => "Y",
                            "BTN_TYPE" => "BTN",
                            "BTN_CLASS" => "recall-btn open-answer-form",
                            "FLOAT" => "RIGHT",
                            "LINK_TEXT" => "Заказать обратный звонок"
                    ),
                    false
            );?>
            </div>
            <div class="hidden-lg hidden-md col-sm-6 col-xs-6 bxr-v-autosize" id="bxr-basket-mobile">

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>                        