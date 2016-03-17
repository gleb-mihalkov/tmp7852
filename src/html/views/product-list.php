<?php

	defined('_JEXEC') or die("403 Forbidden.");
	jimport("jhelper");

	$pageNumber = $_GET["page"];
	$pageNumber = $pageNumber ? $pageNumber : 1;
	$pageSize = 6;

	$products = $model;
	$pageCount = getPaginationCount($products, $pageSize);
	$products = getPaginatedList($products, $pageSize, $pageNumber);

	$isPagination = $pageCount > 1;

?>
<?php if ($products) : ?>
	<!-- Product list -->
	<div class="row">
		<?php foreach ($products as $item) renderView("preview-product", $item); ?>
	</div>
	<?php if ($isPagination) : ?>
		<!-- Pagination -->
		<?php $baseUri = getPaginationBaseUri("page"); ?>
		<ul class="pagination">
			<?php for ($i = 1; $i <= $pageCount; $i += 1) : ?>
				<?php
					$isActive = $i == $pageNumber;
					$class = $isActive ? "active" : false;
					$link = "{$baseUri}page={$i}";
				?>
				<li class="<?= $class; ?>">
					<a href="<?= $link; ?>"><?= $i; ?></a>
				</li>
			<?php endfor; ?>
		</ul>
	<?php endif; ?>
<?php else : ?>
	<div class="alert alert-danger">
		<span class="glyphicon glyphicon-exclamation-sign"></span>
		Нет товаров для отображения!
	</div>
<?php endif; ?>