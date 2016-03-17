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
    <div class="page__header"></div>
    <div class="page__nav"></div>
    <div class="page__slider"></div>
    <div class="page__main"></div>
    <div class="page__footer"></div>
  </div>
	<script src="<?= $template; ?>/scripts.js"></script>
</body>
</html>
