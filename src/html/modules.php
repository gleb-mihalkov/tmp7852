<?php

	defined('_JEXEC') or die;


	/**
	 * Отображает только содержимое модуля.
	 */
	function modChrome_no($module, &$params, &$attribs)
	{
		echo $module->content;
	}

	/**
	 * Отображает модуль в обертке div.col-[size].
	 */
	function modChrome_div($module, $params, $attrs)
	{
		$class = @$attrs["class"];
		echo "<div class='$class'>{$module->content}</div>";
	}
