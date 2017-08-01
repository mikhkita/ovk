<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

foreach ($arResult["ITEMS"] as $i => $arItem){
	$arr = explode(".", $arItem["PROPERTIES"]["DATE"]["VALUE"]);

	$arResult["ITEMS"][$i]["PROPERTIES"]["DATE"]["VALUE"] = $arr[0]." ".getRusMonth(intval($arr[1]))." ".$arr[2];
}

?>