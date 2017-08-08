<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
// $wizTemplateId = COption::GetOptionString("main", "wizard_template_id", "eshop_adapt_horizontal", SITE_ID);
CJSCore::Init(array("fx"));

$curPage = $APPLICATION->GetCurPage();
$urlArr = explode("/", $curPage);
$GLOBALS["isMain"] = $isMain = ( $curPage == "/" )?true:false;
$page = $GLOBALS["page"] = ( $urlArr[2] == null || $urlArr[2] == "" )?$urlArr[1]:$urlArr[2];
$subPage = $urlArr[2];
$GLOBALS["version"] = 1;

$is404 = defined('ERROR_404') && ERROR_404=='Y' && !defined('ADMIN_SECTION');

$isDoctor = ($urlArr[1] == "doctors" && isset($urlArr[3]))?true:false;

if( $isDoctor ){
	$doctor = getDoctor();
}

$arPage = ( isset($arPages[$urlArr[2]]) )?$arPages[$urlArr[2]]:$arPages[$urlArr[1]];

$notBText = $GLOBALS["notBText"] = (in_array($page, array("reviews", "about", "questions", "services", "doctors", "actions", "works", "search", "contacts")))?true: false;

?><!DOCTYPE html>
<html>
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta name="format-detection" content="telephone=no">

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/reset.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/jquery.fancybox.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/KitAnimate.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/component.css" type="text/css">
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/slick.css" type="text/css">
	<!-- <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/menu_cornerbox_nested.css" type="text/css"> -->
	<link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/css/layout.css" type="text/css">
	<link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">

	<link rel="stylesheet" media="screen and (min-width: 1000px) and (max-width: 1240px)" href="/bitrix/templates/main/css/layout-tablet.css?<?=$GLOBALS["version"]?>" />
	<link rel="stylesheet" media="screen and (min-width: 600px) and (max-width: 999px)" href="/bitrix/templates/main/css/layout-small-tablet.css?<?=$GLOBALS["version"]?>" />
	<link rel="stylesheet" media="screen and (min-width: 240px) and (max-width: 599px)" href="/bitrix/templates/main/css/layout-mobile.css?<?=$GLOBALS["version"]?>" />

	<link rel="apple-touch-icon-precomposed" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-57x57.png" />
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-114x114.png" />
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-72x72.png" />
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-144x144.png" />
	<link rel="apple-touch-icon-precomposed" sizes="60x60" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-60x60.png" />
	<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-120x120.png" />
	<link rel="apple-touch-icon-precomposed" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/favicon/apple-touch-icon-76x76.png" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-32x32.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-16x16.png" sizes="16x16" />
	<link rel="icon" type="image/png" href="<?=SITE_TEMPLATE_PATH?>/favicon/favicon-128.png" sizes="128x128" />
	<meta name="application-name" content="«Клиника Восстановительной Ортопедии»"/>
	<meta name="msapplication-TileColor" content="#" />
	<meta name="msapplication-TileImage" content="<?=SITE_TEMPLATE_PATH?>/favicon/mstile-144x144.png" />
	<meta name="msapplication-square70x70logo" content="<?=SITE_TEMPLATE_PATH?>/favicon/mstile-70x70.png" />

	<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
	<?$APPLICATION->ShowHead();?>
</head>
<body>
<?$APPLICATION->ShowPanel();?>
	<div id="perspective" class="perspective effect-moveleft">
		<div class="b-top-fixed"<? if($isDoctor): ?> style="background-image: url('<?=$doctor["IMAGE"]?>');"<? endif; ?>></div>
		<div class="b-top-menu">
			<div class="b-wide-block">
				<div class="b-block clearfix">
					<div class="b-top-table">
						<div class="b-logo-cont">
							<a href="/" class="b-logo left">
								<span class="b-img"></span>
								<span class="b-txt"></span>
							</a>
						</div>
						<div class="b-menu-table-cell">
							<div class="b-menu-cont">
								<div class="b-line"></div>
								<?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
									"COMPONENT_TEMPLATE" => ".default",
										"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
										"MENU_CACHE_TYPE" => "N",	// Тип кеширования
										"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
										"MENU_CACHE_USE_GROUPS" => "N",	// Учитывать права доступа
										"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
											0 => "",
										),
										"MAX_LEVEL" => "1",	// Уровень вложенности меню
										"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
										"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
										"DELAY" => "N",	// Откладывать выполнение шаблона меню
										"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
										"CLASS" => "b-menu clearfix"
									),
									false
								);?>
							</div>
						</div>
						<div class="b-phone-cont">
							<div class="b-phone-wrap">
								<div class="b-phone"><?=includeArea("phone")?></div>
								<a href="#" class="b-btn b-white-btn"><span>Записаться на прием</span></a>
								<a href="#" class="b-burger icon-menu" id="showMenu"></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="wrapper content-wrap"><!-- wrapper needed for scroll -->
				<div class="b b-header<? if( $isMain ): ?> b-header-main<? endif; ?>">
					<? if( $isMain ): ?>
					<div class="b-wide-block b-header-block">
						<div class="b-block">
							<div class="b-main-header">
								<div class="b-main-header-wrap">
									<h1><?=includeArea("h1")?></h1>
									<?=includeArea("header-a")?>
								</div>
							</div>
						</div>
					</div>
					<? else: ?>
					<div class="b-wide-block b-header-inner<? if($isDoctor): ?> b-header-doc<? endif; ?>"<? if($isDoctor): ?> style="background-image: url('<?=$doctor["IMAGE"]?>');" data-retina="<?=$doctor["IMAGE_RETINA"]?>"<? endif; ?>>
						<div class="b-block">
							<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", Array(
									"COMPONENT_TEMPLATE" => ".default",
									"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
									"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
									"SITE_ID" => "-",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
								),
								false
							);?>
							<h1><?$APPLICATION->ShowTitle(false)?></h1>

							<? if($isDoctor): ?>
							<div class="b-header-doc-post"><?=$doctor["SPEC"]?></div>
							<div class="b-header-doc-text"><?=$doctor["TEXT"]?></div>
							<? endif; ?>
						</div>
					</div>
					<? endif; ?>
				</div>
				<? if( !$isMain ): ?>
				<div class="b b-content">
					<div class="b-wide-block">
						<div class="b-block <?if(!$notBText):?>b-text<?endif;?>">
				<? endif; ?>
				<? if(!$notBText): ?>
				
				<? endif; ?>