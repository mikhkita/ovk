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

?>
<? $renderImage = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], Array("width" => 700, "height" => 700), BX_RESIZE_IMAGE_EXACT ); ?>
<div class="b-action clearfix">
	<div class="left b-stick stick">
		<img class="b-action-img" src="<?=$renderImage["src"]?>"/>
	</div>
	<div class="right b-action-text">
		<?=preg_replace("#(<[^\/]>\s*<\/.+?>)#uis", "", $arResult["DETAIL_TEXT"])?>	
	</div>
</div>
<div class="b-back-link">
	<a href="/actions/">Вернуться к списку акций</a>
</div>