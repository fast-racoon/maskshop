<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$frame = $this->createFrame()->begin();
?>

<div class="new_auth">
    <div style="text-align: center;">Быстрый вход через социальные сети</div>
    <div style="display:none;"><?print_r($arResult["AUTH_SERVICES"]);?></div>
    <div class="">
		<?
		$allowSocAuth = COption::GetOptionString("main","allow_socserv_authorization","Y");
		?>
		<?if($allowSocAuth == "Y" && $arResult["AUTH_SERVICES"]):
			$APPLICATION->IncludeComponent("bitrix:socserv.auth.form", "new2",
				array(
					"AUTH_SERVICES"=>$arResult["AUTH_SERVICES"],
					"CURRENT_SERVICE"=>$arResult["CURRENT_SERVICE"],
					"AUTH_URL"=> ($arParams["BACKURL"] ? $arParams["BACKURL"] : $arResult["BACKURL"]),
					"POST"=>$arResult["POST"],
					"SUFFIX" => RandString(8),
				),
				$component,
				array("HIDE_ICONS"=>"Y")
			);
		endif;?>
    </div>
    <div style="text-align: center;">Войти через адрес электронной почты</div>
    <form id="auth_form-popup" class="new_auth_form" name="system_auth_form<?=$arResult["RND"]?>" method="post" target="_top" action="<?=SITE_DIR.'auth/'?>">
        <div class="form-error">
            <?if (!$USER->IsAuthorized() && $_REQUEST['AUTH_FORM']):?>Неверный пароль или электронная почта.<?endif;?>
        </div>
        <input type="hidden" name="AUTH_FORM" value="Y" />
        <input type="hidden" name="TYPE" value="AUTH" />
		<?if (strlen($arParams["BACKURL"]) > 0 || strlen($arResult["BACKURL"]) > 0):?>
            <input type="hidden" name="backurl" value="<?=($arParams["BACKURL"] ? $arParams["BACKURL"] : $arResult["BACKURL"])?>" />
		<?endif?>
		<?foreach ($arResult["POST"] as $key => $value):?>
            <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
		<?endforeach?>

        <input placeholder="<?=GetMessage('AUTH_LOGIN_FIELD');?>" type="text" name="USER_LOGIN" maxlength="255" value="<?=$arResult["LAST_LOGIN"]?>" />
        <input placeholder="<?=GetMessage("AUTH_PASSWORD");?>" type="password" name="USER_PASSWORD" maxlength="255" />

        <input type="submit" name="Login" value="<?=GetMessage("AUTH_AUTHORIZE")?>">

        <input type="checkbox" id="USER_REMEMBER2" name="USER_REMEMBER" value="Y" checked/>
        <label for="USER_REMEMBER2" class="new_auth_memory">Запомнить меня</label>
        <a href="javascript:void(0)" onclick="openForgotpasswd()" class="new_auth_pswd">Забыли пароль?</a>
    </form>
</div>
<div class="new_auth_bottom">
    <span>Нет аккаунта?</span>
	<?/*<a href="<?=$arParams["REGISTER_URL"]?>">Зарегистрируйтесь</a>*/?>
    <a href="javascript:void(0)" onclick="openRegisterPopup()">Зарегистрируйтесь</a>
</div>

<script type="text/javascript">
	<?if (strlen($arResult["LAST_LOGIN"])>0):?>
    try{document.form_auth.USER_PASSWORD.focus();}catch(e){}
	<?else:?>
    try{document.form_auth.USER_LOGIN.focus();}catch(e){}
	<?endif?>
</script>






<?/*форма регистрации*/?>
<div id="register_popup_form" style="display:none;" class="register_popup_form">
	<?$APPLICATION->IncludeComponent("bitrix:main.register","",Array(
			"USER_PROPERTY_NAME" => "",
			"SEF_MODE" => "Y",
			"SHOW_FIELDS" => Array("NAME", "LAST_NAME"),
			"REQUIRED_FIELDS" => Array(),
			"AUTH" => "Y",
			"USE_BACKURL" => "Y",
			"SUCCESS_PAGE" => "/personal/main/",
			"SET_TITLE" => "Y",
			"USER_PROPERTY" => Array(),
			"SEF_FOLDER" => "/",
			"VARIABLE_ALIASES" => Array()
		)
	);?>
</div>

<script>
    function openRegisterPopup()
    {
        //$('#bx_auth_popup_form').hide();

		<?
		$sizes = "width:480px;height:500px";
		$allowSocAuth = COption::GetOptionString("main","allow_socserv_authorization","Y");
		if($allowSocAuth == "Y" && $arResult["AUTH_SERVICES"])
			$sizes =  "width:480px;height:500px";
		?>
        var registerPopup = BX.PopupWindowManager.create("RegisterPopup", null, {
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
                    this.setContent(BX("register_popup_form"));
                }
            }
        });

        registerPopup.show();
    }
</script>