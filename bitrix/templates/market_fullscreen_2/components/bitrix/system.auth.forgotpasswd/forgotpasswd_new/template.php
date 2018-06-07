<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?><?

ShowMessage($arParams["~AUTH_RESULT"]);

?>

<div class="new_auth">
	<form name="bform" method="post" target="_top" action="<?=$arResult["AUTH_URL"]?>">
	<?
	if (strlen($arResult["BACKURL"]) > 0)
	{
	?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<?
	}
	?>
		<input type="hidden" name="AUTH_FORM" value="Y">
		<input type="hidden" name="TYPE" value="SEND_PWD">
		<p class="forgot_pswd_txt"><?=GetMessage("AUTH_FORGOT_PASSWORD_1")?></p>
		<div class="forgot_pswd_img">
			<img src="/images/padlock.png" style="max-width: 55px;">
		</div>
		<p class="forgot_pswd_txt"><?=GetMessage("AUTH_FORGOT_PASSWORD_2")?></p>

		<input type="hidden" name="USER_LOGIN" maxlength="50" value="<?=$arResult["LAST_LOGIN"]?>" />
		<input type="text" name="USER_EMAIL" placeholder="<?=GetMessage("AUTH_EMAIL_PLACEHOLDER")?>" maxlength="255" class="forgot_pswd_email" />

		<input type="submit" name="send_account_info" class="forgot_pswd_submit" value="<?=GetMessage("AUTH_SEND")?>" />

	</form>
</div>
<div class="new_auth_bottom">
	<span>Есть аккаунт?</span>
	<?/*<a href="<?=$arParams["REGISTER_URL"]?>">Зарегистрируйтесь</a>*/?>
	<a href="javascript:void(0)" onclick="openAuthorizePopup()">Войдите</a>
</div>

<div id="bx_auth_popup_form_forgot_password_yes" style="display:none;" class="bx_login_popup_form">
	<div class="new_auth" style="border-bottom: 2px solid #000; height: 410px;">
		<form name="bform" method="post" target="_top" action="">
			<p class="forgot_pswd_txt">Письмо отправлено!</p>
			<div class="forgot_pswd_img">
				<img src="/images/mail.png" style="max-width: 240px; padding-bottom: 15px;">
			</div>
			<p class="forgot_pswd_txt forgot_pswd_txt_yes">Проверьте ваш почтовый ящик и следуйте инструкциям.</p>
		</form>
	</div>
</div>

<?if($_GET["forgot_password"] == "yes")
{?>
	<script>
		window.onload=function(){
			<?
			$sizes = "width:480px;height:500px";
			$allowSocAuth = COption::GetOptionString("main","allow_socserv_authorization","Y");
			if($allowSocAuth == "Y" && $arResult["AUTH_SERVICES"])
				$sizes =  "width:480px;height:500px";
			?>
			var authForgonPswdYes = BX.PopupWindowManager.create("ForgotPswdYesPopup", null, {
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
						this.setContent(BX("bx_auth_popup_form_forgot_password_yes"));
					}
				}
			});

			authForgonPswdYes.show();
		}
	</script>
<?}?>

<script type="text/javascript">
document.bform.USER_LOGIN.focus();
</script>
