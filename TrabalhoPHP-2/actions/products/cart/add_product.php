<?php
	include_once("../../../config/init.php");
	include_once($BASE_DIR."database/products.php");

	if(isset($_GET['prod_id']) && isset($_POST['prod_quantity'])) {
		$prod_id  = strip_tags($_GET['prod_id']);
		$quantity = strip_tags($_POST['prod_quantity']);
		$product  = getProductByID($prod_id);

		if(!isset($_SESSION['cart']))
			$_SESSION['cart'] = array();

		if(!isset($_SESSION['cart'][$prod_id]))
			$_SESSION['cart'][$prod_id]['quantity'] = $quantity;
		else
			$_SESSION['cart'][$prod_id]['quantity'] += $quantity;
		$_SESSION['cart'][$prod_id]['price'] = $product['price'];
		$_SESSION['cart'][$prod_id]['name']  = $product['name'];
	}
	$_SESSION['success_messages'][] = 'Produto adicionado com sucesso';
	header('Location: ' . $BASE_URL . 'pages/products/list_all.php');
	exit;
?>
