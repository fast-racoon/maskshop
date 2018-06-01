<div class="bxr-full-width bxr-container-headline head_v6 <?=($BXReady->inverseHead) ? 'bxr-inverse':''?>">
    <div class="container">
        <div class="row headline">

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
.bxr-phone-number.pull-left {
    text-align: center !important;
    width: 100%;
    color: #000;
    font-weight: 400;
}
/*@media (min-width: 992px) {
	.bxr-v-autosize .logoImg{
		float: left;
	}
}*/
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 bxr-v-autosize headline-logo">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include", 
                    "named_area", 
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => SITE_DIR."include/logo_new.php",
                        "INCLUDE_PTITLE" => GetMessage("GHANGE_LOGO"),
                        "COMPONENT_TEMPLATE" => "named_area"
                    ),
                    false
                );?>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5 hidden-sm- hidden-xs bxr-v-autosize text-right search-block">
                <a href="https://shop.giftd.tech/maskshop.ru-2">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512; vertical-align: middle;" xml:space="preserve" width="35px" height="34px">
                        <g>
                            <path d="M235.328,347.328C232.192,350.432,228.096,352,224,352s-8.192-1.568-11.328-4.672c-6.24-6.24-6.24-16.384,0-22.624    L265.376,272H0v128c0,17.664,14.368,32,32,32h256V294.624L235.328,347.328z M176,368H80c-8.832,0-16-7.168-16-16    c0-8.832,7.168-16,16-16h96c8.832,0,16,7.168,16,16C192,360.832,184.832,368,176,368z" fill="#f44366"/>
                        </g>
                        <g>
                            <path d="M480,80H320v131.584c17.952-21.536,38.848-46.304,46.048-53.504c18.688-18.72,49.184-18.72,67.872,0    c18.72,18.72,18.72,49.152,0,67.872c-4.128,4.128-14.08,8.992-26.592,14.048H512V112C512,94.368,497.664,80,480,80z" fill="#f44366"/>
                            
                        </g>
                        <g>
                            <path d="M219.328,180.672C216.192,177.568,212.096,176,208,176s-8.192,1.568-11.328,4.672c-6.24,6.24-6.24,16.384,0,22.624    c5.344,4.192,31.264,13.344,61.76,22.784C241.728,206.08,224.832,186.208,219.328,180.672z" fill="#f44366"/>
                        </g>
                        <g>
                            <path d="M32,80C14.368,80,0,94.368,0,112v128h200.672c-12.512-5.056-22.464-9.92-26.624-14.048    c-18.72-18.72-18.72-49.152,0-67.872c18.72-18.72,49.152-18.72,67.872,0c7.232,7.2,28.128,31.936,46.08,53.504V80H32z" fill="#f44366"/>
                        </g>
                        <g>
                            <path d="M342.624,272l52.704,52.672c6.24,6.24,6.24,16.384,0,22.624C392.192,350.432,388.096,352,384,352    s-8.192-1.568-11.328-4.672L320,294.624V432h160c17.664,0,32-14.336,32-32V272H342.624z" fill="#f44366"/>
                        </g>
                        <g>
                            <path d="M411.328,180.672C408.192,177.568,404.096,176,400,176s-8.192,1.536-11.328,4.672c-5.504,5.504-22.4,25.408-39.104,45.376    c30.496-9.44,56.512-18.688,62.08-23.104C417.568,197.088,417.568,186.912,411.328,180.672z" fill="#f44366"/>
                        </g>
                    </svg>
                Подарочная карта</a>
                <div class="tb14">
                </div>
                <br>
                <?
                $APPLICATION->IncludeComponent(
                    "alexkova.market:search.title", 
                    "new", 
                    array(
                            "COMPONENT_TEMPLATE" => "new",
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
            <div class="col-lg-4 col-md-4 col-sm-4 hidden-sm- hidden-xs text-center action-block">
                <span class="aut-form-wrapper" >
                                    <?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_login_frame");
                                    $basketFrame->begin();?>
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:system.auth.form",
                                        "popup_new2",
                                        array(
                                            "REGISTER_URL" => SITE_DIR."auth/",
                                            "FORGOT_PASSWORD_URL" => SITE_DIR."auth/",
                                            "PROFILE_URL" => SITE_DIR."personal/main/",
                                            "SHOW_ERRORS" => "Y",
                                            "COMPONENT_TEMPLATE" => "popup_new2",
                                            "COMPOSITE_FRAME_MODE" => "N"
                                        ),
                                        false
                                    );?>
                                    <?$basketFrame->beginStub();
                                    echo "...";
                                    $basketFrame->end();?>
                </span>
                <span class="favor-wrapper text-center" >
                    <a href="/personal/main/favor/">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             viewBox="0 0 512 512" xml:space="preserve">

                            <path d="M326.632,10.346c-38.733,0-74.991,17.537-99.132,46.92c-24.141-29.384-60.398-46.92-99.132-46.92  C57.586,10.346,0,67.931,0,138.714c0,55.426,33.05,119.535,98.23,190.546c50.161,54.647,104.728,96.959,120.257,108.626l9.01,6.769  l9.01-6.768c15.529-11.667,70.098-53.978,120.26-108.625C421.949,258.251,455,194.141,455,138.714  C455,67.931,397.414,10.346,326.632,10.346z M334.666,308.974c-41.259,44.948-85.648,81.283-107.169,98.029  c-21.52-16.746-65.907-53.082-107.166-98.03C61.236,244.592,30,185.717,30,138.714c0-54.24,44.128-98.368,98.368-98.368  c35.694,0,68.652,19.454,86.013,50.771l13.119,23.666l13.119-23.666c17.36-31.316,50.318-50.771,86.013-50.771  c54.24,0,98.368,44.127,98.368,98.368C425,185.719,393.763,244.594,334.666,308.974z"/>

                        </svg>
                        <?//<img title="Избранные товары" src="/images/header/_favorite.svg" style="width: 25px; height: 25px; vertical-align: unset;">?>
                        <?/*<img src="/images/header/_favorite_m.png" style="vertical-align: unset;"><?/*<i class="fa fa-heart-o"></i>*/?>
                    </a>
                    <p class="title">Избранное</p>
                </span>
                <span class="basket-wrapper" >
                <?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_small_basket");
                $basketFrame->begin();?>
                <?$APPLICATION->IncludeComponent(
                    "wapxaz:basket.small",
                    "new",
                    array(
                        "COMPONENT_TEMPLATE" => "new",
                        "PATH_TO_BASKET" => SITE_DIR."personal/basket/",
                        "PATH_TO_ORDER" => SITE_DIR."personal/order/",
                        "USE_COMPARE" => "N",
                        "IBLOCK_TYPE" => "catalog",
                        "IBLOCK_ID" => "11",
                        "USE_DELAY" => "Y",
                        "MOBILE_BLOCK" => "bxr-basket-mobile",
                        "COMPOSITE_FRAME_MODE" => "A",
                        "COMPOSITE_FRAME_TYPE" => "DYNAMIC_WITH_STUB"
                    ),
                    false
                );?>
                <?$basketFrame->beginStub();
                echo "...";
                $basketFrame->end();?>
                </span>
            </div>
            <?/*<div class="col-lg-3 col-md-3 hidden-sm  hidden-xs bxr-v-autosize text-center">
                <div class="slogan-wrap">
				
                </div>
				<div class="hidden-xs"style="margin: 0 auto; margin-top: -5px; margin-left: -30px;">
					<div style="font-size: 12px; margin-left: -7px; color: #b1b1b1;">Бесплатная горячая линия</div>
					<div style="height: 60px;">
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
										"SHOW_BTN" => "N",
										"BTN_TYPE" => "BTN",
										"BTN_CLASS" => "recall-btn open-answer-form",
										"FLOAT" => "LEFT",
										"LINK_TEXT" => "Заказать обратный звонок"
								),
								false
						);?>
					</div>
					<div style="font-size: 12px; margin-left: -7px; color: #b1b1b1;"><?//понедельник-пятница 10:00-20:00?></div>
				</div>
            </div>*/?>

            

            

            <div class="clearfix"></div>
        </div>
    </div>
    <?/*div class="container">
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
    </div*/?>
</div>            