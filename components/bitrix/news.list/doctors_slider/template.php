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
	<h2 class="b-title"><?=includeArea("main-team-title")?></h2>
	<div class="b-doc-slider">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<? $arImage = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"], Array("width" => 552, "height" => 552), BX_RESIZE_IMAGE_EXECUTE ); ?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			$isActive = $_REQUEST["ELEMENT_CODE"] == $arItem["CODE"];
			?>
			<a href='<?=$arItem["DETAIL_PAGE_URL"]?>' class="b-doc<? if($isActive): ?> active<? endif; ?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="b-img"><span style="background-image: url('<?=$arImage["src"]?>');"></span></div>
				<h3><?=$arItem["NAME"]?></h3>
				<div class="b-doctor-post"><?=$arItem["PROPERTIES"]["SPEC"]["VALUE"]?></div>
			</a>
		<?endforeach;?>
	</div>
<? endif; ?>