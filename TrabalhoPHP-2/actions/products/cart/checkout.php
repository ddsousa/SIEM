<?php
	include_once('../../../config/init.php');
	include_once($BASE_DIR.'database/orders.php');

	if(!empty($_SESSION['cart'])) {
		if(newOrder($_SESSION['cart'])) {
			header("Location: ".$BASE_URL."actions/products/cart/clear_cart.php");
		}
	}
?>