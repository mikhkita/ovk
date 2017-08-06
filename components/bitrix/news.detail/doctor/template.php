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

$renderImage = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"], Array("width" => 1400, "height" => 1000), BX_RESIZE_IMAGE_PROPORTIONAL_ALT );

// $renderImageMobile = CFile::ResizeImageGet($arResult["PREVIEW_PICTURE"], Array("width" => 750, "height" => 750), BX_RESIZE_IMAGE_EXACT );

?>

<div class="doctor-img doctor-img-<?=$arResult["ID"]?>" style="background-image: url('<?=$renderImage["src"]?>');" ></div>
<div class="b-doctor-post"><?=$arResult["PROPERTIES"]["SPEC"]["VALUE"]?></div>
<?=preg_replace("#(<[^\/]>\s*<\/.+?>)#uis", "", $arResult["DETAIL_TEXT"])?>