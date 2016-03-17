<!-- Форма обратной связи. -->
<div class="modal fade" id="modalFeedback">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Заказать звонок</h4>
			</div>
			<div class="modal-body">
				<p>Оставьте свой телефон, и наши менеджеры вам обязательно перезвонят!</p>
				<form id="formFeedback" action="index.php?option=feedback&amp;layout=default" method="post" class="form-horizontal form-async">
					<div class="form-group">
						<label class="control-label col-lg-3">Телефон</label>
						<div class="col-lg-9">
							<input name="phone" type="tel" class="form-control" placeholder="Введите ваш телефон" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-lg-3">Примечания</label>
						<div class="col-lg-9">
							<textarea name="text" rows="5" class="form-control" placeholder="По желанию добавьте пояснения к заявке"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button type="submit" class="btn btn-primary btn-arrow" form="formFeedback">
					<span class="btn-spinner glyphicon glyphicon-repeat"></span>
					Отправить
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Окно оформления заказа -->
<div class="modal fade" id="modalCart">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Оформить заказ</h4>
			</div>
			<div class="modal-body">
				<form id="formCart" action="#" class="form-horizontal">
					<div class="form-group">
						<label for="" class="control-label col-lg-3">Имя</label>
						<div class="col-lg-9">
							<input type="text" name="name" class="form-control" placeholder="Введите ваше имя" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-lg-3">E-mail</label>
						<div class="col-lg-9">
							<input type="email" name="email" class="form-control" placeholder="Введите ваш e-mail" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-lg-3">Телефон</label>
						<div class="col-lg-9">
							<input type="phone" name="phone" class="form-control" placeholder="Введите ваш телефон" required="">
						</div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-lg-3">Адрес</label>
						<div class="col-lg-9">
							<input type="text" name="address" class="form-control" placeholder="Введите ваш адрес" required="">
						</div>
					</div>
					<div class="form-group">
						<div class="col-lg-9 col-lg-offset-3"><hr class="small"></div>
					</div>
					<div class="form-group">
						<label for="" class="control-label col-lg-3">Примечания</label>
						<div class="col-lg-9">
							<textarea name="comments" class="form-control" rows="5" placeholder="По желанию добавьте примечания к  заказу"></textarea>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button type="submit" class="btn btn-primary btn-arrow" form="formCart">
					<span class="btn-spinner glyphicon glyphicon-repeat"></span>
					Отправить
				</button>
			</div>
		</div>
	</div>
</div>
<!-- Окно оформления заказа - информация. -->
<div class="modal fade" id="modalCartSuccess">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Заказ оформлен</h4>
			</div>
			<div class="modal-body">
				<p>Ваш заказ успешно оформлен! На указанный вами почтовый адрес отправлено уведомление с подробностями заказа. Администрация сайта свяжется с вами в ближайшее время.</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
			</div>
		</div>
	</div>
</div>
<!-- Окно галереи изображений. -->
<div class="modal fade" id="modalGallery">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title">Показ изображения</h4>
			</div>
			<div class="modal-body gallery-outer">
				<div class="gallery-track" data-role="track">
					<div class="gallery-inner"><img src="" data-role="temp-left"></div>
					<div class="gallery-inner">
						<a href="#" role="button" data-role="full">
							<img src="" data-role="preview">
						</a>
					</div>
					<div class="gallery-inner"><img src="" data-role="temp-right"></div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn" data-role="prev">Назад</button>
				<button class="btn" data-role="next">Далее</button>
			</div>
		</div>
	</div>
</div>
<!-- Всплывающие сообщения -->
<div class="message-block">
	<div data-name="server-error" class="alert alert-danger">
		<span class="glyphicon glyphicon-exclamation-sign"></span>
		Во время выполнения запроса произошла серверная ошибка. Попробуйте подождать пару
		минут и повторить запрос.
	</div>
	<div data-name="product-empty" class="alert alert-danger">
		<span class="glyphicon glyphicon-exclamation-sign"></span>
		Ни один из размеров не выбран.
	</div>
	<div data-name="product-added" class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>
		Товар успешно добавлен в корзину.<br><br>
		<?php $link = JURI::root()."component/virtuemart/cart"; ?>
		<a href="<?= $link; ?>">Перейти в корзину</a>
	</div>
	<div data-name="cart-refresh" class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>
		Содержимое корзины успешно обновлено.
	</div>
	<div data-name="feedback-success" class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>
		Сообщение отправлено. Администрация сайта свяжется с вами в ближайшее время.
	</div>
	<div data-name="cart-empty" class="alert alert-danger">
		<span class="glyphicon glyphicon-exclamation-sign"></span>
		Корзина пуста.
	</div>
</div>