<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<?if (is_array($_SESSION["BXR_MARKERS_SETTINGS"])
	&& !empty($_SESSION["BXR_MARKERS_SETTINGS"])):?>

	<?if (isset($_REQUEST["ID"])){

		$arFilter = array();

		switch (strval($_REQUEST["ID"])){
			case 'SALEBANER':
				$arFilter = array("!PROPERTY_SALEBANER"=>false);
				break;
			
			case 'NEWBANER':
				$arFilter = array("!PROPERTY_NEWBANER"=>false);
				break;
							
			case 'MUSTHAVE':
				$arFilter = array("!PROPERTY_MUSTHAVE"=>false);
				break;
				
			case 'MONTHHIT':
				$arFilter = array("!PROPERTY_MONTHHIT"=>false);
				break;
								
			case 'RECOMMENDED':
				$arFilter = array("!PROPERTY_RECOMMENDED"=>false);
				break;

			case 'NEWPRODUCT':
				$arFilter = array("!PROPERTY_NEWPRODUCT"=>false);
				break;

			case 'SPECIALOFFER':
				$arFilter = array("!PROPERTY_SPECIALOFFER"=>false);
				break;

			case 'SALELEADER':
				$arFilter = array("!PROPERTY_SALELEADER"=>false);
				break;

			default: ;
		}
		if (is_array($arFilter) && !empty($arFilter)){
			global $arrFilter;
			$arrFilter = $arFilter;
                        $arParams['PRODUCT_DISPLAY_MODE'] = 'Y';
                        
			$APPLICATION->IncludeComponent(
				"bitrix:catalog.section",
				"",
				$arParams,
				$component,
				array('HIDE_ICONS' => 'Y')
			);
		}
	}?>

<?endif;?>