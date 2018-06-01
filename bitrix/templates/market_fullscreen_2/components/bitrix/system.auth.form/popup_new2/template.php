<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

CJSCore::Init(array("popup"));
?>
<div class="bx_login_block text-center" style="margin-top: 3px;">
	<span id="login-line">
	<?
	$frame = $this->createFrame("login-line", false)->begin();
		if ($arResult["FORM_TYPE"] == "login")
		{
		?>
			<a class="bx_login_top_inline_link" href="javascript:void(0)<?//=$arResult["AUTH_URL"]?>" onclick="openAuthorizePopup()">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 563.43 563.43" xml:space="preserve" width="512px" height="512px">
				<path d="M256,288.389c-153.837,0-238.56,72.776-238.56,204.925c0,10.321,8.365,18.686,18.686,18.686h439.747    c10.321,0,18.686-8.365,18.686-18.686C494.56,361.172,409.837,288.389,256,288.389z M55.492,474.628    c7.35-98.806,74.713-148.866,200.508-148.866s193.159,50.06,200.515,148.866H55.492z" />
				<path d="M256,0c-70.665,0-123.951,54.358-123.951,126.437c0,74.19,55.604,134.54,123.951,134.54s123.951-60.35,123.951-134.534    C379.951,54.358,326.665,0,256,0z M256,223.611c-47.743,0-86.579-43.589-86.579-97.168c0-51.611,36.413-89.071,86.579-89.071    c49.363,0,86.579,38.288,86.579,89.071C342.579,180.022,303.743,223.611,256,223.611z" />
				</svg>

				<?/*<img src="/images/header/_personal_m.png" style="vertical-align: unset;">
				<?/*<img src="<?=SITE_TEMPLATE_PATH?>/components/bitrix/system.auth.form/popup_new2/images/gui.png" style="vertical-align: unset;">*/?>
			</a>
			<p class="text-center">Кабинет</p>
			<?
		}
		else
		{?>
			<a class="bx_login_top_inline_link" href="<?=$arResult['PROFILE_URL']?>">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 563.43 563.43"  xml:space="preserve" width="512px" height="512px">
					<path d="M256,288.389c-153.837,0-238.56,72.776-238.56,204.925c0,10.321,8.365,18.686,18.686,18.686h439.747    c10.321,0,18.686-8.365,18.686-18.686C494.56,361.172,409.837,288.389,256,288.389z M55.492,474.628    c7.35-98.806,74.713-148.866,200.508-148.866s193.159,50.06,200.515,148.866H55.492z" />
				<path d="M256,0c-70.665,0-123.951,54.358-123.951,126.437c0,74.19,55.604,134.54,123.951,134.54s123.951-60.35,123.951-134.534    C379.951,54.358,326.665,0,256,0z M256,223.611c-47.743,0-86.579-43.589-86.579-97.168c0-51.611,36.413-89.071,86.579-89.071    c49.363,0,86.579,38.288,86.579,89.071C342.579,180.022,303.743,223.611,256,223.611z" />
				</svg>
				<p><?=($USER->GetFullName())?$USER->GetFullName():"Кабинет";?></p>
				<?/*<img src="/images/header/_personal_m.png" style="vertical-align: unset;">
				<img src="/images/header/_personal.svg" style="width: 16px; height: 16px; vertical-align: unset;">
				<?/*<img src="<?=SITE_TEMPLATE_PATH?>/components/bitrix/system.auth.form/popup_new2/images/gui.png" style="vertical-align: unset;">*/?>
			</a>
		<?
		}
	$frame->beginStub();
		?>
		<a class="bx_login_top_inline_link" href="javascript:void(0)<?//=$arResult["AUTH_URL"]?>" onclick="openAuthorizePopup()"><?=GetMessage("AUTH_LOGIN")?></a>
		<?
	$frame->end();
	?>
	</span>
</div>

<?if ($arResult["FORM_TYPE"] == "login"):?>
	<div id="bx_auth_popup_form" style="display:none;" class="bx_login_popup_form">
	<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "popup_auth_new",
		array(
			"REGISTER_URL" => SITE_DIR."auth/",
			"BACKURL" => $arResult["BACKURL"],
			"AUTH_FORGOT_PASSWORD_URL" => $arResult["AUTH_FORGOT_PASSWORD_URL"],
		),
		false
	);
	?>
	</div>

	<div id="bx_auth_popup_form_forgot_password" style="display:none;" class="bx_login_popup_form">
	<?$APPLICATION->IncludeComponent(
		"bitrix:system.auth.forgotpasswd",
		"forgotpasswd_new",
		Array()
	);?>
	</div>


	<script>
		function openAuthorizePopup()
		{
			<?
			$sizes = "width:480px;height:500px";
			$allowSocAuth = COption::GetOptionString("main","allow_socserv_authorization","Y");
			if($allowSocAuth == "Y" && $arResult["AUTH_SERVICES"])
				$sizes =  "width:480px;height:500px";
			?>
			var authPopup = BX.PopupWindowManager.create("AuthorizePopup", null, {
				autoHide: true,
				//	zIndex: 0,
				offsetLeft: 0,
				offsetTop: 0,
				overlay : true,
				draggable: {restrict:true},
				closeByEsc: true,
				closeIcon: { right : "12px", top : "10px"},
				titleBar: '',//{content: BX.create("span", {html: "<div style='display:none;'><?=GetMessage("AUTH_TITLE");?></div>"})},
				content: '<div style="<?=$sizes?>; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="<?=$this->GetFolder()?>/images/wait.gif"/></span></div>',
				events: {
					onAfterPopupShow: function()
					{
						this.setContent(BX("bx_auth_popup_form"));
					}
				}
			});

			authPopup.show();
		}

		function openForgotpasswd()
		{
			<?
			$sizes = "width:480px;height:500px";
			$allowSocAuth = COption::GetOptionString("main","allow_socserv_authorization","Y");
			if($allowSocAuth == "Y" && $arResult["AUTH_SERVICES"])
				$sizes =  "width:480px;height:500px";
			?>
			var forgotpasswdPopup = BX.PopupWindowManager.create("Forgotpasswd", null, {
				autoHide: true,
				//	zIndex: 0,
				offsetLeft: 0,
				offsetTop: 0,
				overlay : true,
				draggable: {restrict:true},
				closeByEsc: true,
				closeIcon: { right : "12px", top : "10px"},
				titleBar: '',//{content: BX.create("span", {html: "<div style='display:none;'><?=GetMessage("AUTH_TITLE");?></div>"})},
				content: '<div style="<?=$sizes?>; text-align: center;"><span style="position:absolute;left:50%; top:50%"><img src="<?=$this->GetFolder()?>/images/wait.gif"/></span></div>',
				events: {
					onAfterPopupShow: function()
					{
						this.setContent(BX("bx_auth_popup_form_forgot_password"));
					}
				}
			});

			forgotpasswdPopup.show();
		}
	</script>
<?endif?>