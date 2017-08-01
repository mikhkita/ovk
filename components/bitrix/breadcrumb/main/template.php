<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/**
 * @global CMain $APPLICATION
 */		

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$out = '<ul class="b-breadcrumbs clearfix">';

foreach ($arResult as $key => $item) {
	if($key == count($arResult)-1){
		$out .= '<li><span>'.$item["TITLE"].'</span></li>';
	}else{
		$out .= '<li><a href="'.$item["LINK"].'" >'.$item["TITLE"].'</a></li>';
	}
}

$out .= '</ul>';

?>
<? return $out; ?>
