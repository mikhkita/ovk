				<? if( !$GLOBALS["isMain"] ): ?>
					<? switch ($page) {
						case 'about2':?>
							
							<?break;
						case 'contacts':?>
						</div>
					</div>
				</div>
				<div class="b b-map-block">
					<div class="b-wide-block">
						<div class="b-map" id="map"></div>
						<div class="b-map-text">
							<h2 class="b-title"><?=includeArea("map-title")?></h2>
							<?=includeArea("map-text")?>
						</div>
					</div>
				</div>
							<?break;
						default:?>
						</div>
					</div>
				</div>
					<? if( !$GLOBALS["notBText"] ): ?>

					<? endif; ?>
							<?break;
					} ?>
				<? endif; ?>
				<div class="b b-footer">
					<div class="b-wide-block">
						<div class="b-block clearfix">
							<div class="b-footer-top clearfix">
								<div class="b-logo-cont left">
									<a href="#" class="b-logo"></a>
									<ul class="b-soc clearfix">
										<li><a href="https://instagram.com/kvo_info" class="icon-ig"></a></li>
										<!-- <li><a href="https://instagram.com/kvo_info" class="icon-vk"></a></li> -->
										<!-- <li><a href="https://instagram.com/kvo_info" class="icon-ok"></a></li> -->
									</ul>
								</div>
								<div class="b-footer-menu right">
									<div class="b-footer-col">
										<?=includeArea("col-1")?>
										<?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
											"COMPONENT_TEMPLATE" => ".default",
												"ROOT_MENU_TYPE" => "bottom-1",	// Тип меню для первого уровня
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
											),
											false
										);?>
									</div>
									<div class="b-footer-col">
										<?=includeArea("col-2")?>
										<?$APPLICATION->IncludeComponent("bitrix:menu", "top-menu", Array(
											"COMPONENT_TEMPLATE" => ".default",
												"ROOT_MENU_TYPE" => "bottom-2",	// Тип меню для первого уровня
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
											),
											false
										);?>
									</div>
									<div class="b-footer-col">
										<?=includeArea("col-3")?>
									</div>
									<div class="b-footer-col">
										<?=includeArea("col-4")?>
									</div>
								</div>
							</div>
							<div class="b-limit"><?=includeArea("protiv")?></div>
							<div class="b-footer-bottom clearfix">
								<div class="b-footer-copy left"><?=includeArea("copy")?></div>
								<a href="#" class="b-footer-conf left">Политика конфиденциальности</a>
								<a href="http://redder.pro/" class="b-redder right" target="_blank">Redder</a>
							</div>
						</div>
					</div>
				</div>
			</div><!-- wrapper -->
		</div><!-- /container -->
		<nav class="outer-nav right vertical">
			<a href="/">Главная</a>
			<a href="/about/">О компании</a>
			<a href="/services/">Услуги</a>
			<a href="/doctors/">Специалисты</a>
			<a href="/reviews/">Отзывы</a>
			<a href="/job/">Вакансии</a>
			<a href="/contacts/">Контакты</a>
		</nav>
	</div><!-- /perspective -->
	<div style="display:none;">
		<a href="#b-popup-error" class="b-error-link fancy" style="display:none;"></a>
		<div class="b-popup-zapis" id="b-popup-zapis-id">
			<div class="b-popup-close icon-cross"></div>
			<h2><span>Подобрать</span><br>Запись на прием</h2>
			<p>Вы можете выбрать удобные для Вас дни и часы для посещения наших специалистов</p>
			<form action="kitsend.php" class="">
				<div class="b-popup-zapis-fields clearfix">
					<input type="text" id="name" name="name" placeholder="Валентин *" required>
					<input type="text" id="name" name="name" placeholder="Валентин *" required>
					<input type="text" id="name" name="name" placeholder="Валентин *" required>
					<input type="text" name="name" placeholder="Валентин *" id="date">
					<input type="text" id="name" name="name" placeholder="Валентин *" class="time-start" required>
					<input type="text" id="name" name="name" placeholder="Валентин *" class="time-end" required>
				</div>
				<div class="b-popup-zapis-btn-cont">
					<button type="submit" class="b-btn b-green-btn right ajax">Отправить</button>
				</div>
			</form>
		</div>
		<div class="b-popup" id="b-popup-1">
			<h3>Подбор записи на прием</h3>
			<h4>Выберите удобное для Вас время</h4>
			<form action="kitsend.php" data-goal="CALLBACK" method="POST" id="b-form-1">
				<div class="b-popup-form">
					<label for="name">Введите Ваше имя</label>
					<input type="text" id="name" name="name" required/>
					<label for="tel">Введите Ваш номер телефона</label>
					<input type="text" id="tel" name="phone" required/>
					<label for="tel">Введите Ваш E-mail</label>
					<input type="text" id="tel" name="email" required/>
					<input type="hidden" name="subject" value="Заказ"/>
					<input type="submit" class="ajax b-orange-butt" value="Заказать">
					<a href="#b-popup-success" class="b-thanks-link fancy" style="display:none;"></a>
				</div>
			</form>
		</div>
		<div class="b-thanks b-popup" id="b-popup-success">
			<h3>Спасибо!</h3>
			<h4>Ваша заявка успешно отправлена.<br/>Наш менеджер свяжется с Вами в течение часа.</h4>
			<input type="submit" class="b-orange-butt" onclick="$.fancybox.close(); return false;" value="Закрыть">
		</div>
		<div class="b-thanks b-popup" id="b-popup-error">
			<h3>Ошибка отправки!</h3>
			<h4>Приносим свои извинения. Пожалуйста, попробуйте отправить Вашу заявку позже.</h4>
			<input type="submit" class="b-orange-butt" onclick="$.fancybox.close(); return false;" value="Закрыть">
		</div>
	</div>

	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.fancybox.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&key=AIzaSyD6Sy5r7sWQAelSn-4mu2JtVptFkEQ03YI"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/TweenMax.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.maskedinput.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/KitCarousel.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/KitAnimate.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/device.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/slick.min.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/KitSend.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/fastclick.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/modernizr.custom.25376.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/classie.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/menu.js"></script>
	<script type="text/javascript" src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
</body>
</html>