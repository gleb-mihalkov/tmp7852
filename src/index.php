<?php
	defined('_JEXEC') or die("403 Forbidden.");
	require dirname(__FILE__)."/index-helper.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<jdoc:include type="head" />
	<meta charset="UTF-8">
	<link rel="stylesheet" href="<?= $template; ?>/styles.css">
</head>
<body class="global">
  <div class="page">
    <div class="page__header | page-header">
      <div href="#" class="page-header__item page-header__item--brand">
        <a href="#" class="page-header-brand"></a>
      </div>
      <div class="page-header__item page-header__item--contacts | page-header-contacts">
        <h2>Отдел продаж</h2>
        <p><a href="tel:+79621662014">+7 (962) 166-20-14</a></p>
      </div>
      <div class="page-header__item page-header__item--contacts | page-header-contacts">
        <p><a href="tel:+74932227220">+7 (4932) 22-72-20</a></p>
        <p><a href="tel:+79022421170">+7 (902) 242-11-70</a></p>
      </div>
      <div class="page-header__item page-header__item--cart page-header__item--right">
        <div class="page-header-cart">
          199050 руб.
        </div>
      </div>
      <div class="page-header__item page-header__item--search page-header__item--right">
        <div class="page-header-search">
          <input type="text" class="page-header-search__input" placeholder="Поиск">
        </div>
      </div>
    </div>
    <div class="page__nav"></div>
    <div class="page__slider"></div>
    <div class="page__main"></div>
    <div class="page__footer"></div>
  </div>
	<script src="<?= $template; ?>/scripts.js"></script>
</body>
</html>
