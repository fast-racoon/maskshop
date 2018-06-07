<div class="bxr-full-width bxr-container-headline head_v6 <?=($BXReady->inverseHead) ? 'bxr-inverse':''?>">
    <div class="container">
        <div class="row headline">
	        
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 bxr-v-autosize">
                <?$APPLICATION->IncludeComponent(
	"bitrix:main.include", 
	"named_area", 
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_DIR."include/logo.php",
		"INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO"),
		"COMPONENT_TEMPLATE" => "named_area"
	),
	false
);?>
            </div>
<style>
.bxr-v-autosize img{
display: block;
    margin: 0 auto;
    max-height: 100px;
    height: auto;
    width: auto !important;
}
.bxr-v-autosize{
padding-bottom: 0px !important;
}
@media (min-width: 992px) {
	.bxr-v-autosize .logoImg{
		float: left;
	}
}
@media (min-width: 992px) and (max-width: 1200px){
	/*.bxr-v-autosize .logoImg{
		width: 100% !important;
		float: left;
	}*/
	.bxr-include-with-btn {
		font-size: 18px;
	}
}
</style>
            <div class="col-lg-3 col-md-3 hidden-sm  hidden-xs bxr-v-autosize text-center">
                <div class="slogan-wrap">
					<?/*$APPLICATION->IncludeComponent(
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
					);*/?>
                </div>
				<div class="hidden-xs"style="margin: 0 auto; margin-top: -5px; margin-left: -30px; /*display: inline-block;*/">
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
                            "FLOAT" => "LEFT",
                            "LINK_TEXT" => "Заказать обратный звонок"
                    ),
                    false
            );?></div>
            </div>
            <div class="col-lg-5 col-md-5 hidden-sm hidden-xs bxr-v-autosize">
                <div class="tb14">
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
                            "PREVIEW_WIDTH" => "100",
                            "PREVIEW_HEIGHT" => "100",
                            "CATEGORY_0_iblock_catalog" => array(
                                    0 => "11",
                            )
                    ),
                    false,
                    array(
                            "ACTIVE_COMPONENT" => "Y"
                    )
            );
                ?>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
		<div class="row">
			  <div class="hidden-lg hidden-md col-s-12 col-xs-12 bxr-v-autosize text-center" style="padding-bottom:0px;">  
                <div class="slogan-wrap">
                    <?$APPLICATION->IncludeComponent("bitrix:main.include", "named_area", array(
	"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_DIR."include/slogan.php",
		"INCLUDE_PTITLE" => GetMessage("GHANGE_SLOGAN")
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?>
                </div>
			  </div>
		</div>
    </div>
</div>            