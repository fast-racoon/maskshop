<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/** @var CBitrixComponentTemplate $this */
/** @var array $arParams */
/** @var array $arResult */
/** @global CDatabase $DB */

$dbRes = CIBlockSection::GetList([], ['IBLOCK_ID' => getIbIdByCode('catalog'), 'ACTIVE' => 'Y'], false, ["ID", "IBLOCK_ID", "UF_NOT_SHOW_IN_MENU"]);
while($arSection = $dbRes->Fetch()){
	if($arSection['UF_NOT_SHOW_IN_MENU'])
		$arResult['NOT_SHOW_SECTIONS'][$arSection['ID']] = $arSection['UF_NOT_SHOW_IN_MENU'];
}