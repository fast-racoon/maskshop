<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
if (!CModule::IncludeModule('alexkova.bxready')) return;
use Alexkova\Bxready\Draw;

global $APPLICATION;
if (isset($templateData['TEMPLATE_THEME']))
{
	$APPLICATION->SetAdditionalCSS($templateData['TEMPLATE_THEME']);
}
CJSCore::Init(array("popup"));

$elementDraw = \Alexkova\Bxready\Draw::getInstance();
$elementDraw->setCurrentTemplate($this->__template);
$elementDraw->showElement($arParams["BXREADY_ELEMENT_DRAW"], $arItem, $arParams, true);

global $bxreadyMarkers;

if (isset($bxreadyMarkers) && strlen($bxreadyMarkers)>0)
	$elementDraw->setMarkerCollection($bxreadyMarkers);
$elementDraw->showMarkerGroup(array(), true);
?>