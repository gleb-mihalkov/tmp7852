<?php
	
	defined('_JEXEC') or die("403 Forbidden.");
	jimport("vm.helper");
	jimport("jhelper");

	$product = $this->product;
	
	$id = $product->virtuemart_product_id;
	$title = $product->product_name;
	$desc = $product->product_s_desc;
	$category = $product->categoryItem[0];

	if (!$desc)
	{
		$pattern = "/<[^>]+>([^<]+)/";
		$match = array();
		$text = $category["category_description"];
		$count = preg_match_all($pattern, $text, $match, PREG_SET_ORDER);
		if ($count) $desc = $match[0][1];
	}

	$sizeField = @$product->customfieldsSorted["addtocart"][0];
	$sizes = @$sizeField->options;

	$imageThumb = JURI::root().$product->file_url_thumb;
	$image = JURI::root().$product->file_url;

	$images = $product->images;
	$imageCount = empty($images) ? 0 : count($images);
	$isImages = $imageCount > 1;
?>
<div class="row gallery-box">
	<div class="col-lg-7">
		<a href="#" data-role="thumb" data-src-thumb="<?= $imageThumb; ?>" data-src="<?= $image; ?>">
			<img class="product-image" src="<?= $image; ?>" alt="Изображение: <?= $title; ?>">
			<?php renderView("product-sticker", $product); ?>
		</a>
	</div>
	<div class="col-lg-5">
		<h1 class="header-product"><?= $title; ?></h1>
		<p class="text-small"><?php renderView("product-desc", $product); ?></p>
		<form action="#" id="formAddProduct" method="post" class="form-horizontal form-multisending">
			<input type="hidden" name="virtuemart_product_id[]" value="<?= $id; ?>">
			<input type="hidden" name="option" value="com_virtuemart">
			<input type="hidden" name="pid" value="<?= $id; ?>">
			<input type="hidden" name="nocontent" value="1">
			<input type="hidden" name="view" value="cart">
			<input type="hidden" name="task" value="add">
			<div class="product-sizes">
				<?php foreach ($sizes as $size) : ?>
					<?php
						$name = $sizeField->customProductDataName;
						$value = $size->virtuemart_customfield_id;
						$title = $size->customfield_value;
					?>
					<div class="form-group form-group-size">
						<label for="" class="control-label col-lg-4"><?= $title; ?></label>
						<div class="col-lg-8">
							<input type="hidden" name="<?= $name; ?>" value="<?= $value; ?>">
							<div class="input-group count-block count-input-box">
								<a href="#" class="btn btn-primary" role="button" data-role="dec">-</a>
								<input type="text" name="quantity[]" class="form-control" value="0">
								<a href="#" class="btn btn-primary" role="button" data-role="inc">+</a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<p class="product-price">
				<?php renderView("product-price", $product); ?>
			</p>
			<p>
				<button type="submit" class="btn btn-primary btn-arrow">
					<span class="btn-spinner glyphicon glyphicon-repeat"></span>
					Купить
				</button>
				<?php $link = JURI::root()."component/virtuemart/cart"; ?>
				<a href="<?= $link; ?>" class="btn">Перейти в корзину</a>
			</p>
		</form>
		<?php if ($desc) : ?>
			<pre class="text text-small text-article"><?= $desc; ?></pre>
		<?php endif; ?>
		<?php if ($isImages) : ?>
			<p><strong>Фото:</strong></p>
			<div class="product-gallery">
				<div class="row">
					<?php for ($i = 1; $i < $imageCount; $i += 1) : ?>
						<?php $image = $images[$i]; ?>
						<?php
							$thumb = JURI::root().$image->file_url_thumb;
							$link = JURI::root().$image->file_url;
						?>
						<div class="col-lg-3">
							<a href="#" data-src-thumb="<?= $thumb; ?>" data-src="<?= $link; ?>" data-role="thumb">
								<img src="<?= $thumb; ?>" />
							</a>
						</div>
					<?php endfor; ?>
				</div>
			</div>
		<?php endif; ?>
	</div>
</div>
<hr>