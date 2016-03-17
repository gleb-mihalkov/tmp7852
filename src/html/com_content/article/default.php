<?php

	defined('_JEXEC') or die("403 Forbidden.");

	$article = $this->item;
	$title = $article->title;
	$text = $article->introtext.$article->fulltext;
	$link = $article->catid != 2
		? JURI::root().$article->category_alias
		: JURI::root()
	;
?>
<h1 class="header-page"><?= $title; ?></h1>
<div class="article-area"><?= $text; ?></div>
<p><a href="<?= $link; ?>" class="preview-article-link"> Назад</a></p>