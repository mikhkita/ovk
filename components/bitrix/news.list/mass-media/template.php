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
?>
<div class="b-recommendations clearfix">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<? $arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 552, "height" => 552), BX_RESIZE_IMAGE_EXECUTE ); ?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="b-recommendation" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="b-img" style="background-image: url('<?=$arImage["src"]?>'); height: 276px;"></div>
			<div class="b-recommendation-text">
				<h3><?=$arItem["NAME"]?></h3>
				<p><?=$arItem["PREVIEW_TEXT"]?></p>
				<a href="<?=$arItem['DETAIL_PAGE_URL']?>" class="b-green-btn b-btn"><span>Подробнее</span></a>
			</div>
		</div>
	<?endforeach;?>
</div>
