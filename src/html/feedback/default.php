<?php

	defined('_JEXEC') or die("403 Forbidden.");

	$phone = JRequest::getString("phone");
	$text = JRequest::getString("text");
?>
<h2>Сообщение с формы обратной связи:</h2>
<hr>
<p><font color="gray">Телефон отправителя:</font> <strong><?= $phone; ?></strong></p>
<p><font color="gray">Сообщение:</font></p>
<p><?= $text; ?></p>