<?php

	defined('_JEXEC') or die("403 Forbidden.");

	$item = isset($this->items[0]) ? $this->items[0] : false;
	if ($item)
	{
		$title = $item->title;
		$text = $item->introtext;
	}
?>
<?php if ($item) : ?>
	<h1 class="header-main"><?= $title; ?></h1>
	<div class="article-area">
		<?= $text; ?>
	</div>
<?php else : ?>
	<div class="alert alert-danger">
		<span class="glyphicon glyphicon-exclamation-sign"></span>
		Ошибка: следует поместить хотя бы один материал в избранное.
	</div>
<?php endif; ?>