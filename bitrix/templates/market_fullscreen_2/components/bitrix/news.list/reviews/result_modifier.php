<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arUsersID = array();
$arUsersIDKey = array();
foreach($arResult["ITEMS"] as $key=>$arItem)
{
	$arUsersID[] = $arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["VALUE"];
	$arUsersIDKey[$arItem["DISPLAY_PROPERTIES"]["PEOPLE"]["VALUE"]][] = $key;
}

$arFilter = Array(
    Array(
         "ID"=>$arUsersID
      )
);
$res = Bitrix\Main\UserTable::getList(Array(
   "select"=>Array("ID","NAME","LAST_NAME","LOGIN","PERSONAL_CITY","PERSONAL_PHOTO"),
   "filter"=>$arFilter,
));
while ($arRes = $res->fetch()) {
	if(is_array($arUsersIDKey[$arRes["ID"]]))
	{
		foreach($arUsersIDKey[$arRes["ID"]] as $key=>$userVal)
		{
			$arResult["ITEMS"][$userVal]["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"] = $arRes;
		}
	}else{
		$arResult["ITEMS"][$arUsersIDKey[$arRes["ID"]]]["DISPLAY_PROPERTIES"]["PEOPLE"]["USER"] = $arRes;
	}
	//print_r($arRes);
}


?>