<?php
	include_once("../../../config/init.php");

	if(isset($_GET['prod_id']) && isset($_POST['quantity'])) {
		$prod_id  = strip_tags($_GET['prod_id']);
		$quantity = strip_tags($_POST['quantity']);

		if(isset($_SESSION['cart'])) {
			$_SESSION['cart'][$prod_id]['quantity'] = $quantity;
		}
		else {
			$_SESSION['error_messages'][] = 'Ainda não tem este produto no carrinho';
		}
	}
	$_SESSION['success_messages'][] = 'Quantidade mudada para ' . $quantity;
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
?>
