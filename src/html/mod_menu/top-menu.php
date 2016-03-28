<?php
  defined("_JEXEC") || die("403 Forbidden");
?>
<ul class="top-menu">
  <?php foreach ($list as $item) : ?>
    <?php
      $id = $item->id;
      $title = $item->title;
      $link = $item->flink;
      $diff = $item->level_diff;
      $level = $item->level;
    ?>
    <!-- Код пункта меню. -->
  <?php endforeach; ?>
</ul>