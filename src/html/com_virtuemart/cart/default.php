<?php

	defined('_JEXEC') or die("403 Forbidden.");
	jimport("vm.helper");
	jimport("jhelper");

	$type = JRequest::getBool("async") ? "json" : "html";
	$total = null;

	$cart = $this->cart;
	$lang = $cart->order_language;

	$products = $cart->products;
	$isEmpty = empty($products);

	$priceList = getPriceList($products);

	if ($type != "html")
	{
		$text = json_encode($priceList);
		jexit($text);
	}

	require dirname(__FILE__)."/default.html.php";