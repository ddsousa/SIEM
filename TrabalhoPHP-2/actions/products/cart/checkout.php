<?php
	include_once('../../../config/init.php');
	include_once($BASE_DIR.'database/orders.php');

	if(!empty($_SESSION['cart'])) {
		if(newOrder($_SESSION['cart'])) {
			unset($_SESSION['cart']);
			$_SESSION['success_messages'][] = 'Checkout realizado com sucesso';
			header("Location: ".$BASE_URL."pages/products/list_all.php");
			exit;
		}
	}
?>
