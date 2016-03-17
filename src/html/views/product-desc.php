<?php
	
	$product = $model;
	$sku = $product->product_sku;

	$fields = @$product->customfieldsSorted;
	$fields = @$fields["normal"];
	
	if (!$fields) $fields = $product->customfields;

	$first = true;

	if ($sku)
	{
		echo "Артикул: {$sku}";
		$first = false;
	}

	foreach ($fields as $field)
	{
		$value = $field->customfield_value;
		
		$title = explode(":", $field->custom_title);

		$notDesc = trim($title[0]) !== "Описание";
		if ($notDesc) continue;

		$title = isset($title[1]) ? trim($title[1]) : $title[0];
		if (!$first) echo "<br>";
		
		echo "$title: $value";
		$first = false;
	}