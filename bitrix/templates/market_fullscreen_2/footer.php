<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
	global $USER; 
if (!is_object($USER)) $USER = new CUser;
?>
<? IncludeTemplateLangFile(__FILE__);?>

<?//������ ������� ������ ��� ������� ������
if(preg_match("/blog/", $APPLICATION->GetCurDir())){//��� ������� ������
	$col3_lg = 2;
	$col3_md = 2;?>
	</div>
	<div class="col-lg-<?=$col3_lg?> col-md-<?=$col3_md?> hidden-sm hidden-xs">

<?}?>
<?if($APPLICATION->GetCurDir() == '/personal/basket/' || $APPLICATION->GetCurDir() == '/auth/'){?>
		</div>
		<div class="col-md-1 col-lg-1 hidden-xs hidden-sm">
<?}?>


        </div>
    </div>
</div>

	<?if ($APPLICATION->GetCurPage(true) == SITE_DIR.'index.php'):?>
		<?if ($mainPageType == "one_col"):?>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"named_area",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => SITE_DIR."include/main_page_footer.php",
							"INCLUDE_PTITLE" => GetMessage("GHANGE_MAIN_PAGE_FOOTER")
						),
						false
					);?>
					</div>
				</div>
			</div>
		<?endif;?>

		<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.brandblock", 
	"brand_slider", 
	array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "11",
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
		"ELEMENT_CODE" => $_REQUEST["ELEMENT_CODE"],
		"PROP_CODE" => array(
			0 => "",
			1 => "Manufacturer",
			2 => "",
		),
		"WIDTH" => "300",
		"HEIGHT" => "100",
		"WIDTH_SMALL" => "300",
		"HEIGHT_SMALL" => "100",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_GROUPS" => "Y",
		"COMPONENT_TEMPLATE" => "brand_slider",
		"SHOW_DEACTIVATED" => "Y",
		"SINGLE_COMPONENT" => "Y",
		"ELEMENT_COUNT" => "30",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false,
	array(
		"ACTIVE_COMPONENT" => "Y"
	)
);?>
	<?endif;?>

	<?//$BXReady->showBannerPlace("BOTTOM");?>

    <footer>
        <div class="footer-line"></div>
        <div class="container footer-head hidden-sm hidden-xs">
            <div class="row">

                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_catalog_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_CATALOG")
                            ),
                            false
                        );?>
                    </div>
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_menu_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_MENU")
                            ),
                            false
                        );?>
                    </div>
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_socnet_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_MENU")
                            ),
                            false
                        );?>
                    </div>                    
                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs footer-socnet-col">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_about_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_MENU")
                            ),
                            false
                        );?>
                    </div>

            </div>
        </div>
        <div class="container">
            <div class="row footerline">
                    <div class="hidden-lg hidden-md col-sm-12 col-xs-12 mobile-footer-menu-tumbl">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_catalog_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_CATALOG")
                            ),
                            false
                        );?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 toggled-item centerMd" style="display: block;">
                        <?
                        $APPLICATION->IncludeComponent(
	"alexkova.market:menu", 
	"footer_cols", 
	array(
		"ROOT_MENU_TYPE" => "bottom_catalog",
		"MAX_LEVEL" => "1",
		"CHILD_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"DELAY" => "N",
		"ALLOW_MULTI_SELECT" => "N",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_CACHE_GET_VARS" => array(
		),
		"COLS" => "1",
		"COMPONENT_TEMPLATE" => "footer_cols"
	),
	false
);
                        ?>
                    </div>
                    <div class="hidden-lg hidden-md  hidden-sm col-xs-12 mobile-footer-menu-tumbl">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_menu_name.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_MENU")
                            ),
                            false
                        );?>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 toggled-item centerMd foter2col" style="display: block;">
	                  <?
                        $APPLICATION->IncludeComponent(
                            "alexkova.market:menu",
                            "footer_cols",
                            Array(
                                "ROOT_MENU_TYPE" => "footer",
                                "MAX_LEVEL" => "1",
                                "CHILD_MENU_TYPE" => "left",
                                "USE_EXT" => "Y",   
                                "DELAY" => "N",
                                "ALLOW_MULTI_SELECT" => "N",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "MENU_CACHE_GET_VARS" => "",
                                "COLS" => "1",
                            ),
                            false
                        );
                        ?>
                    </div>
                    <div class="col-lg-3 col-md-3 hidden-sm col-xs-12  footer-about-company">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_socnet.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_SOCNET")
                            ),
                            false
                        );?>	                
	                </div>                    
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 footer-about-company centerMd">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_about_company.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_INFO")
                            ),
                            false
                        );?>
                    </div>
                    <div class="hidden-lg hidden-md hidden-sm hidden-sm hidden-xs">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_socnet.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_SOCNET")
                            ),
                            false
                        );?>
                    </div>
                    <div class="hidden-lg hidden-md col-sm-12 hidden-xs  footer-about-company centerMd">
                        <?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/footer_socnet.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_SOCNET")
                            ),
                            false
                        );?>	                
	                </div> 
            </div>
        </div>

