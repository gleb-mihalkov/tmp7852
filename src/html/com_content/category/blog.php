<?php

	defined('_JEXEC') or die("403 Forbidden.");

	$catAlias = $this->category->alias;
	$title = $this->category->title;
	$articles = $this->items;

	$isEmpty = empty($articles);

?>
<h1 class="header-page"><?= $title; ?></h1>
<?php if (!$isEmpty) : ?>
	<?php foreach ($articles as $article) : ?>
		<?php
			$text = $article->introtext;
			$alias = $article->alias;
			$title = $article->title;
			$id = $article->id;
			$link = JURI::root()."$catAlias/$id:$alias";
			$isReadmore = !empty($article->fulltext);
		?>
		<div class="preview-article-block">
			<h2 class="preview-article-title">
				<a href="<?= $link; ?>"><?= $title; ?></a>
			</h2>
			<?= $text; ?>
			<?php if ($isReadmore) : ?>
				<p><a href="<?= $link; ?>" class="preview-article-link"> Подробнее</a></p>
			<?php endif; ?>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<div class="alert alert-danger">
		<span class="glyphicon glyphicon-exclamation-sign"></span>
		Каталог пуст.
	</div>
<?php endif; ?>