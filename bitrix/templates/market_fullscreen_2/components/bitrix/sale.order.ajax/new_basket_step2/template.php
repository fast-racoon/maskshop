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

    <div class="predsucOrderTitle bx_order_make col-lg-12 col-xs-12">
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
						'showBlockErrors' => 'n',
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

                    //проверяем зареган ли уже такой e-mail
                    function checkExistsEmail(inEmail) {
                        var exist = false;
                        $.ajax({
                            type: 'post',//тип запроса: get,post либо head
                            url: '/ajax/email_check.php',//url адрес файла обработчика
                            data: {'inEmail': inEmail},//параметры запроса
                            async: false,
                            success: function (data) {//возвращаемый результат от сервера
                                console.info(inEmail+' - '+data);
                                var tmp_data = data + 0;
                                if (tmp_data > 0)
                                    exist = true;
                            }
                        });
                        return exist;
                    }

                    //проверяем обязательные поля
                    function validateForm(form) {
                        var formInput = form.find('.field-req'),
                            formError = false;
                        if (formInput[0]) {
                            for (var i = 0, oil = formInput.length; i < oil; i++) {
                                var field = formInput.eq(i),
                                    fieldBlock = field.closest('.bx_block');
                                if (!/[\wа-яА-Я]/.test(field.val())) {
                                    fieldBlock.addClass('error').find('.field-error').text(fieldBlock.data('text'));
                                    formError = true;
                                } else if (field.data('code') === 'EMAIL') {
                                    if (!/^[\.A-z0-9_\-\+]+[@][A-z0-9_\-]+([.][A-z0-9_\-]+)+[A-z]{1,4}$/.test(field.val())) {
                                        fieldBlock.addClass('error').find('.field-error').text(fieldBlock.data('email'));
                                        formError = true;
                                    }
									<?if(!$USER->IsAuthorized()):?>
									else if (checkExistsEmail(field.val())) {
                                        fieldBlock.addClass('error').find('.field-error').text(fieldBlock.data('exist'));
                                        formError = true;
                                    }
									<?endif;?>
                                } else {
                                    fieldBlock.removeClass('error').find('.field-error').text('');
                                }
                            }
                        }
                        return formError;
                    }

                    var BXFormPosting = false;
                    function submitForm(val)
                    {
                        if (val === 'Y') {
                            if (validateForm($('#ORDER_FORM'))) {
                                top.BX.scrollToNode(top.BX('ORDER_FORM'));
                                return true;
                            }
                        }

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

						<?/*
						//если в бд есть пользователь с таким e-mail
						if(CheckEmailOnOrder($('#ORDER_PROP_2').val()) == true)
						{
							//$('#ORDER_PROP_2').attr('style', 'border: 2px solid #f00;');
							//$('#ORDER_PROP_2_err').attr('style', 'display:block; color: #f00;');

							/*
							var main_prop2_val= $('#ORDER_PROP_2').val();
							var main= $('#ORDER_PROP_2_block').html();//document.getElementById("ORDER_PROP_2").innerHTML;
							var str = '<div id="ORDER_PROP_2_err" style="color:#f00;">Такой пользователь уже зарегистрирован. Войдите в свой аккаунт.</div>';
							var element=document.getElementById('ORDER_PROP_2_err');

							if(!element)
							{
								$('#ORDER_PROP_2_block').html(main + str);
							}else{
								$('#ORDER_PROP_2_block').html(main);
							}
							$('#ORDER_PROP_2').val(main_prop2_val);
							//document.getElementById("ORDER_PROP_2_block").innerHTML = main+str;
							*/?>
						<?/*
										}else{//если есть в базе нет пользователя с таким e-mail
											//$('#ORDER_PROP_2_err').attr('style', 'display:none;');
											//$('#ORDER_PROP_2').attr('style', 'border: 1px solid #c1c5c8;');


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
				*/?>
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

                        //btn points BoxBerry
                        var type = $('.bx_result_period_text a[data-ydwidget-open]').data('ydwidget-profile');
                        $('.bx_result_period').addClass(type);
                        // $('.DeliveryBlockInfo b a[data-ydwidget-open]').attr('class', 'BoxBerry_btn').text('Выбрать');
                        // $('.DeliveryBlockInfo b a').html('Выбрать');
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
                                // $('#DeliveryBlockInfo_'+$('#curIdDopBlock').val()+' b a').attr('class', 'BoxBerry_btn');
                                // $('#DeliveryBlockInfo_'+$('#curIdDopBlock').val()+' .bx_result_price a').attr('class', 'PicPoint_btn');

                                //click
                                //$('#DeliveryBlockInfo_'+$('#curIdDopBlock').val()+' b a').click();
                                //$('#DeliveryBlockInfo_'+$('#curIdDopBlock').val()+' .bx_result_price a').click();
                            }
                        });

                        $('.inputDelivery').each(function(){
                            if($(this).is(':checked'))
                            {
                                //viev current
                                // $('#DeliveryBlockInfo_'+$(this).val()+' b a').attr('class', 'BoxBerry_btn');
                                // $('#DeliveryBlockInfo_'+$(this).val()+' .bx_result_price a').attr('class', 'PicPoint_btn');
                            }
                        });
                    }
                    function firstSelectDostavka(inID)
                    {
                        //viev current
                        // $('#DeliveryBlockInfo_'+inID+' b a').attr('class', 'BoxBerry_btn');
                        // $('#DeliveryBlockInfo_'+inID+' .bx_result_price a').attr('class', 'PicPoint_btn');
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

					/*if(!empty($arResult["ERROR"]) && $arResult["USER_VALS"]["FINAL_STEP"] == "Y")
					{
						foreach($arResult["ERROR"] as $v)
							echo ShowError($v);
						?>
                        <script type="text/javascript">
                            top.BX.scrollToNode(top.BX('ORDER_FORM'));
                        </script>
						<?
					}*/

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
				<?/*<div class="bx_ordercart_order_pay_center"><a href="javascript:void();" onclick="submitForm('Y'); return false;" id="ORDER_CONFIRM_BUTTON" class="checkout" style="background: #02a836 !important;"><?=GetMessage("SOA_TEMPL_BUTTON")?></a></div>*/?>
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


<script>
    $(document).ready(function() {
        $('.bx-ui-sls-fake').attr('placeholder', 'Введите город...');

        BX('ID_DELIVERY_ID_'+$('#block_select_delivery option:selected').attr('data-id')).checked=true; $('#curIdDopBlock').val($('#block_select_delivery option:selected').attr('data-id')); submitForm();

        //btn points BoxBerry
        // $('.DeliveryBlockInfo b a').attr('class', 'BoxBerry_btn');
        // $('.DeliveryBlockInfo b a').html('Выбрать');

        // $('#ORDER_PROP_2_err').attr('style', 'display:none;');
        // $('#ORDER_PROP_2').attr('style', 'border: 1px solid #c1c5c8;');
    });
</script>
