<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$this->setFrameMode(true);
?>
<div class="bx_storege" id="catalog_store_amount_div">
    <ul id="c_store_amount">
        <?foreach($arResult["STORES"] as $pid => $arProperty):?>
            <li>
                <table width="100%" class="bxr-props-table bxr-store-info">
                    <tbody>
                        <tr<? echo ($arParams['SHOW_EMPTY_STORE'] == 'N' && isset($store['REAL_AMOUNT']) && $store['REAL_AMOUNT'] <= 0 ? 'style="display: none;"' : ''); ?>>
                            <td class="bxr-props-name">
                                <span><?=$arProperty["TITLE"]?></span><br>
                            
                                <?if (isset($arProperty["DESCRIPTION"])):?>
                                        <?=$arProperty["DESCRIPTION"]?><br />
                                <?endif;?>
                                <?if (isset($arProperty["PHONE"])):?>
                                        <span class="tel"><?=GetMessage('S_PHONE')?></span> <?=$arProperty["PHONE"]?><br />
                                <?endif;?>
                                <?if (isset($arProperty["SCHEDULE"])):?>
                                        <span class="schedule"><?=GetMessage('S_SCHEDULE')?></span> <?=$arProperty["SCHEDULE"]?><br />
                                <?endif;?>
                                <?if (isset($arProperty["EMAIL"])):?>
                                        <span><?=GetMessage('S_EMAIL')?></span> <?=$arProperty["EMAIL"]?><br />
                                <?endif;?>
                                <?if (isset($arProperty["COORDINATES"])):?>
                                        <span><?=GetMessage('S_COORDINATES')?></span> <?=$arProperty["COORDINATES"]["GPS_N"]?>, <?=$arProperty["COORDINATES"]["GPS_S"]?><br />
                                <?endif;?>

                                <?
                                if (!empty($arProperty['USER_FIELDS']) && is_array($arProperty['USER_FIELDS']))
                                {
                                        foreach ($arProperty['USER_FIELDS'] as $userField)
                                        {
                                                if (isset($userField['CONTENT']))
                                                {
                                                        ?><span><?=$userField['TITLE']?>:</span> <?=$userField['CONTENT']?><br /><?
                                                }
                                        }
                                }
                                ?>
                            </td>
                            
                            <td class="bxr-props-data">
                                <span class="balance" id="<?=$arResult['JS']['ID']?>_<?=$arProperty['ID']?>"><?=$arProperty["AMOUNT"]?></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </li>
        <?endforeach;?>
    </ul>
</div>

<?if (isset($arResult["IS_SKU"]) && $arResult["IS_SKU"] == 1):?>
	<script type="text/javascript">
		var obStoreAmount = new JCCatalogStoreSKU(<? echo CUtil::PhpToJSObject($arResult['JS'], false, true, true); ?>);
	</script>
	<?
endif;?>