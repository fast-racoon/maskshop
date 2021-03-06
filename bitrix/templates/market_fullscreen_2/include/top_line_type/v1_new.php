<?$_SESSION["BXR_BASKET_TEMPLATE"] = ".default";?>
<div class="bxr-full-width bxr-top-headline hidden-xs hidden-sm" style="padding-top: 5px; height: 44px;">
    <div class="container">
        <div class="row  bxr-basket-row" style="padding-left: 10px;">
            <div class="col-sm-2 col-xs-2 hidden-lg hidden-md bxr-mobile-login-area">
                <div class="bxr-counter-mobile hidden-lg hidden-md bxr-mobile-login-icon ">
                    <i class="fa fa-phone"></i>
                </div>
            </div>
            <div class="col-sm-12 col-xs-12 hidden-lg hidden-md  hidden-xs hidden-sm text-center bxr-mobile-phone-area phone-ico">
                <div class="bxr-top-line-phones">
					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/mobile_phone.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_MOBILE_PHONE")
						),
						false
					);?>
                </div>
            </div>
            <div class="col-sm-10 col-xs-10 col-lg-7 col-md-7  bxr-mobile-login-area">
                <div class="bxr-top-line-auth pull-left">
					<?/*
<span style="display: inline-block;">
					<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_login_frame");
					$basketFrame->begin();?>
					<?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form", 
	"popup_new", 
	array(
		"REGISTER_URL" => SITE_DIR."auth/",
		"FORGOT_PASSWORD_URL" => SITE_DIR."auth/",
		"PROFILE_URL" => SITE_DIR."personal/main/",
		"SHOW_ERRORS" => "Y",
		"COMPONENT_TEMPLATE" => "popup_new",
		"COMPOSITE_FRAME_MODE" => "N"
	),
	false
);?>
					<?$basketFrame->beginStub();
					echo "...";
					$basketFrame->end();?>
</span>
*/?>

                    <span style="display: inline-block; margin: 0 0 0 10px; vertical-align: super;">
				<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_geo_frame");
				$basketFrame->begin();?>
				<?$APPLICATION->IncludeComponent(
					"bxmaker:geoip.city",
					"city_top_new",
					array(
						"COMPONENT_TEMPLATE" => "city_top_new",
						"RELOAD_PAGE" => "N",
						"CITY_SHOW" => "Y",
						"CITY_LABEL" => "��� �����:",
						"QUESTION_SHOW" => "Y",
						"QUESTION_TEXT" => "��� �����<br/>#CITY#?",
						"INFO_SHOW" => "N",
						"INFO_TEXT" => "",
						"BTN_EDIT" => "�������� �����",
						"POPUP_LABEL" => "�� ���������� �� ���� ������",
						"SEARCH_SHOW" => "Y",
						"INPUT_LABEL" => "������� ������� �������� ������...",
						"MSG_EMPTY_RESULT" => "������ �� �������",
						"FAVORITE_SHOW" => "Y",
						"CITY_COUNT" => "30",
						"FID" => "1",
						"CACHE_TYPE" => "A",
						"CACHE_TIME" => "3600",
						"COMPOSITE_FRAME_MODE" => "A",
						"COMPOSITE_FRAME_TYPE" => "AUTO"
					),
					false
				);?>
				<?$basketFrame->beginStub();
				echo "...";
				$basketFrame->end();?>
</span>
                    <span style="display: inline-block; margin-left: 25px;">
				<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_menu_for_top_frame");
				$basketFrame->begin();?>
				<?$APPLICATION->IncludeComponent(
					"alexkova.market:menu",
					".default",
					array(
						"COMPONENT_TEMPLATE" => ".default",
						"ROOT_MENU_TYPE" => "service_new",
						"MENU_CACHE_TYPE" => "A",
						"MENU_CACHE_TIME" => "3600",
						"MENU_CACHE_USE_GROUPS" => "Y",
						"MENU_CACHE_GET_VARS" => array(
						),
						"MAX_LEVEL" => "1",
						"CHILD_MENU_TYPE" => "service_new",
						"USE_EXT" => "N",
						"DELAY" => "N",
						"ALLOW_MULTI_SELECT" => "N"
					),
					false
				);?>
				<?$basketFrame->beginStub();
				echo "...";
				$basketFrame->end();?>
</span>
                </div>
            </div>
            <div class="hidden-xs hidden-sm hidden-lg hidden-md bxr-mobile-phone-area">
                <div class="bxr-counter-mobile hidden-lg hidden-md bxr-mobile-phone-icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>


            <?/*<div class="col-lg-5 col-md-5 hidden-sm hidden-xs" style="text-align: right;">
				<span style="display: inline-block; vertical-align: top; padding-top: 3px; padding-right: 15px;">
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
                <span>
					<a href="/personal/main/favor/" style="color: #576e75; position: absolute; padding-top: 7px;">
						<img title="��������� ������" src="/images/header/_favorite.svg" style="width: 16px; height: 16px; vertical-align: unset;">
						
					</a>
				</span>
                <span style="display: inline-block; padding-left: 15px;">
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
            </div>*/?>
            <div class="col-lg-5 col-md-5 hidden-sm  hidden-xs bxr-v-autosize- text-center">
            	
				<div class="top-phones">
					<div style="height: 30px;overflow: hidden;">
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
										"LINK_TEXT" => "�������� �������� ������"
								),
								false
						);?>
					</div>
				</div>
				<div class="work-time"><i class="fa fa-clock-o" aria-hidden="true"></i> ���� 10:00 - 20:00</div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>