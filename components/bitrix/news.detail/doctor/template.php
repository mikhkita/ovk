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

$GLOBALS["SECTION"] = $arResult["IBLOCK_SECTION_ID"];
$GLOBALS["ELEMENT"] = $arResult["ID"];

$renderImage = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], Array("width" => 750, "height" => 1000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT );

$renderImageMobile = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], Array("width" => 750, "height" => 750), BX_RESIZE_IMAGE_EXACT );

?>

<img class="left doctor-img" src="<?=$renderImage["src"]?>" title="<?=$arResult["NAME"]?> COSMODENT" alt="<?=$arResult["NAME"]?>">
<div class="text right">
	<h1 class="title"><?=$arResult["NAME"]?></h1>
	<h3><?=$arResult["PROPERTIES"]["SPEC"]["VALUE"]?></h3>
	<? if( $arResult["IBLOCK_SECTION_ID"] != 14 ): ?>
		<button class="btn btn-brown fancy" data-block="#b-popup-rec" data-name="<?=$arResult["NAME"]?>" data-beforeShow="doctor_rec">Записаться на прием</button>
	<? endif; ?>
	<img class="b-mobile-image" src="<?=$renderImageMobile["src"]?>">
	<div class="b-text">
		<?=preg_replace("#(<[^\/]>\s*<\/.+?>)#uis", "", $arResult["DETAIL_TEXT"])?>
	</div>
	<? if( $arResult["PROPERTIES"]["SERT"]["VALUE"] ): ?>
	<a href="#" class="b-sert-button link">Посмотреть сертификаты</a>
	<div class="b-sert">
		<? foreach ($arResult["PROPERTIES"]["SERT"]["VALUE"] as $key => $sert): ?>	
		<? $renderImage = CFile::ResizeImageGet($sert, Array("width" => 2560, "height" => 1600), BX_RESIZE_IMAGE_PROPORTIONAL_ALT ); ?>
		<a href="<?=$renderImage["src"]?>" class="fancy-img" rel="one"></a>
		<? endforeach; ?>
	</div>
	<? endif; ?>
</div>