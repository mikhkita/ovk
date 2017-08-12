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
<? if(count($arResult["ITEMS"])): ?>
	<div class="<?=$arParams["CLASS_NAME"]?> clearfix">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<? $arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 352, "height" => 352), BX_RESIZE_IMAGE_EXECUTE ); ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="b-review" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="b-img" style="background-image: url('<?=$arImage["src"]?>')"></div>
				<h3><?=$arItem["NAME"]?></h3>
				<div class="b-review-date"><?=$arItem["PROPERTIES"]["DATE"]["VALUE"]?></div>
				<p><?=$arItem["PREVIEW_TEXT"]?></p>
				<a href="#b-popup-review-<?=$arItem["ID"]?>" class="b-link <?=$arParams["FANCY_CLASS"]?>">Читать полностью</a>
			</div>
		<?endforeach;?>
	</div>
	<div style="display:none;">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<? $arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 352, "height" => 352), BX_RESIZE_IMAGE_EXECUTE ); ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="b-popup b-popup-dark-btn" id="b-popup-review-<?=$arItem["ID"]?>">
				<div class="b-review clearfix" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
					<div class="b-review-left left">
						<div class="b-img" style="background-image: url('<?=$arImage["src"]?>')"></div>
					</div>
					<div class="b-review-right left">
						<h3><?=$arItem["NAME"]?></h3>
						<div class="b-review-date"><?=$arItem["PROPERTIES"]["DATE"]["VALUE"]?></div>
						<p><?=$arItem["PREVIEW_TEXT"]?></p>
					</div>
				</div>
			</div>
		<?endforeach;?>
	</div>
<? endif; ?>