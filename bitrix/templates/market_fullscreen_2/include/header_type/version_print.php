<div class="bxr-full-width bxr-container-headline head_v1 <?=($BXReady->inverseHead) ? 'bxr-inverse':''?>">
    <div class="container">
        <div class="row headline">
            <div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 bxr-v-autosize" style="float:left">
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
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs bxr-v-autosize" style="float:right;margin-top: 15px;">
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
            <div class="clearfix" style="clear: both;"></div>
        </div>
    </div>
</div>