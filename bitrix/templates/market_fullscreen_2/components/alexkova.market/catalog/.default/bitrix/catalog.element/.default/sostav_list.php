<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();?>

<div class="bxr-detail-tab bxr-detail-props" data-tab="sostav">
<h3 class="bxr-detail-tab-mobile-title  hidden-lg hidden-md hidden-sm hidden-xs"><?=GetMessage("PROPS_SOSTAV")?></h3>
	<span class="tab_detail">
    <?if (!empty($arResult["PROPERTIES"]["PROP_sostav"]["VALUE"]["TEXT"])) {?>
		<?echo htmlspecialcharsBack($arResult["PROPERTIES"]["PROP_sostav"]["VALUE"]["TEXT"])?>
    <?}else{?>
	Описание отсутствует
	<?}?>
	</span>
</div>	