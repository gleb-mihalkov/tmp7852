<?php

	defined('_JEXEC') or die("403 Forbidden.");
	jimport("jhelper");

	$title = $module->title;
	$isTitle = $module->showtitle;

?>
<?php if ($isTitle) : ?>
	<h2 class="header-section"><?= $title; ?></h2>
<?php endif; ?>
<div class="products-line">
	<?php
		foreach ($products as $product)
			renderView("preview-product", $product)
		;
	?>
</div>