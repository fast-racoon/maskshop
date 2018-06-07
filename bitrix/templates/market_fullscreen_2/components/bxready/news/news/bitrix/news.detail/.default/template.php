<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$this->setFrameMode(true);
//echo "<pre>";print_r($arResult);echo "</pre>";
$excludeProps = array('PRICE', 'OLD_PRICE', "MORE_URLS", "VIDEO");

$QueryTitle = COption::GetOptionString('alexkova.corporate', 'query_button_title', GetMessage('QUERY_BUTTON_TITLE'));
$SaleTitle = COption::GetOptionString('alexkova.corporate', 'query_button_title', GetMessage('SALE_BUTTON_TITLE'));

?>

<?//og in header?>
<?/*$this->SetViewTarget('news_og');?>
<meta property="og:title" content="<?=$arResult["NAME"]?>"/>
<meta property="og:description" content="<?=$arResult["PREVIEW_TEXT"]?>"/>
<meta property="og:image" content="https://<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>">
<meta property="og:type" content="website"/>
<meta property="og:url" content= "https://<?=SITE_SERVER_NAME.$APPLICATION->GetCurPage()?>" />
<?$this->EndViewTarget();*/?> 

<?//COption::SetOptionString("alexkova.market","bxr_org_name",$APPLICATION->ShowViewContent('news_detail_title'));?>
<?//COption::SetOptionString("alexkova.market","bxr_org_description",$arResult["PREVIEW_TEXT"]);?>
<?//COption::SetOptionString("alexkova.market","bxr_org_logo",$arResult["DETAIL_PICTURE"]["SRC"]);?>



<?//�������� ������ � ������ ���������?>
<?$this->SetViewTarget('news_detail_img_prew');?>
<?echo "https://maskshop.ru".$arResult["DETAIL_PICTURE"]["SRC"];?>
<?$this->EndViewTarget();?> 
<?//�������� �������� � ������ ���������?>
<?$this->SetViewTarget('news_detail_description_prew');?>
<?echo $arResult["PREVIEW_TEXT"];?>
<?$this->EndViewTarget();?> 





<?//print_r($arResult);?>


<?if (in_array("DATE_ACTIVE_FROM",$arParams["DETAIL_FIELD_CODE"]) || in_array("DATE_ACTIVE_TO",$arParams["DETAIL_FIELD_CODE"])):?>
        <div class="date-news">
<?if (in_array("DATE_ACTIVE_FROM",$arParams["DETAIL_FIELD_CODE"])):?>

                <?=$arResult["ACTIVE_FROM"]?>

<?endif;?>
<?if (in_array("DATE_ACTIVE_TO",$arParams["DETAIL_FIELD_CODE"])):?>

                / <?=$arResult["DATE_ACTIVE_TO"]?>

<?endif;?>
        </div>
<?endif;?>

<?/*if (is_array($arResult["DETAIL_PICTURE"])):?>
        <div class="bxr-news-image">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>">
        </div>
<?endif;*/?>


<?if (count($arResult["FILES"])>0
	|| count($arResult["LINKS"])>0
		|| count($arResult["VIDEO"])>0):?>


<ul class="nav nav-tabs" role="tablist" id="details">

	<li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab"><?=GetMessage("DETAIL_TEXT_DESC")?></a></li>

	<?if (count($arResult["VIDEO"])>0):?>
		<li role="presentation"><a href="#video" aria-controls="video" role="tab" data-toggle="tab"><?=GetMessage("VIDEO_TAB_DESC")?></a></li>
	<?endif;?>
	<?if (count($arResult["FILES"])>0):?>
		<li role="presentation" ><a href="#files" aria-controls="files" role="tab" data-toggle="tab"><?=GetMessage("CATALOG_FILES")?></a></li>
	<?endif;?>
	<?if (count($arResult["LINKS"])>0):?>
		<li role="presentation"><a href="#links" aria-controls="video" role="tab" data-toggle="tab"><?=GetMessage("LINKS_TAB_DESC")?></a></li>
	<?endif;?>
</ul>

<div class="tab-content">
	<div role="tabpanel" class="tab-pane fade in active" id="description">
		<hr /><?echo $arResult["DETAIL_TEXT"];?>
	</div>

	<?if (count($arResult["FILES"])>0):?>
		<div id="files" class="element-files tb20 tab-pane fade" role="tabpanel">
			<hr />
			<?foreach ($arResult["FILES"] as $val):?>

				<?$template = "file_element";
				$arElementDrawParams = array(
					"DISPLAY_VARIANT" => $template,
					"ELEMENT" => array(
						"NAME" => $val["ORIGINAL_NAME"],
						"LINK" => $val["SRC"],
						"CLASS_NAME"=>$val["EXTENTION"]
					)
				);
?>
				<?
				$APPLICATION->IncludeComponent(
					"alexkova.corporate:element.draw",
					".default",
					$arElementDrawParams,
					false
				)
				?>

			<?endforeach;?>

		</div><div class="clearfix"></div>
	<?endif;?>

	<?if (count($arResult["LINKS"])>0):?>
		<div id="links" class="element-files tb20 tab-pane fade" role="tabpanel">
			<hr />
			<?foreach ($arResult["LINKS"] as $val):?>

				<?$template = "glyph_links";
				$arElementDrawParams = array(
					"DISPLAY_VARIANT" => $template,
					"ELEMENT" => array(
						"NAME" => $val["TITLE"],
						"LINK" => $val["LINK"],
						"GLYPH"=>array("GLYPH_CLASS" => "glyphicon-chevron-right"),
						"TARGET"=>"_blank"
					)
				);
				?>
				<?
				$APPLICATION->IncludeComponent(
					"alexkova.corporate:element.draw",
					".default",
					$arElementDrawParams,
					false
				)
				?>

			<?endforeach;?>

		</div><div class="clearfix"></div>
	<?endif;?>

	<?if (count($arResult["VIDEO"])>0):?>
		<div id="video" class="element-files tb20 tab-pane fade" role="tabpanel">
			<hr />
			<?foreach ($arResult["VIDEO"] as $val):?>

				<?$template = "video_card";
				$arElementDrawParams = array(
					"DISPLAY_VARIANT" => $template,
					"ELEMENT" => array(
						"VIDEO" => $val["LINK"],                  //������ �� �����
						"VIDEO_IMG" => '',               //������ �� ��������
						"VIDEO_IMG_WIDTH" => '150',         //������ �������� ��� �����
						"NAME" => $val["TITLE"]
					)
				);




				?>
				<div class="col-lg-3">
				<?
				$APPLICATION->IncludeComponent(
					"alexkova.corporate:element.draw",
					".default",
					$arElementDrawParams,
					false
				)
				?>
				</div>

			<?endforeach;?>

		</div><div class="clearfix"></div>
	<?endif;?>



</div>

<script>
	$(function () {
		$('#details a').click(function (e) {
			e.preventDefault();
			$(this).tab('show')
		})
	})
</script>
<?else:?>
	<?echo $arResult["DETAIL_TEXT"];?>
<?endif;?>
