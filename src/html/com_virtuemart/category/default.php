<?php

	defined('_JEXEC') or die("403 Forbidden.");
	jimport("jhelper");

	$category = $this->category;
	$title = $category->category_name;
	$text = $category->category_description;
	$products = $this->products;
?>
<h1 class="header-page"><?= $title; ?></h1>
<?= $text; ?>
<hr>
<?php renderView("product-list", $products); ?>