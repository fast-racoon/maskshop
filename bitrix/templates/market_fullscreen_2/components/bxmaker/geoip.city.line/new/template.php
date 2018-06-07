<?    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

	use Bitrix\Main\Localization\Loc as Loc;


	$this->setFrameMode(true);

	$randString = $this->randString();
	$BXMAKER_COMPONENT_NAME = 'BXMAKER.GEOIP.CITY.LINE';

	$oManager = \Bxmaker\GeoIP\Manager::getInstance();

?>


<div class="bxmaker__geoip__city__line  bxmaker__geoip__city__line--default js-bxmaker__geoip__city__line"
	 id="bxmaker__geoip__city__line-id<?=$randString;?>"
	 data-question-show="<?=$arParams['QUESTION_SHOW'];?>"
	 data-info-show="<?=$arParams['INFO_SHOW'];?>"
	 data-debug="<?=$arResult['DEBUG'];?>"
     data-subdomain-on="<?= $arParams['SUBDOMAIN_ON']; ?>"
     data-base-domain="<?= $arParams['BASE_DOMAIN']; ?>"
     data-cookie-prefix="<?= $arParams['COOKIE_PREFIX']; ?>"
	 data-fade-timeout="200"
	 data-tooltip-timeout="500"
	 data-key="<?=$randString;?>" >

	<div class="bxmaker__geoip__city__line-context js-bxmaker__geoip__city__line-context">
		<span class="bxmaker__geoip__city__line-name js-bxmaker__geoip__city__line-name js-bxmaker__geoip__city__line-city" style=" color: #000; vertical-align: middle; text-decoration: none; font-size: 13px; margin: 0 8px 0 5px; border-bottom: none;"><?=$oManager->getFirstNotEmpty(array($arResult['CITY_DEFAULT'], Loc::getMessage($BXMAKER_COMPONENT_NAME . 'CITY_DEFAULT') ));?></span>


		<div class="bxmaker__geoip__city__line-question js-bxmaker__geoip__city__line-question">
			<div class="bxmaker__geoip__city__line-question-text">
				<?= preg_replace('/#CITY#/','<span class="js-bxmaker__geoip__city__line-city">'.$arResult['CITY_DEFAULT'].'</span>', $arParams['~QUESTION_TEXT']);?>
			</div>
			<div class="bxmaker__geoip__city__line-question-btn-box">
				<div class="bxmaker__geoip__city__line-question-btn-no js-bxmaker__geoip__city__line-question-btn-no"><?= Loc::getMessage($BXMAKER_COMPONENT_NAME . 'BTN_NO'); ?></div>
				<div class="bxmaker__geoip__city__line-question-btn-yes js-bxmaker__geoip__city__line-question-btn-yes"><?= Loc::getMessage($BXMAKER_COMPONENT_NAME . 'BTN_YES'); ?></div>
			</div>
		</div>

		<div class="bxmaker__geoip__city__line-info js-bxmaker__geoip__city__line-info">
			<div class="bxmaker__geoip__city__line-info-content">
				<?=$arParams['~INFO_TEXT'];?>
			</div>
			<div class="bxmaker__geoip__city__line-info-btn-box">
				<div class="bxmaker__geoip__city__line-info-btn js-bxmaker__geoip__city__line-info-btn"><?=$arParams['~BTN_EDIT'];?></div>
			</div>
		</div>

	</div>

	<span class="bxmaker__geoip__city__line-label"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 20px;position: absolute; margin: 2px -4px; color: #737373;"></i>&nbsp;<?//=$arParams['~CITY_LABEL'];?></span>

</div>
