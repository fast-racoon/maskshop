<?$_SESSION["BXR_BASKET_TEMPLATE"] = "fixed";?>
<div class="bxr-full-width bxr-top-headline">
	<div class="container">
		<div class="row  bxr-basket-row">
			<div class="col-sm-2 col-xs-2 hidden-lg hidden-md bxr-mobile-login-area">
				<div class="bxr-counter-mobile hidden-lg hidden-md bxr-mobile-login-icon">
					<i class="fa fa-phone"></i>
				</div>
			</div>
			<div class="col-sm-10 col-xs-10 hidden-lg hidden-md bxr-mobile-phone-area">
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
			<div class="col-sm-10 col-xs-10 col-lg-3 col-md-3  bxr-mobile-login-area">
				<div class="bxr-top-line-auth pull-left">
					<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_login_frame");
					$basketFrame->begin();?>
					<?$APPLICATION->IncludeComponent(
						"bitrix:system.auth.form",
						"popup",
						array(
							"REGISTER_URL" => SITE_DIR."auth/",
							"FORGOT_PASSWORD_URL" => SITE_DIR."auth/",
							"PROFILE_URL" => SITE_DIR."personal/profile/",
							"SHOW_ERRORS" => "Y",
							"COMPONENT_TEMPLATE" => "popup"
						),
						false
					);?>
					<?$basketFrame->beginStub();
					echo "...";
					$basketFrame->end();?>
				</div>
			</div>
			<div class="col-sm-2 col-xs-2 hidden-lg hidden-md bxr-mobile-phone-area">
				<div class="bxr-counter-mobile hidden-lg hidden-md bxr-mobile-phone-icon">
					<i class="fa fa-user"></i>
				</div>
			</div>



			<div class="col-lg-9 hidden-sm hidden-xs text-right">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"named_area",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => SITE_DIR."include/topline.php",
						"INCLUDE_PTITLE" => GetMessage("GHANGE_TOP_LINE_TEXT")
					),
					false
				);?>

				<?$basketFrame = new \Bitrix\Main\Page\FrameHelper("bxr_small_basket");
				$basketFrame->begin();?>
				<?$APPLICATION->IncludeComponent(
					"alexkova.market:basket.small",
					"fixed",
					array(
						"COMPONENT_TEMPLATE" => ".default",
						"PATH_TO_BASKET" => SITE_DIR."personal/basket/",
						"PATH_TO_ORDER" => SITE_DIR."personal/order/",
						"USE_COMPARE" => "Y",
						"IBLOCK_TYPE" => "catalog",
						"IBLOCK_ID" => "11",
						"USE_DELAY" => "Y"
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

