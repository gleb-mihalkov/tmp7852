<?php

	defined('_JEXEC') or die("403 Forbidden.");

	$product = $model;

	$fields = @$product->customfieldsSorted;
	$fields = @$fields["normal"];
	if (!$fields) $fields = $product->customfields;

	foreach ($fields as $field)
	{
		$value = $field->customfield_value;
		
		$notDesc = $field->custom_title != "Стикер";
		if ($notDesc) continue;

		echo "<span class='sticker'>$value</span>";
		break;
	}