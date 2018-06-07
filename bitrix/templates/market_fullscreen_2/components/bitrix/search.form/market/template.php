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
$this->setFrameMode(true);?>
<div class="bxr-search-form">
<form action="<?=$arResult["FORM_ACTION"]?>">
	<?$APPLICATION->IncludeComponent(
		"bitrix:search.suggest.input",
		"",
		array(
			"NAME" => "q",
			"VALUE" => htmlspecialcharsbx($_REQUEST["q"]),
			"INPUT_SIZE" => 15,
			"DROPDOWN_SIZE" => 10,
		),
		$component, array("HIDE_ICONS" => "Y")
	);?>
        <span class="bxr-input-group-btn-menu">
            <button class="btn bxr-btn-default bxr-color bxr-bg-hover-light fa fa-search" type="submit" name="s"></button>
	</span>
</form>
</div>