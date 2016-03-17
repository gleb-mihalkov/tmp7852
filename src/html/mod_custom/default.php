<?php
	defined('_JEXEC') or die();

	$isTitle = $module->showtitle;
	$title = $module->title;
?>
<?php if ($isTitle) : ?>
	<h2 class="header-module"><?= $title; ?></h2>
<?php endif; ?>
<?= $module->content; ?>
