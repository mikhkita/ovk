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

if( $arResult["PROPERTIES"]["DOCTOR"]["VALUE"] )
	$GLOBALS["SPECIALISTS"] = $arResult["PROPERTIES"]["DOCTOR"]["VALUE"];

$arWaterMark = Array(
    array(
        "name" => "watermark",
        "position" => "bottomright", // Положение
        "type" => "image",
        "size" => "real",
        "file" => $_SERVER["DOCUMENT_ROOT"].'/upload/copy-big.png', // Путь к картинке
        "fill" => "exact",
        "alpha_level" => "70"
    )
);

if( $arResult["PREVIEW_PICTURE"] ){
	$beforeImage = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], Array("width" => 365, "height" => 165), BX_RESIZE_IMAGE_EXACT );
	$afterImage = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], Array("width" => 365, "height" => 165), BX_RESIZE_IMAGE_EXACT );
	$beforeBigImage = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], Array("width" => 2560, "height" => 2560), BX_RESIZE_IMAGE_PROPORTIONAL, true, $arWaterMark );
}else{
	$afterImage = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], Array("width" => 365, "height" => 330), BX_RESIZE_IMAGE_EXACT );
}
$afterBigImage = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], Array("width" => 2560, "height" => 2560), BX_RESIZE_IMAGE_PROPORTIONAL, true, $arWaterMark );

?>

<div class="service-text left">
	<div class="b-text">
		<h1><?=$arResult["NAME"]?></h1>
		<div class="work-detail b-mobile-only right">
			<? if( $arResult["PREVIEW_PICTURE"] ): ?>
				<div class="before" data-fancybox-href="<?=$beforeBigImage["src"]?>" data-fancybox-group="fancy-img" style="background-image: url('<?=$beforeImage["src"]?>');"></div>
			<? endif; ?>
			<div class="after" data-fancybox-href="<?=$afterBigImage["src"]?>" data-fancybox-group="fancy-img" style="background-image: url('<?=$afterImage["src"]?>');"></div>
		</div>
		<?=preg_replace("#(<[^\/]>\s*<\/.+?>)#uis", "", $arResult["DETAIL_TEXT"])?>
	</div>
</div>
<div class="work-detail b-not-mobile stick right">
	<? if( $arResult["PREVIEW_PICTURE"] ): ?>
		<div class="before fancy-img" data-fancybox-href="<?=$beforeBigImage["src"]?>" data-fancybox-group="fancy-img" style="background-image: url('<?=$beforeImage["src"]?>');"></div>
	<? endif; ?>
	<div class="after fancy-img" data-fancybox-href="<?=$afterBigImage["src"]?>" data-fancybox-group="fancy-img" style="background-image: url('<?=$afterImage["src"]?>');"></div>
</div>