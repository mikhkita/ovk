<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

$GLOBALS["SPECIALISTS"] = $arResult["PROPERTIES"]["SPECIALISTS"]["VALUE"];

$items1 = CIBlockSection::GetList(array("sort"=>"asc"), array('IBLOCK_ID'=>1, 'GLOBAL_ACTIVE'=>'Y', 'ID' => $arResult["IBLOCK_SECTION_ID"]));
$arSec = $items1->GetNext();

$APPLICATION->SetPageProperty("canonical", "http://".$_SERVER["HTTP_HOST"]."/services/".$_GET["PARENT_CODE"]."/".$arSec["CODE"]."/".$arResult["CODE"]."/");

?>
<?=preg_replace("#(<[^\/]>\s*<\/.+?>)#uis", "", $arResult["DETAIL_TEXT"])?>
<div class="b-back-link">
	<a href="/services/">Вернуться к списку услуг</a>
</div>