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

// $_GET["PAGEN_1"] = !isset($_GET["PAGEN_1"]) ? 1 : $_GET["PAGEN_1"];

// $isLast = ( intval($_GET["PAGEN_1"]) == intval($arResult["NAV_RESULT"]->NavPageCount) );
// var_dump($isLast);

?>
<? if(count($arResult["ITEMS"])): ?>
	<div class="b-doctors-cont">
		<div class="b-doctors">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<? $pngImage = CFile::ResizeImageGet($arItem["PROPERTIES"]["PNG"]["VALUE"], Array("width" => 670, "height" => 670), BX_RESIZE_IMAGE_PROPORTIONAL ); ?>
				<? $pngBigImage = CFile::ResizeImageGet($arItem["PROPERTIES"]["PNG"]["VALUE"], Array("width" => 1340, "height" => 1340), BX_RESIZE_IMAGE_PROPORTIONAL ); ?>
				<? $pngBlurImage = CFile::ResizeImageGet($arItem["PROPERTIES"]["PNG_BLUR"]["VALUE"], Array("width" => 670, "height" => 670), BX_RESIZE_IMAGE_PROPORTIONAL ); ?>
				<div class="b-doctor" data-text="#b-doctor-text-<?=$arItem["ID"]?>">
					<div class="b-img" style="background-image: url('<?=$pngImage['src']?>');" data-big="<?=$pngBigImage['src']?>"></div>
					<div class="b-img-blur" style="background-image: url('<?=$pngBlurImage['src']?>');"></div>
				</div>
			<?endforeach;?>
		</div>
		<div class="b-doctors-text">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<div class="b-doctor-text" id="b-doctor-text-<?=$arItem["ID"]?>">
					<h3><?=$arItem["NAME"]?></h3>
					<div class="b-doctor-post"><?=$arItem["PROPERTIES"]["SPEC"]["VALUE"]?></div>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="b-btn b-green-btn"><span>Подробнее</span></a>
				</div>
			<?endforeach;?>
		</div>
	</div>
<? endif; ?>