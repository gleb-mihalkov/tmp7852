<?php

	defined('_JEXEC') or die("403 Forbidden.");
	jimport("vm.helper");

	$order = $this->orderDetails["details"]["BT"];
	$comments = $order->customer_note;
	$number = $order->order_number;
	$address = $order->address_1;
	$name = $order->first_name;
	$phone = $order->phone_1;
	$email = $order->email;

	$isShopper = $this->recipient == "shopper";
	$products = $this->orderDetails["items"];

	if (!$priceList) $priceList = getPriceList($products);
	$total = $priceList["textRealTotal"];
?>
<html>
	<body>
		<h2><?= $isShopper ? "Спасибо за ваш заказ!" : "Поступил новый заказ!"; ?></h2>
		<hr>
		<h3>Информация о заказчике:</h3>
		<ul>
			<li><font color="gray">Имя:</font> <?= $name; ?></li>
			<li><font color="gray">E-mail:</font> <?= $email; ?></li>
			<li><font color="gray">Телефон:</font> <?= $phone; ?></li>
			<li><font color="gray">Адрес:</font> <?= $address; ?></li>
			<?php if ($comments) : ?>
				<li><font color="gray">Примечания:</font> <?= $comments; ?></li>
			<?php endif; ?>
		</ul>
		<h3>Описание заказа:</h3>
		<ul>
			<li><font color="gray">Номер заказа:</font> <?= $number; ?>.</li>
			<li><font color="gray">Общая стоимость заказа:</font> <?= $total; ?>.</li>
		</ul>
		<table border="1" cellspacing="0" bordercollapse="collapse" bordercolor="gray" cellpadding="5">
			<tr align="left">
				<th>Название товара</th>
				<th>Размер</th>
				<th>Цена за штуку</th>
				<th>Количество</th>
				<th>Всего</th>
			</tr>
			<?php foreach ($products as $position => $product) : ?>
				<?php
					$cat = $product->virtuemart_category_id;
					$id = $product->virtuemart_product_id;
					$title = $product->order_item_name;
					$attr = $product->product_attribute;
					$size = "";

					$isSize = !empty($product->customfields);
					if ($isSize)
					{
						$field = $product->customfields[0];
						$size = $field->customfield_value;
					}

					$prices = $priceList[$position];
					$productTotal = $prices["textRealTotal"];
					$price = $prices["textRealPrice"];
					$count = $prices["count"];

					$link =
						JURI::root().
						"index.php?option=com_virtuemart".
						"&view=productdetails".
						"&virtuemart_category_id=$cat".
						"&virtuemart_product_id=$id".
						"&Itemid=150"
					;
				?>
				<tr>
					<td><a href="<?= $link; ?>"><?= $title; ?></a></td>
					<td><?= $size; ?></td>
					<td><?= $price; ?></td>
					<td><?= $count; ?></td>
					<td><?= $productTotal; ?></td>
				</tr>
			<?php endforeach; ?>
			<tr>
				<td colspan="3" align="right"><strong>Итого:</strong></td>
				<td><?= $total; ?></td>
			</tr>
		</table>
	</body>
</html>
<?php
	
	##
	# Грязный хак для отправки письма и покупателю тоже.
	##

	if (!$secondarySending)
	{
		$secondarySending = true;
		$this->recipient = "shopper";

		ob_start();
		require __FILE__;
		$html = ob_get_clean();

		$mailer = JFactory::getMailer();
		$config = JFactory::getConfig();
		$sender = array( 
			$config->get("mailfrom"),
			$config->get("fromname")
		);
		$mailer->setSender($sender);
		$mailer->addRecipient($email);
		$mailer->isHTML(true);

		$sitename = $config->get("sitename");
		$subject = "Интернет-магазин '{$sitename}', заказ принят.";

		$mailer->setSubject($subject);
		$mailer->setBody($html);
		$sending = $mailer->Send();

		if ($sending !== true)
		{
			$html = "Email sending error: ".$sending->__toString();
			file_put_contents(
				JPATH_BASE."/mail-error.log.txt",
				$html,
				FILE_APPEND
			);
		}
	}