<?$_SESSION["BXR_BASKET_TEMPLATE"] = ".default";?>
<div class="bxr-full-width bxr-top-headline hidden-xs hidden-sm">
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
			<div class="col-sm-10 col-xs-10 col-lg-4 col-md-4  bxr-mobile-login-area">
				<div class="bxr-top-line-auth pull-left">
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

<span style="display: inline-block; margin: 0 0 0 10px; vertical-align: super;">
				<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_geo_frame");
				$basketFrame->begin();?>
					<?$APPLICATION->IncludeComponent(
	"bxmaker:geoip.city", 
	"city_top", 
	array(
		"COMPONENT_TEMPLATE" => "city_top",
		"RELOAD_PAGE" => "N",
		"CITY_SHOW" => "Y",
		"CITY_LABEL" => "Ваш город:",
		"QUESTION_SHOW" => "Y",
		"QUESTION_TEXT" => "Ваш город<br/>#CITY#?",
		"INFO_SHOW" => "N",
		"INFO_TEXT" => "",
		"BTN_EDIT" => "Изменить город",
		"POPUP_LABEL" => "МЫ ДОСТАВЛЯЕМ ПО ВСЕЙ РОССИИ",
		"SEARCH_SHOW" => "Y",
		"INPUT_LABEL" => "Начните вводить название города...",
		"MSG_EMPTY_RESULT" => "Ничего не найдено",
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
				</div>
			</div>
			<div class="hidden-xs hidden-sm hidden-lg hidden-md bxr-mobile-phone-area">
				<div class="bxr-counter-mobile hidden-lg hidden-md bxr-mobile-phone-icon">
					<i class="fa fa-user"></i>
				</div>
			</div>


			<div class="col-lg-8 col-md-8 hidden-sm hidden-xs">
				<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_small_basket");
				$basketFrame->begin();?>
				<?$APPLICATION->IncludeComponent(
	"wapxaz:basket.small", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
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

			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>