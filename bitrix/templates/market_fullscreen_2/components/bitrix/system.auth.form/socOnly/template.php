<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>
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