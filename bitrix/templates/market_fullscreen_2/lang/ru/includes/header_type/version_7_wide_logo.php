<div class="bxr-full-width bxr-container-headline head_v7_wide_logo <?=($BXReady->inverseHead) ? 'bxr-inverse':''?>">
    <div class="container">
        <div class="row headline">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 bxr-v-autosize">
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
            <div class="col-lg-3 col-md-3 hidden-sm hidden-xs bxr-v-autosize">
                <div class="slogan-wrap">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "named_area",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => SITE_DIR."include/slogan.php",
                            "INCLUDE_PTITLE" => GetMessage("GHANGE_SLOGAN")
                        ),
                        false
                    );?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 hidden-sm hidden-xs bxr-v-autosize">
                <?
                $APPLICATION->IncludeComponent(
                    "alexkova.market:search.title", 
                    ".default", 
                    array(
                            "COMPONENT_TEMPLATE" => ".default",
                            "NUM_CATEGORIES" => "1",
                            "TOP_COUNT" => "5",
                            "ORDER" => "date",
                            "USE_LANGUAGE_GUESS" => "Y",
                            "CHECK_DATES" => "N",
                            "SHOW_OTHERS" => "N",
                            "PAGE" => "#SITE_DIR#catalog/",
                            "SHOW_INPUT" => "Y",
                            "INPUT_ID" => "title-search-input",
                            "CONTAINER_ID" => "title-search",
                            "CATEGORY_0_TITLE" => "Товары",
                            "CATEGORY_0" => array(
                                    0 => "iblock_catalog",
                            ),
                            "PRICE_CODE" => array(
                                    0 => "BASE",
                            ),
                            "PRICE_VAT_INCLUDE" => "Y",
                            "PREVIEW_TRUNCATE_LEN" => "200",
                            "SHOW_PREVIEW" => "Y",
                            "CONVERT_CURRENCY" => "N",
                            "PREVIEW_WIDTH" => "75",
                            "PREVIEW_HEIGHT" => "75",
                            "CATEGORY_0_iblock_catalog" => array(
                                    0 => "#BXR_IBLOCK_CATALOG_ID#",
                            )
                    ),
                    false
                );
                ?>
            </div>
            <div class="hidden-lg hidden-md col-sm-6 col-xs-6 bxr-v-autosize" id="bxr-basket-mobile">

            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>            