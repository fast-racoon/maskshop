<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

	<?/*<i class="fa fa-shopping-cart"></i>*/?>
	<img title="�������" src="/images/header/_cart_m.png" style="vertical-align: unset;">
	<?if (count($arResult["BASKET_ITEMS"]["CAN_BUY"]) >0 ){?>
		<span class="sm-hide xs-hide"><?=GetMessage('BASKET_PRODUCTS')?>: <?=count($arResult["BASKET_ITEMS"]["CAN_BUY"])?> (<span class="bxr-format-price"><?=$arResult["FORMAT_SUMM"]?></span>)</span>
	<?}else{
		echo '<span class="sm-hide xs-hide">'.GetMessage("BASKET_EMPTY").'</span>';
	}?>
