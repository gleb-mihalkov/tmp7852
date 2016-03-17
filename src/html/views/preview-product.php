<?php
	
	defined('_JEXEC') or die("403 Forbidden.");
	jimport("vm.helper");
	jimport("jhelper");

	$product = $model;
	$title = htmlspecialchars($product->product_name);
	$productId = $product->virtuemart_product_id;
	$image = $product->file_url_thumb;
	
	$link = $product->categoryItem[0]["slug"];
	$link = "{$link}/{$product->slug}";
	$link = JURI::root()."{$link}-detail";
?>
<div class="col-md-4">
	<div class="preview-product">
		<a href="<?= $link; ?>" class="preview-product-outer-image">
			<img src="<?= $image; ?>" class="preview-product-image" alt="Изображение: <?= $title; ?>">
			<?php renderView("product-sticker", $product); ?>
		</a>
		<div class="preview-product-text">
			<h2 class="preview-product-title">
				<a href="<?= $link; ?>"><?= $title; ?></a>
			</h2>
			<p class="text-small">
				<?php renderView("product-desc", $product); ?>
			</p>
			<p class="product-price">
				<?php renderView("product-price", $product); ?>
			</p>
			<a href="<?= $link; ?>" class="btn btn-primary btn-arrow">Подробнее</a>
		</div>
	</div>
</div>