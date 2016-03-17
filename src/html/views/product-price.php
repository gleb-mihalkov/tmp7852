<?php
	defined('_JEXEC') or die("403 Forbidden.");
	jimport("vm.helper");

	$product = $model;
	$prices = getProductPrices($product);

	$price = isset($prices[1]) ? $prices[1] : 0;
	$retailPrice = isset($prices[0]) ? $prices[0] : $price;

	$textRetail = priceText($retailPrice);
	$textLimit = priceText(VM_WHOLESALE);
	$textPrice = priceText($price);
?>
<span class="price-box">
	<?= $textPrice; ?>, - <span class="text-small">от <?= $textLimit; ?></span>
</span>
<br>
<span class="price-retail-box">
	<?= $textRetail; ?>, - <span class="text-small">до <?= $textLimit; ?></span>
</span>