<?$APPLICATION->IncludeComponent(
                            "bitrix:main.include",
                            "named_area",
                            Array(
                                "AREA_FILE_SHOW" => "file",
                                "AREA_FILE_SUFFIX" => "inc",
                                "EDIT_TEMPLATE" => "",
                                "PATH" => SITE_DIR."include/new_menu.php",
                                "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_SOCNET")
                            ),
                            false
);?>

<?$APPLICATION->IncludeComponent(
    "bitrix:main.include",
    "named_area",
    Array(
	    "AREA_FILE_SHOW" => "file",
	    "AREA_FILE_SUFFIX" => "inc",
	    "EDIT_TEMPLATE" => "",
	    "PATH" => SITE_DIR."include/replacer.php",
	    "INCLUDE_PTITLE" => GetMessage("GHANGE_FOOTER_SOCNET")
    ),
    false
);?>

    </footer>
        <?$APPLICATION->IncludeComponent(
	"alexkova.market:form.iblock", 
	"request_trade", 
	array(
		"IBLOCK_TYPE" => "forms",
		"IBLOCK_ID" => "9",
		"STATUS_NEW" => "NEW",
		"USE_CAPTCHA" => "N",
		"USER_MESSAGE_ADD" => GetMessage("FORM_ANSWER_RESULT"),
		"RESIZE_IMAGES" => "N",
		"MODE" => "link",
		"PROPERTY_CODES" => array(
			0 => "47",
			1 => "48",
			2 => "49",
		),
		"NAME_FROM_PROPERTY" => "48",
		"GROUPS" => array(
			0 => "2",
		),
		"MAX_FILE_SIZE" => "0",
		"EVENT_CLASS" => "open-answer-form",
		"BUTTON_TEXT" => "",
		"POPUP_TITLE" => GetMessage("RECALL_MESSAGE"),
		"SEND_EVENT" => "KZNC_NEW_FORM_PHONE_RESULT",
		"COMPONENT_TEMPLATE" => "request_trade",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
        <?$APPLICATION->IncludeComponent(
	"alexkova.market:form.iblock", 
	"request_trade", 
	array(
		"IBLOCK_TYPE" => "forms",
		"IBLOCK_ID" => "10",
		"STATUS_NEW" => "NEW",
		"USE_CAPTCHA" => "N",
		"USER_MESSAGE_ADD" => GetMessage("FORM_ANSWER_RESULT"),
		"RESIZE_IMAGES" => "N",
		"MODE" => "link",
		"PROPERTY_CODES" => array(
			0 => "51",
			1 => "52",
			2 => "53",
			3 => "54",
			4 => "55",
			5 => "56",
			6 => "57",
			7 => "58",
		),
		"NAME_FROM_PROPERTY" => "56",
		"GROUPS" => array(
			0 => "2",
		),
		"MAX_FILE_SIZE" => "0",
		"EVENT_CLASS" => "bxr-trade-request",
		"BUTTON_TEXT" => "",
		"POPUP_TITLE" => GetMessage("REQUEST_TRADE"),
		"SEND_EVENT" => "KZNC_NEW_FORM_REQUEST_RESULT",
		"COMPONENT_TEMPLATE" => "request_trade",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>
        <?$APPLICATION->IncludeComponent(
	"alexkova.market:form.iblock", 
	"request_trade", 
	array(
		"IBLOCK_TYPE" => "forms",
		"IBLOCK_ID" => "8",
		"STATUS_NEW" => "NEW",
		"USE_CAPTCHA" => "N",
		"USER_MESSAGE_ADD" => GetMessage("FORM_ANSWER_RESULT"),
		"RESIZE_IMAGES" => "N",
		"MODE" => "link",
		"PROPERTY_CODES" => array(
			0 => "39",
			1 => "40",
			2 => "41",
			3 => "42",
			4 => "43",
			5 => "44",
			6 => "45",
			7 => "46",
		),
		"NAME_FROM_PROPERTY" => "44",
		"GROUPS" => array(
			0 => "2",
		),
		"MAX_FILE_SIZE" => "0",
		"EVENT_CLASS" => "bxr-one-click-buy",
		"BUTTON_TEXT" => "",
		"POPUP_TITLE" => GetMessage("ONE_CLICK_FORM_TITLE"),
		"SEND_EVENT" => "KZNC_NEW_FORM_CLICK_RESULT",
		"COMPONENT_TEMPLATE" => "request_trade",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO"
	),
	false
);?>

<script>
    jQuery(function(){
        jQuery('.bxr-indicator-item-favor').attr('title', '�������� � ���������');
        jQuery('.bxr-indicator-item-favor').attr('onclick', 'showFavorMsg()');

        jQuery('.bxr-indicator-item-favor.bxr-indicator-item-active').attr('title', '� ���������');

        jQuery('button[onclick="yaCounter36717630.reachGoal(\'ostavit_zayavku\'); return true;"]').text('�������� ������');

        jQuery('.bxr-close-basket').attr('title', '������� �� �������');
    })

    function showFavorMsg(){
        $('.favorMsgWrap').show(1000, function(){
          setTimeout(function(){
            $('.favorMsgWrap').hide(500);
          }, 5000);
        });
    }
</script>

<style>
    .newMenuWrap .container{
        background-color: white;
        padding: 5px;
    }
    
    .newMenuWrap b,  .newMenuWrap ul a{
        color: black !important;
            font-size: 13.8px !important;
    }

    .newMenuWrap ul {
        padding: 0 !important;
        list-style: none !important;
        margin: 0 !important;
        margin-top: 0px !important;
        margin-bottom: 15px !important;
    }
    
    .newMenuWrap ul li{
        margin-bottom: 8px !important;
        border-top: none !important;
    }

    .newMenuWrap ul a {
        color: inherit !important;
        padding: inherit !important;
    }

    .newMenuWrap .imgWrap {
        text-align: center;
    }

    .newMenuWrap .imgWrap img {
        margin-bottom: 5px;
    }

    .bxr-classic_hover_menu.hiddenFixed:before{
        content: none;
    }

    .bxr-classic_hover_menu.hiddenFixed ul {
        box-shadow: none;
    }
</style>

<script>
    
</script>

<style>
    .bxr-classic_hover_menu.bodyBLock{
        left: -500px !important;
    }
    
    .affix .bxr-classic_hover_menu.bodyBLock{
        left: -450px !important;
    }
    
    .bxr-classic_hover_menu.mainBLock{
        left: -115px !important;
    }
    
    .affix .bxr-classic_hover_menu.mainBLock{
        left: -75px !important;
    }
    
    .bxr-classic_hover_menu.brandBLock{
        left: -115px !important;
    }
    
    .affix .bxr-classic_hover_menu.brandBLock{
        left: -75px !important;
    }

    .bxr-classic_hover_menu.specialBlock{
        left: -300px !important;
    }
    
    .affix .bxr-classic_hover_menu.specialBlock{
        left: -250px !important;
    }

    .bxr-classic_hover_menu.makeupBlock{
        left: -695px !important;
    }
    
    .affix .bxr-classic_hover_menu.makeupBlock{
        left: -645px !important;
    }
    
    .bxr-classic_hover_menu.hairBlock{
        left: -575px !important;
    }
    
    .affix .bxr-classic_hover_menu.hairBlock{
        left: -525px !important;
    }
    
    .brandBlock.bxr-classic_hover_menu li {
        width: 100% !important;
    }

    .newMenuWrap  .container ul li a {
        color: #303030 !important;
    }
    
    .newMenuWrap  .container ul li a:hover {
        color: #f44366 !important;
    }

    .newMenuWrap .container {
        min-height: 356px;
    }

    .bxr-children-color-hover:hover > a {
        color: #f44366 !important;
    }

    .menu-arrow-top {
        border-top-color: #f44366 !important;
    }
    
    .newMenuWrap .col-md-3 {
        padding-top: 10px;
    }

    .hiddenFixed.brandBlock {
            min-width: 1170px;
    }

    .bxr-children-color > a {
    color: #f44366 !important;
}
</style>

<?php if (isset($_GET['test'])): ?>
<?
var_dump($_SESSION['FAVOR_ITEMS'])
?>	
<?php endif ?>
<script>
    $(function(){
        var favorCnt = $('.favorWrap').text();

        $('a[href="/personal/main/favor/"] img').after('<span class="favorTop">' + favorCnt + '</span>');
    })
</script>

<div class="favorMsgWrap">
    ����� ������� �������� � ���������
</div>

<style>
    .favorMsgWrap {
            width: 270px;
    height: 60px;
    padding: 10px;
    background-color: rgba(0,0,0, 0.6);
    color: white;
    text-align: center;
    position: fixed;
    right: 20px;
    top: 47px;
    z-index: 999999;
    display: none;
    }
</style>
<script type="text/javascript">
    if(document.location.pathname == "/"){
        window.vkAsyncInit = function() { 
            VK.Retargeting.Init('VK-RTRG-84381-PuBb'); 
            VK.Retargeting.Hit();
            VK.Retargeting.ProductEvent(705, "view_home");
            
        };
    };
</script>

<?php
$descArr = array(
'/catalog/base/?PAGEN_3=2' => '������� ���� �� ����� ���� ������� ���������� 5 ������: ��������, ������, ����������, ����������� ����, �������. ������ ����������� ��������� ��������� ��� ������� ����� �� ������ � ��������-�������� MaskShop � ��������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=3' => '������� ����� �������� ��������� ���������: ������, ��������, ���������, ����� � ������ ������. ������ �������� � ���������� ����������� �����������. �������� � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=4' => '���������� ������� ����� ��������� ��������� ��� ����� �� �����: ������, ��������, ���������, ����� � ������ ������. ������ �������� � ������� ������������. ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=5' => '�������� ����� �������� ��������� ���������: ������, ��������, ���������, ����� � ������ ������. ���������������� ������ � ������� ������������. �������� � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=6' => '�������� ����� ��������� ��������� ��� ����� �� �����: ������, ��������, ���������, ����� � ������ ������. ������ �������� � ���������� �����������. ������ � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=7' => '������� ����� �������� ��������� ���������: ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ������ �������� � ���������� ����������� � �������. �������� � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=8' => '���������� ������� ����� ��������� ��������� ��� ����� �� �����: ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ������ �������� � ���������� ����������� �����������. ������ � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=9' => '�������� ����� �������� ��������� ���������: ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ������ �������� � ������� ������������. �������� � ��������� �� ��� ������� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=10' => '�������� ����� ��������� ��������� ��� ����� �� �����: ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ���������������� ������ � ������� ������������. ������ � ��������� �� ��� ������� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=11' => '������� ����� �������� ��������� ���������: ��������, ��������, �����, ���������, ����� � ������ ��������. ������ �������� � ���������� �����������. �������� � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=12' => '���������� ������� ����� ��������� ��������� ��� ����� �� �����: ��������, ��������, �������, �����, ���������, ����� � ������ ��������. ������ �������� � ���������� ����������� � �������. ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=13' => '�������� ����� �������� ��������� ���������: ��������, ��������, �����, ���������, ����� � ������ ��������. ������ �������� � ���������� ����������� �����������. �������� � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=14' => '�������� ����� ��������� ��������� ��� ����� �� �����: ��������, ��������, �����, ���������, ����� � ������ ��������. ������ �������� � ������� ������������. ������ � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=15' => '���������� �������� ����� �������� ��������� �� �����: ������, ��������, ���������, ����� � ������ ������. ���������������� ������ � ������� ������������. �������� � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=16' => '���������� �������� ����� �������� ��������� �� �����: ������, ��������, ���������, ����� � ������ ������. ������ �������� � ���������� �����������. ������ � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=17' => '���������� �������� ����� �������� ��������� �� �����: ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ������ �������� � ���������� ����������� � �������. �������� � ��������� �� ��� ������� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=18' => '���������� �������� ����� �������� ��������� �� �����: ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ������ �������� � ���������� ����������� �����������. ������ � ��������� �� ��� ������� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=19' => '���������� �������� ����� ����������� ��������� ��������� ��� ����� �� �����: ��������, ��������, �����, ���������, ����� � ������ ��������. ������ �������� � ������� ������������. �������� � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=20' => '���������� �������� ����� ����������� ��������� ��������� ��� ����� �� �����: ��������, ��������, �����, ���������, ����� � ������ ��������. ���������������� ������ � ������� ������������. ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=21' => '���������� �������� ����� ����������� ��������� ��������� ��� ����� �� �����: ��������, ��������, �����, ���������, ����� � ������ ��������. ������ �������� � ���������� �����������. �������� � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=22' => '���������� �������� ����� ����������� ��������� ��������� ��� ����� �� �����: ��������, ��������, �����, ���������, ����� � ������ ��������. ������ �������� � ���������� ����������� � �������. ������ � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=23' => '���������� ���������� ����� ��������� ��������� ��� ����� �� �����: ������, ��������, ���������, ����� � ������ ������. ������ �������� � ���������� �����������. �������� � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=24' => '���������� ���������� ����� ��������� ��������� ��� ����� �� �����: �����, ��������, ��������, ����� ��� ����, ���������, ����� � ������ ��������. ������ �������� � ���������� ����������� � �������. ������ � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=25' => '���������� ������� ����� ��������� ��������� ��� ����� �� �����: ������������ �����, �������, ����� ��� ����, �����, ���������, ����� � ������ ������. ���������������� ������ � ������� ������������. �������� � ��������� �� ��� ������� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=26' => '������� ����� �������� ��������� ���������: ����������� ����, ������������ �����, ������, ��������, ��������� � ������ ������. ������ �������� � ���������� ���������� � �������. ������ � ��������� �� ��� ������� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=27' => '���������� ������� ����� ��������� ��������� ��� ����� �� �����: ������, ��������, ����������� ����, �������, ���������, ����� � ������ ������. ������ �������� � ������� ������������. �������� � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=28' => '�������� ����� �������� ��������� ���������: �����, ������, ������, ��������, ���������, ����� � ������ ������. ���������������� ������ � ������� ������������. ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=29' => '�������� ����� ��������� ��������� ��� ����� �� �����: ������, �������, ������, ��������, ���������, ����� � ������ ������. ������ �������� � ���������� �����������. �������� � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=30' => '���������� ������� ����� ��������� ��������� ��� ����� �� �����: �������, ����������� ����, ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ������ �������� � ���������� ����������� �����������. ������ � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=31' => '�������� ����� �������� ��������� ���������: ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ������ ��������, ���������� ���������� � ������� ������������. �������� � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=32' => '�������� ����� ��������� ��������� ��� ����� �� �����: ����� ��� ����, �����, ���������, ����� � ����� � ������ ������. ������ ��������, ���������� ���������� � ������� ������������. ������ � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=33' => '�������� ����� �������� ��������� ���������: ��������, ��������, ����� ��� ���� � ���, ���������, ����� � ������ ��������. ������ ��������, ���������� ���������� � ������� ������������. �������� � ��������� �� ��� ������� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=34' => '�������� ����� ��������� ��������� ��� ����� �� �����: ��������, ��������, �����, �����, ���������, ����� � ������ ��������. ������ ��������, ���������� ���������� � ������� ������������. ������ � ��������� �� ��� ������� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=35' => '���������� �������� ����� �������� ��������� �� �����: ������, ��������, ��������, �����, ���������, ����� � ������ ��������. ������ ��������, ���������� ���������� � ������� ������������. �������� � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=36' => '���������� �������� ����� �������� ��������� �� �����: ��������, ��������, �����, ������������ �����, ���������, ����� � ������ ��������. ������ ��������, ���������� ���������� � ������� ������������. ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/base/?PAGEN_3=37' => '���������� �������� ����� �������� ��������� �� �����: ������, ��������, ������, ���������, �����, ����� � ������ ������. ���������������� ������ � ������� ������������. �������� � ��������� �� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=2' => '���� � ���������������� ������� ������� �����. ������� ����� ����������� ��������� ��������� ��� ������ � ����, ������� �������, ���������, ��������������� ����������� � ��������-�������� MaskShop. �������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=3' => '���� � ���������������� ������� ������������ �����. ������� ����� ����������� ��������� ��������� ��� ������ � ������������ ������, ����, ������� �������, ������� ������� � ��������������� ����������� � ��������-�������� MaskShop. �������� �� ������ � ���� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=4' => '���� � ���������������� ��������� ������ ����. �������� ����� ��������� ��������� ��� ������ � ����, ������� �������, ���������, ��������������� ����������� � ��������-�������� MaskShop. �������� �� ��� ������� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=5' => '���� � ���������������� ������� ������� �����. ������� ����� ��������� ��������� � ����������� ���������� ������������: ����, ��������� ������, �������� ���, ��������� � ��������-�������� MaskShop. �������� �������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=6' => '���� � ���������������� ������� ������������ �����. �������� ����������� ��������� ��������� � ���������� ������, ���������, ������� ����, ������������ �������� � ��������-�������� MaskShop. �������������� �������� �� ��� ������� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=7' => '���� � ���������������� ��������� ������ ����. �������� ��������� ��������� � ������������ ������������ � �������, �� �������� �������� � ���� � ��������-�������� MaskShop. �������������� �������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=8' => '��� ������ � ���������������� ��������� ����������� ����. ����������� ��������� ��������� ��� �����, ������, ��������������, ��������������� ���� � ��������-�������� MaskShop. �������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=9' => '��� ������ � ���������������� ��������� ������ ����. ����������� ��������� ��������� ��� ������, ��������������, �����, ��������������� ���� � ��������-�������� MaskShop. �������� �� ������ � ���� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=10' => '��� ������ � ���������������� ��������� ����������� ����. ������� ����� ����������� ��������� ��������� ��� �����, ������, ��������������, ��������������� ���� � ��������-�������� MaskShop. �������� �� ��� ������� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=11' => '��� ������ � ���������������� ��������� ������ ����. �������� ����� ����������� ��������� ��������� ��� �����, ������, ��������������, ��������������� ���� � ��������-�������� MaskShop. �������� �������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=12' => '��� ������ � ���������������� ��������� ����������� ����. �������� ����������� ��������� ��������� � ������������ ��������, ����������, ���������� ������, ���������, ������� ���� �� ����� ��������-�������� MaskShop. �������������� �������� �� ��� ������� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=13' => '��� ������ � ���������������� ��������� ������ ����. �������� ��������� ��������� � ������������ ������������ � �������, �� �������� ��������, � ��������-�������� MaskShop. �������������� �������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=14' => '���� � ���������������� ������� ������������ �����. ��������� ��������� � ������� ������, ���������, ���������� ����, ����������, ������� ���� � ������� ����������� ������������ � ��������-�������� MaskShop. �������� �������� �� ��� ������� ������: 8 (800) 200-04-66',
'/catalog/special/?PAGEN_3=15' => '���� � ���������������� ��������� ������ ����. ����������� ��������� ��������� � ������������ ��������, ���������, ������� ������, ���������, ����������, ������� ���� � ������� ����������� ������������� � ��������-�������� MaskShop. �������� �� ������ � ���� ������: 8 (800) 200-04-66',
'/catalog/accessories/?PAGEN_3=2' => '������� ����� ����������� ��� ��������� ���������: ������� ��� ��������� ����, ���� ��� ������������ �����, ��������� ������, ������ � ������ ������. ������ ��� ����������� ��� �������� ���������� ������� � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/telo/?PAGEN_3=2' => '�������� ����� ��������� ������� �� ����� �� �����: �����, ������, �������, ����, �����, �����. �������������� ������ � ������� ���� ����. �������� � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/telo/?PAGEN_3=3' => '���������� ������� ����� ��������� ��������� �� ����� �� ����� ����: ���, ���, ���, �����. ������, �����, �����, ������� � ������ ������ � ��������� �� ��� ������� ������. ������� ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/telo/?PAGEN_3=4' => '���������� �������� ����� ��������� ��������� �� ����� �� ����� ����. ������, ����, �����, �����, ������� � ������ ������ � ��������� �� ���� ������. ������� ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/telo/?PAGEN_3=5' => '������� ����� ��������� ��������� �� ����� �� ����� ����: �����, �����, �����, ������� � ������ �������� � �����������, ��������������, �����������, ���������� ��������. �������� � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/telo/?PAGEN_3=6' => '�������� ����� ��������� ������� �� ����� �� ����� ����: ������, ����, �����, �����, �������, �����. �������� � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/telo/?PAGEN_3=7' => '������� ����� ��������� ��������� �� ����� �� �����: �����, �����, �������, ����, ������. �������������� ������ � ������� ���� ���� � ���������� ����������� � �������. �������� � ��������� �� ���� ������ � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/makiyazh/?PAGEN_3=2' => '�������� ����� ������������ ��������� ��������� ��� ���, ����, ������ � ������ �������. ������������ �������, ����������� ������� � ������� �������� ������������� ���������. �������� � ��������-�������� MaskShop � ��������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/makiyazh/?PAGEN_3=3' => '��������� ��������� ��� ������� - ������ ����� ��� ���������� ������! ��� �� ������ ��������� �������, �� � ��������� � �������� ���� ����. �������� � ��������-�������� MaskShop � ��������� �� ������ � ������: 8 (800) 200-04-66',
'/catalog/makiyazh/?PAGEN_3=4' => '���������� ������� ����� ������������ ��������� ��������� ��� ���, ����, ������ � ������ �������. ����������� ������� � ������� �������� ������������� ���������. �������� �������� �� ���� ������. �������� � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/makiyazh/?PAGEN_3=5' => '���������� ������� ����� ������������ ��������� ���������� ������������ ��� ���, ����, ������ � ������ �������. ����������� ���������� � ������� � ������� �������� ������������� ���������. �������� �������� �� ���� ������. �������� � ��������-�������� MaskShop: 8 (800) 200-04-66',
'/catalog/makiyazh/?PAGEN_3=6' => '��������-������� MaskShop ���������� ������� ����� ������������ ��������� �� ����� ��� ���, ����, ������ � ������ �������. ������� �������� � ����������� ����������� � �������. �������� �������� �� ���� ������. �������: 8 (800) 200-04-66',
'/catalog/makiyazh/?PAGEN_3=7' => '������������ ��������� ��������� �������� �� ������ ������� ��������� �����, �� � ��������� ������� � ���� ���� ����. ������������ ������� � ���������� ����������� � �������. �������� � ��������-�������� MaskShop � ��������� �� ���� ������: 8 (800) 200-04-66',
'/catalog/volosy/?PAGEN_3=2' => '��������� ��������� ��� ���� ����� �����: ����������� ������� � ���������, �������, ��������, ���������, ����������������� ����� � ������ ������. �������� � ��������-�������� MaskShop � ��������� �� ������ � ������: 8 (800) 200-04-66',
'/catalog/volosy/?PAGEN_3=3' => '������� ����� ��������� ������� �� ����� �� ��������: �������, ��������, ��������, ���������-����, ����� � ������ ������. �������� ��������� � ��������-�������� MaskShop � ��������� �� ������ � ������: 8 (800) 200-04-66',
'/catalog/volosy/?PAGEN_3=4' => '��������-������� MaskShop ���������� ������� ����� ��������, ���������, ���������, �������� � ������ ��������� ������� �� ����� �� ��������. ���������� ����������� ����������� � �������. �������� �������� �� ���� ������. �������: 8 (800) 200-04-66',
'/catalog/volosy/?PAGEN_3=5' => '��������-������� MaskShop ���������� ������� ����� ��������� ������� �� ����� �� ��������: ��������, ����������, �������, ��������������. ���������� ����������� ����������� � �������. �������� � ��������� �� ���� ������. �������: 8 (800) 200-04-66',
);


if (!empty($descArr[$_SERVER['REQUEST_URI']])) {
    $APPLICATION->SetPageProperty('description', $descArr[$_SERVER['REQUEST_URI']]);
}

?>
    </body>
</html>