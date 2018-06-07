<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
if($USER->IsAuthorized() || $arParams["ALLOW_AUTO_REGISTER"] == "Y")
{
	if($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y")
	{
		if(strlen($arResult["REDIRECT_URL"]) > 0)
		{
			$APPLICATION->RestartBuffer();
			?>
			<script type="text/javascript">
				window.top.location.href='<?=CUtil::JSEscape($arResult["REDIRECT_URL"])?>';
			</script>
			<?
			die();
		}

	}
}

$APPLICATION->SetAdditionalCSS($templateFolder."/style_cart.css");
$APPLICATION->SetAdditionalCSS($templateFolder."/style.css");
?>
<input type="hidden" name="curIdDopBlock" id="curIdDopBlock" value="">

<a name="order_form"></a>

<div id="order_form_div" class="order-checkout">
<NOSCRIPT>
	<div class="errortext"><?=GetMessage("SOA_NO_JS")?></div>
</NOSCRIPT>

<?
if (!function_exists("getColumnName"))
{
	function getColumnName($arHeader)
	{
		return (strlen($arHeader["name"]) > 0) ? $arHeader["name"] : GetMessage("SALE_".$arHeader["id"]);
	}
}

if (!function_exists("cmpBySort"))
{
	function cmpBySort($array1, $array2)
	{
		if (!isset($array1["SORT"]) || !isset($array2["SORT"]))
			return -1;

		if ($array1["SORT"] > $array2["SORT"])
			return 1;

		if ($array1["SORT"] < $array2["SORT"])
			return -1;

		if ($array1["SORT"] == $array2["SORT"])
			return 0;
	}
}
?>

<div class="bx_order_make col-lg-8 col-xs-12">
	<?
	if(!$USER->IsAuthorized() && $arParams["ALLOW_AUTO_REGISTER"] == "N")
	{
		if(!empty($arResult["ERROR"]))
		{
			foreach($arResult["ERROR"] as $v)
				echo ShowError($v);
		}
		elseif(!empty($arResult["OK_MESSAGE"]))
		{
			foreach($arResult["OK_MESSAGE"] as $v)
				echo ShowNote($v);
		}

		include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/auth.php");
	}
	else
	{
		if($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y")
		{
			if(strlen($arResult["REDIRECT_URL"]) == 0)
			{
				include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/confirm.php");
			}
		}
		else
		{
			?>
			<script type="text/javascript">

			<?if(CSaleLocation::isLocationProEnabled()):?>

				<?
				// spike: for children of cities we place this prompt
				$city = \Bitrix\Sale\Location\TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID')))->fetch();
				?>

				BX.saleOrderAjax.init(<?=CUtil::PhpToJSObject(array(
					'source' => $this->__component->getPath().'/get.php',
					'cityTypeId' => intval($city['ID']),
					'messages' => array(
						'otherLocation' => '--- '.GetMessage('SOA_OTHER_LOCATION'),
						'moreInfoLocation' => '--- '.GetMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
						'notFoundPrompt' => '<div class="-bx-popup-special-prompt">'.GetMessage('SOA_LOCATION_NOT_FOUND').'.<br />'.GetMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
							'#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
							'#ANCHOR_END#' => '</a>'
						)).'</div>'
					)
				))?>);

			<?endif?>

			var BXFormPosting = false;
			function submitForm(val)
			{
				if (BXFormPosting === true)
					return true;

				BXFormPosting = true;
				if(val != 'Y')
					BX('confirmorder').value = 'N';

				var orderForm = BX('ORDER_FORM');
				BX.showWait();

				<?if(CSaleLocation::isLocationProEnabled()):?>
					BX.saleOrderAjax.cleanUp();
				<?endif?>

				BX.ajax.submit(orderForm, ajaxResult);

				return true;
			}

			function ajaxResult(res)
			{
				var orderForm = BX('ORDER_FORM');
				try
				{
					// if json came, it obviously a successfull order submit

					var json = JSON.parse(res);
					BX.closeWait();

					if (json.error)
					{
						BXFormPosting = false;
						return;
					}
					else if (json.redirect)
					{
						window.top.location.href = json.redirect;
					}
				}
				catch (e)
				{
					// json parse failed, so it is a simple chunk of html

					BXFormPosting = false;
					BX('order_form_content').innerHTML = res;

					<?if(CSaleLocation::isLocationProEnabled()):?>
						BX.saleOrderAjax.initDeferredControl();
					<?endif?>
				}

				BX.closeWait();
				BX.onCustomEvent(orderForm, 'onAjaxSuccess');

				//btn points PicPoint 
				$('.bx_result_price a').html('Выбрать на карте');
				$('.bx_result_price a').attr('style', 'padding: 10px;background: #ff6953;border-radius: 5px; color:#fff; font-size:14px; cursor:pointer;font-weight: normal; text-decoration: none;line-height: 45px; display: none;');
				$('.bx_result_price').attr('style', 'float:left;');

				//btn points BoxBerry 
				$('.DeliveryBlockInfo b a').attr('style', 'padding: 10px;background: #ff6953;border-radius: 5px; color:#fff; font-size:14px; cursor:pointer;font-weight: normal; text-decoration: none;line-height: 45px; display: none;');
				$('.DeliveryBlockInfo b a').html('Выбрать на карте');
				if($('#ID_DELIVERY_ID_34').prop("checked") || $('#ID_DELIVERY_ID_38').prop("checked") || $('#ID_DELIVERY_ID_39').prop("checked") || $('#ID_DELIVERY_ID_40').prop("checked"))
				{
					$('.dopPropBlockOut').hide();
				}

				setClassDopProp();
				//vievDopPropBlock();

			}
		/*
			function vievDopPropBlock()
			{
				var data = $('#dopPropBlock').html();
				$('#dopPropBlockOut').html(data); 
			}
		*/
function setClassDopProp()
{
	$('.dopPropBlockOut').each(function(){
  		if($(this).attr('data-id') == $('#curIdDopBlock').val())
		{
			var data = $('#dopPropBlock').html();
			$(this).html(data); 
			$('#dopPropBlock').html("");

			//viev current
			$('#DeliveryBlockInfo_'+$('#curIdDopBlock').val()+' b a').attr('style', 'padding: 10px;line-height: 45px;background: #ff6953;border-radius: 5px; color:#fff; font-size:14px; cursor:pointer;font-weight: normal; text-decoration: none;display: inline;');
			$('#DeliveryBlockInfo_'+$('#curIdDopBlock').val()+' .bx_result_price a').attr('style', 'padding: 10px;line-height: 45px;background: #ff6953;border-radius: 5px; color:#fff; font-size:14px; cursor:pointer;font-weight: normal; text-decoration: none; display: inline;');

			//click
			//$('#DeliveryBlockInfo_'+$('#curIdDopBlock').val()+' b a').click();
			//$('#DeliveryBlockInfo_'+$('#curIdDopBlock').val()+' .bx_result_price a').click();
		}
	});

	$('.inputDelivery').each(function(){
  		if($(this).is(':checked'))
		{
			//viev current
			$('#DeliveryBlockInfo_'+$(this).val()+' b a').attr('style', 'padding: 10px;line-height: 45px;background: #ff6953;border-radius: 5px; color:#fff; font-size:14px; cursor:pointer;font-weight: normal; text-decoration: none;display: inline;');
			$('#DeliveryBlockInfo_'+$(this).val()+' .bx_result_price a').attr('style', 'padding: 10px;line-height: 45px;background: #ff6953;border-radius: 5px; color:#fff; font-size:14px; cursor:pointer;font-weight: normal; text-decoration: none; display: inline;');
		}
	});
}
function firstSelectDostavka(inID)
{
	//viev current
	$('#DeliveryBlockInfo_'+inID+' b a').attr('style', 'padding: 10px;line-height: 45px;background: #ff6953;border-radius: 5px; color:#fff; font-size:14px; cursor:pointer;font-weight: normal; text-decoration: none;display: inline;');
	$('#DeliveryBlockInfo_'+inID+' .bx_result_price a').attr('style', 'padding: 10px;line-height: 45px;background: #ff6953;border-radius: 5px; color:#fff; font-size:14px; cursor:pointer;font-weight: normal; text-decoration: none; display: inline;');
}
	function SetContact(profileId)
			{
				BX("profile_change").value = "Y";
				submitForm();
			}
			</script>
			<?if($_POST["is_ajax_post"] != "Y")
			{
				?><form action="<?=$APPLICATION->GetCurPage();?>" method="POST" name="ORDER_FORM" id="ORDER_FORM" enctype="multipart/form-data">
				<?=bitrix_sessid_post()?>
				<div id="order_form_content">
				<?
			}
			else
			{
				$APPLICATION->RestartBuffer();
			}

			if($_REQUEST['PERMANENT_MODE_STEPS'] == 1)
			{
				?>
				<input type="hidden" name="PERMANENT_MODE_STEPS" value="1" />
				<?
			}

			if(!empty($arResult["ERROR"]) && $arResult["USER_VALS"]["FINAL_STEP"] == "Y")
			{
				foreach($arResult["ERROR"] as $v)
					echo ShowError($v);
				?>
				<script type="text/javascript">
					top.BX.scrollToNode(top.BX('ORDER_FORM'));
				</script>
				<?
			}

			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/person_type.php");
			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/props.php");
?>
<?/*
			<?global $BXRGeneral;?>

			<div class="personal-data-accept">
				<input type="checkbox" name="ORDER_PROP_22" id="ORDER_PROP_22" <?if ($licensePropInfo["VALUE"]=="on") echo " checked";?>>
				<span class="bx_sof_req">*</span>
				<label for="license" style=" display: inline-block; ">
					<?=$BXRGeneral['PAGES']['all']['alexkova.market:form.iblock']['PERSONAL_DATA_TEXT']?>
					<a target="_blank" href="<?=$BXRGeneral['PAGES']['all']['alexkova.market:form.iblock']['PERSONAL_DATA_URL']?>">
						<?=$BXRGeneral['PAGES']['all']['alexkova.market:form.iblock']['PERSONAL_DATA_CAPTION']?>
					</a>
				</label>
			</div>
*/?>
			<br>
<?
			if ($arParams["DELIVERY_TO_PAYSYSTEM"] == "p2d")
			{
				include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/paysystem.php");
				include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/delivery.php");
			}
			else
			{
				include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/delivery.php");
				include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/paysystem.php");
			}

			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/related_props.php");

			include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/summary.php");
			if(strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
				echo $arResult["PREPAY_ADIT_FIELDS"];
			?>

			<?if($_POST["is_ajax_post"] != "Y")
			{
				?>
					</div>
					<input type="hidden" name="confirmorder" id="confirmorder" value="Y">
					<input type="hidden" name="profile_change" id="profile_change" value="N">
					<input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y">
					<input type="hidden" name="json" value="Y">
					<div class="bx_ordercart_order_pay_center"><a href="javascript:void();" onclick="submitForm('Y'); return false;" id="ORDER_CONFIRM_BUTTON" class="checkout" style="background: #02a836 !important;"><?=GetMessage("SOA_TEMPL_BUTTON")?></a></div>
				</form>
				<?
				if($arParams["DELIVERY_NO_AJAX"] == "N")
				{
					?>
					<div style="display:none;"><?$APPLICATION->IncludeComponent("bitrix:sale.ajax.delivery.calculator", "", array(), null, array('HIDE_ICONS' => 'Y')); ?></div>
					<?
				}
			}
			else
			{
				?>
				<script type="text/javascript">
					top.BX('confirmorder').value = 'Y';
					top.BX('profile_change').value = 'N';
				</script>
				<?
				die();
			}
		}
	}
	?>
	</div>
</div>

<?if(CSaleLocation::isLocationProEnabled()):?>

	<div style="display: none">
		<?// we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:sale.location.selector.steps", 
			".default", 
			array(
			),
			false
		);?>
		<?$APPLICATION->IncludeComponent(
			"bitrix:sale.location.selector.search", 
			".default", 
			array(
			),
			false
		);?>
	</div>

<?endif?>
