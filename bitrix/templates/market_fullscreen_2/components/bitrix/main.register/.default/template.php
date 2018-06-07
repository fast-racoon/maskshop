<?
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage main
 * @copyright 2001-2014 Bitrix
 */

/**
 * Bitrix vars
 * @global CMain $APPLICATION
 * @global CUser $USER
 * @param array $arParams
 * @param array $arResult
 * @param CBitrixComponentTemplate $this
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();
//print_r($arResult);
?>

<div class="new_auth2">
<div style="text-align: center;">Быстрая регистрация через социальные сети</div>
<div class="">
<?$APPLICATION->IncludeComponent("bitrix:system.auth.form","socOnly",Array(
     "REGISTER_URL" => "register.php",
     "FORGOT_PASSWORD_URL" => "",
     "PROFILE_URL" => "profile.php",
     "SHOW_ERRORS" => "Y" 
     )
);?>
	<?/*
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
	endif;*/?>
</div>
<div style="text-align: center;">или</div>

<?if (count($arResult["ERRORS"]) > 0){?>
<style>
.new_auth2 {
    border: solid 2px #f00 !important;
    border-bottom: none !important;
}
.new_auth_bottom2 {
    border: solid 2px #f00 !important;
    border-top: none !important;
}
#REG_EMAIL {
    border: 2px solid #f00;
}
</style>
<script>
	window.onload=function(){
		openRegisterPopup();
	}
</script>
	<div style="color:#f00;">Такой адрес уже зарегистрирован.</div>
<?}?>

<form class="new_auth_form2" method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
	<?
	if($arResult["BACKURL"] <> ''):
	?>
		<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
	<?
	endif;
	?>
	<input type="text" placeholder="<?=GetMessage("REG_NAME");?>" name="REGISTER[NAME]" value="" required>
	<input type="text" placeholder="<?=GetMessage("REG_LAST_NAME");?>" name="REGISTER[LAST_NAME]" value="" required>
	<input type="email" id="REG_EMAIL" placeholder="<?=GetMessage("REG_EMAIL");?>" name="REGISTER[EMAIL]" value="" required>
	<input type="password" id="REG_PSWD" placeholder="<?=GetMessage("REG_PSWD");?>" name="REGISTER[PASSWORD]" value="" autocomplete="off" class="bx-auth-input" required>

<input type="hidden" id="REG_CONFIRM_PASSWORD" name="REGISTER[CONFIRM_PASSWORD]" value="" autocomplete="off">
<input type="hidden" id="REG_LOGIN" name="REGISTER[LOGIN]" value="">


	<input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" onclick="SetHiddenInput();" />

	<input type="checkbox" id="USER_REMEMBER3" name="USER_REMEMBER" value="Y" style=" margin: 5px 0 0; " checked required />
	<label for="USER_REMEMBER3" class="new_auth_memory2">Я согласен на обработку персональных данных</label>

	<?/*
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
	<a href="<?=$arParams["AUTH_FORGOT_PASSWORD_URL"]?>" class="new_auth_pswd">Забыли пароль?</a>
	*/?>

</form>
</div>
<div class="new_auth_bottom2">
	<span>Есть аккаунт?</span>
	<a href="javascript:void(0)" onclick="openAuthorizePopup()">Войдите</a>
</div>


<script>
/*
$( document ).ready(function() {
  // Handler for .ready() called.
});
*/
function SetHiddenInput()
{
	$('#REG_CONFIRM_PASSWORD').val($('#REG_PSWD').val());
	$('#REG_LOGIN').val($('#REG_EMAIL').val());
}
</script>












