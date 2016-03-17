<?php

	function getProductSize($product)
	{
		$keys = array_keys($product->customProductData);

		$empty = empty($keys);
		if ($empty) return false;

		$id = $keys[0];
		$id = $product->customProductData[$id];

		foreach ($product->customfields as $field)
		{
			$find = $field->virtuemart_customfield_id == $id;
			if ($find) return $field->customfield_value;
		}

		return false;
	}

	$textTotalRetail = $priceList["textTotalRetail"];
	$isRetail = $priceList["type"] != "normal";
	$textTotal = $priceList["textTotal"];

	$totalClass = $isRetail ? "text-gray" : false;
	$retailClass = $isRetail ? false : "text-gray";
?>
<h1 class="header-page">Ваш заказ</h1>
<?php if ($isEmpty) : ?>
	<div class="alert alert-danger">
		<span class="glyphicon glyphicon-exclamation-sign"></span>
		Вы не выбрали ни одного товара.
	</div>
<?php else : ?>
	<div class="cart-box">
		<div class="selectable-box">
			<table class="cart-table gallery-box table table-bordered table-hover" data-role="product-list">
				<thead>
					<tr>
						<th colspan="3">Товар</th>
						<th>Цена единицы товара</th>
						<th>Количество</th>
						<th>Оптовая цена</th>
						<th>Розничная цена</th>
					</tr>
				</thead>
				<?php foreach ($products as $position => $product) : ?>
					<?php
						$image = JURI::root().$product->file_url;
						$thumb = JURI::root().$product->file_url_thumb;
						
						$desc = getProductSize($product);
						$title = $product->product_name;
						$link = $product->url;

						$prices = $priceList[$position];
						$productTotal = $prices["totalRetail"];
						$count = $prices["count"];

						$textProductRetail = $prices["textTotalRetail"];
						$textProductPrice = $prices["textTotal"];
					?>
					<tr data-role="product" data-position="<?= $position; ?>">
						<td class="cart-picker"><input type="checkbox"></td>
						<td class="cart-thumb">
							<a href='#' data-role="thumb" data-src-thumb="<?= $thumb; ?>" data-src="<?= $image; ?>">
								<img src="<?= $thumb; ?>" alt="">
							</a>
						</td>
						<td class="cart-text">
							<h2 class="cart-header">
								<a href="<?= $link; ?>"><?= $title; ?></a>
							</h2>
							<p class="text-small"><?php echo $desc; ?></p>
						</td>
						<td class="cart-price-product product-price-small"><?php renderView("product-price", $product); ?></td>
						<td class="cart-count">
							<div class="input-group count-small-block count-input-box">
								<input type="text" name="count" class="form-control" value="<?= $count; ?>" data-min="1">
								<span class="input-group-btn">
									<a href="#" class="btn btn-primary" role="button" data-role="inc">+</a>
									<a href="#" class="btn btn-primary" role="button" data-role="dec">-</a>
								</span>
							</div>
						</td>
						<td class="cart-price-total product-price-small <?= $totalClass; ?>" data-role="price">
							<?= $textProductPrice; ?>
						</td>
						<td class="cart-price-total product-price-small <?= $retailClass; ?>" data-role="price-retail">
							<?= $textProductRetail; ?>
						</td>
					</tr>
				<?php endforeach; ?>
				<?php

				?>
				<tr class="product-price-small">
					<td colspan="5" align="right">Итого:</td>
					<td class="cart-price-total <?= $totalClass; ?>" data-role="price-total"><?= $textTotal; ?></td>
					<td class="cart-price-total <?= $retailClass; ?>" data-role="price-total-retail"><?= $textTotalRetail; ?></td>
				</tr>
			</table>
			<p class="clearfix">
				<a href="#" role="button" data-role="select-all">Выбрать всё</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="#" role="button" data-role="unselect-all">Снять выбор</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="#" role="button" data-role="cart-delete">Удалить</a>
			</p>
		</div>
		<p>
			<a href="#modalCart" data-toggle="modal" class="btn btn-primary btn-arrow" data-role="submit">
				<span class="btn-spinner glyphicon glyphicon-repeat"></span>
				Оформить заказ
			</a>
			<a href="#" class="btn btn-back" role="button">Продолжить покупки</a>
		</p>
	</div>
<?php endif; ?>