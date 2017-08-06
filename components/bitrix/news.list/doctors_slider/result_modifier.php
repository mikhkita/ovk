<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$end = array();
$start = array();
$tog = false;

foreach ($arResult["ITEMS"] as $i => $arItem){
	if( $tog === true ){
		array_push($start, $arItem);
	}else if( $arItem["CODE"] != $_REQUEST["ELEMENT_CODE"] ){
		array_push($end, $arItem);
	}else{
		array_push($start, $arItem);
		$tog = true;
	}
}

$arResult["ITEMS"] = array_merge($start, $end);

?>