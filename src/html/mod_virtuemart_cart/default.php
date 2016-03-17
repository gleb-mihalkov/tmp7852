<?php
	defined('_JEXEC') or die("403 Forbidden.");
	jimport("vm.helper");

	$link = JURI::root()."component/virtuemart/cart";

	$cartPrices = getPriceList($cart->products);
	$total = $cartPrices["type"] != "normal"
		? $cartPrices["textTotalRetail"]
		: $cartPrices["textTotal"];
?>
<div class="module-cart">
	<a href="<?= $link; ?>" class="icon icon-cart">
		Ваша корзина:<br>
		<span class="text-gray" data-role="price-real-total"><?= $total; ?>.</span>
	</a>
</div>