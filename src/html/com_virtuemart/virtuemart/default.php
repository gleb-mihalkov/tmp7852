<?php
	defined('_JEXEC') or die("403 Forbidden.");
	jimport("vm.helper");
	jimport("jhelper");

	$app = JFactory::getApplication();
	$menu = $app->getMenu();
	$menu = $menu->getActive();

	$alias = $menu->alias;
	$title = $menu->title;

	switch ($alias)
	{
		case "popularnie-tovari":
		{
			$products = getProductsByCustom("topten", 6);
			break;
		}

		case "novinki":
		{
			$products = getProductsByCustom("Стикер", "Новинка");
			break;
		}
	}

?>
<h1 class="header-page"><?= $title; ?></h1>
<hr>
<?php renderView("product-list", $products); ?>