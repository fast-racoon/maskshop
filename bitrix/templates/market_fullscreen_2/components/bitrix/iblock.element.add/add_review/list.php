<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
$this->setFrameMode(false);

//$APPLICATION->IncludeComponent("bitrix:iblock.element.add.list", "", $arParams, $component);

//добавление баллов за отзыв о магазине
if(CModule::IncludeModule('logictim.balls'))
{
	global $USER;

	$type_and_name_bonus = explode("#", $_REQUEST['TYPE_BONUS']);
	//начисления бонусов
	$arFields = array(
		"ADD_BONUS" => 25,
		"USER_ID" => $USER->GetID(),
		"OPERATION_TYPE" => 'ADD_FROM_REVIEW_SHOP',
		"OPERATION_NAME" => 'Начисление за отзыв о магазине',
		"ORDER_ID" => '',
		"DETAIL_TEXT" => ''
		);
	logictimBonusApi::AddBonus($arFields);
}

LocalRedirect("/reviews/");
?>