<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<? 

$prevLevel = 1;

?>
<?if (!empty($arResult)):?>
	<ul class="<?=$arParams["CLASS"]?>">
		<?
		foreach($arResult as $i => $arItem):
		?>
			<? if($arItem["DEPTH_LEVEL"] < $prevLevel): ?>
				<? if( $prevLevel - $arItem["DEPTH_LEVEL"] == 2): ?>
					</ul></li></ul></li>
				<? else: ?>
					</li></ul>
				<? endif; ?>
			<? endif; ?>
			<? if($arItem["DEPTH_LEVEL"] > $prevLevel): ?>
				<ul class="header_dropdown_menu">
			<? elseif( $i != 0 ): ?>
				</li>
			<? endif; ?>
			<?if($arItem["SELECTED"]):?>
				<li class="active"><a href="<?=$arItem["LINK"]?>" class="active"><?=$arItem["TEXT"]?></a>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
			<?endif?>

			<? $prevLevel = $arItem["DEPTH_LEVEL"]; ?>
		<?endforeach?>
				</li>
			</ul>
		</li>
	</ul>
<?endif?>