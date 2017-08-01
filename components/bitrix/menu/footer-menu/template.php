<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?

$rows = 4;

$ul = 1;

?>

<ul class="left clearfix b-footer-ul-<?=$ul?>">
	<?foreach($arResult as $key => $arItem):?>
		<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
		<? if( ($key+1) % $rows == 0 ): ?>
			</ul>
			<? if($key+1 != count($arResult)): ?>
				<? $ul++; ?>
				<ul class="left b-footer-ul-<?=$ul?>">
			<? endif; ?>
		<? endif; ?>
	<? endforeach; ?>
</ul>