<?/*
<div class="bx-auth-reg">

<?if($USER->IsAuthorized()):?>

<p><?echo GetMessage("MAIN_REGISTER_AUTH")?></p>

<?else:?>
<?
if (count($arResult["ERRORS"]) > 0):
	foreach ($arResult["ERRORS"] as $key => $error)
		if (intval($key) == 0 && $key !== 0) 
			$arResult["ERRORS"][$key] = str_replace("#FIELD_NAME#", "&quot;".GetMessage("REGISTER_FIELD_".$key)."&quot;", $error);

	ShowError(implode("<br />", $arResult["ERRORS"]));

elseif($arResult["USE_EMAIL_CONFIRMATION"] === "Y"):
?>
<p><?echo GetMessage("REGISTER_EMAIL_WILL_BE_SENT")?></p>
<?endif?>

<form method="post" action="<?=POST_FORM_ACTION_URI?>" name="regform" enctype="multipart/form-data">
<?
if($arResult["BACKURL"] <> ''):
?>
	<input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
<?
endif;
?>

<table>
	<thead>
		<tr>
			<td colspan="2"><b><?=GetMessage("AUTH_REGISTER")?></b></td>
		</tr>
	</thead>
	<tbody>
<?foreach ($arResult["SHOW_FIELDS"] as $FIELD):?>
	<?if($FIELD == "AUTO_TIME_ZONE" && $arResult["TIME_ZONE_ENABLED"] == true):?>
		<tr>
			<td><?echo GetMessage("main_profile_time_zones_auto")?><?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></td>
			<td>
				<select name="REGISTER[AUTO_TIME_ZONE]" onchange="this.form.elements['REGISTER[TIME_ZONE]'].disabled=(this.value != 'N')">
					<option value=""><?echo GetMessage("main_profile_time_zones_auto_def")?></option>
					<option value="Y"<?=$arResult["VALUES"][$FIELD] == "Y" ? " selected=\"selected\"" : ""?>><?echo GetMessage("main_profile_time_zones_auto_yes")?></option>
					<option value="N"<?=$arResult["VALUES"][$FIELD] == "N" ? " selected=\"selected\"" : ""?>><?echo GetMessage("main_profile_time_zones_auto_no")?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td><?echo GetMessage("main_profile_time_zones_zones")?></td>
			<td>
				<select name="REGISTER[TIME_ZONE]"<?if(!isset($_REQUEST["REGISTER"]["TIME_ZONE"])) echo 'disabled="disabled"'?>>
		<?foreach($arResult["TIME_ZONE_LIST"] as $tz=>$tz_name):?>
					<option value="<?=htmlspecialcharsbx($tz)?>"<?=$arResult["VALUES"]["TIME_ZONE"] == $tz ? " selected=\"selected\"" : ""?>><?=htmlspecialcharsbx($tz_name)?></option>
		<?endforeach?>
				</select>
			</td>
		</tr>
	<?else:?>
		<tr>
			<td><?=GetMessage("REGISTER_FIELD_".$FIELD)?>:<?if ($arResult["REQUIRED_FIELDS_FLAGS"][$FIELD] == "Y"):?><span class="starrequired">*</span><?endif?></td>
			<td><?
	switch ($FIELD)
	{
		case "PASSWORD":
			?><input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" class="bx-auth-input" />
<?if($arResult["SECURE_AUTH"]):?>
				<span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
					<div class="bx-auth-secure-icon"></div>
				</span>
				<noscript>
				<span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
					<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
				</span>
				</noscript>
<script type="text/javascript">
document.getElementById('bx_auth_secure').style.display = 'inline-block';
</script>
<?endif?>
<?
			break;
		case "CONFIRM_PASSWORD":
			?><input size="30" type="password" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" autocomplete="off" /><?
			break;

		case "PERSONAL_GENDER":
			?><select name="REGISTER[<?=$FIELD?>]">
				<option value=""><?=GetMessage("USER_DONT_KNOW")?></option>
				<option value="M"<?=$arResult["VALUES"][$FIELD] == "M" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_MALE")?></option>
				<option value="F"<?=$arResult["VALUES"][$FIELD] == "F" ? " selected=\"selected\"" : ""?>><?=GetMessage("USER_FEMALE")?></option>
			</select><?
			break;

		case "PERSONAL_COUNTRY":
		case "WORK_COUNTRY":
			?><select name="REGISTER[<?=$FIELD?>]"><?
			foreach ($arResult["COUNTRIES"]["reference_id"] as $key => $value)
			{
				?><option value="<?=$value?>"<?if ($value == $arResult["VALUES"][$FIELD]):?> selected="selected"<?endif?>><?=$arResult["COUNTRIES"]["reference"][$key]?></option>
			<?
			}
			?></select><?
			break;

		case "PERSONAL_PHOTO":
		case "WORK_LOGO":
			?><input size="30" type="file" name="REGISTER_FILES_<?=$FIELD?>" /><?
			break;

		case "PERSONAL_NOTES":
		case "WORK_NOTES":
			?><textarea cols="30" rows="5" name="REGISTER[<?=$FIELD?>]"><?=$arResult["VALUES"][$FIELD]?></textarea><?
			break;
		default:
			if ($FIELD == "PERSONAL_BIRTHDAY"):?><small><?=$arResult["DATE_FORMAT"]?></small><br /><?endif;
			?><input size="30" type="text" name="REGISTER[<?=$FIELD?>]" value="<?=$arResult["VALUES"][$FIELD]?>" /><?
				if ($FIELD == "PERSONAL_BIRTHDAY")
					$APPLICATION->IncludeComponent(
						'bitrix:main.calendar',
						'',
						array(
							'SHOW_INPUT' => 'N',
							'FORM_NAME' => 'regform',
							'INPUT_NAME' => 'REGISTER[PERSONAL_BIRTHDAY]',
							'SHOW_TIME' => 'N'
						),
						null,
						array("HIDE_ICONS"=>"Y")
					);
				?><?
	}?></td>
		</tr>
	<?endif?>
<?endforeach?>
<?// ********************* User properties ***************************************************?>
<?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
	<tr><td colspan="2"><?=strlen(trim($arParams["USER_PROPERTY_NAME"])) > 0 ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></td></tr>
	<?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
	<tr><td><?=$arUserField["EDIT_FORM_LABEL"]?>:<?if ($arUserField["MANDATORY"]=="Y"):?><span class="starrequired">*</span><?endif;?></td><td>
			<?$APPLICATION->IncludeComponent(
				"bitrix:system.field.edit",
				$arUserField["USER_TYPE"]["USER_TYPE_ID"],
				array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField, "form_name" => "regform"), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
	<?endforeach;?>
<?endif;?>
<?// ******************** /User properties ***************************************************?>
<?
/* CAPTCHA */
/*
if ($arResult["USE_CAPTCHA"] == "Y")
{
	?>
		<tr>
			<td colspan="2"><b><?=GetMessage("REGISTER_CAPTCHA_TITLE")?></b></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="hidden" name="captcha_sid" value="<?=$arResult["CAPTCHA_CODE"]?>" />
				<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["CAPTCHA_CODE"]?>" width="180" height="40" alt="CAPTCHA" />
			</td>
		</tr>
		<tr>
			<td><?=GetMessage("REGISTER_CAPTCHA_PROMT")?>:<span class="starrequired">*</span></td>
			<td><input type="text" name="captcha_word" maxlength="50" value="" /></td>
		</tr>
	<?
}
/* !CAPTCHA */
/*
?>
	</tbody>
	<tfoot>
		<tr>
			<td></td>
			<td><input type="submit" name="register_submit_button" value="<?=GetMessage("AUTH_REGISTER")?>" /></td>
		</tr>
	</tfoot>
</table>
<p><?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?></p>
<p><span class="starrequired">*</span><?=GetMessage("AUTH_REQ")?></p>

</form>
<?endif?>
</div>
*/?>