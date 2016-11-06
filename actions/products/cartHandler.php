<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/database/product.php");
	include_once($BASE_DIR."/database/order.php");

	function clearCart() {
		unset($_SESSION['cart_item']);
		$_SESSION['cart_item'] = array();
	}

	if(!empty($_GET['action'])) {
		switch($_GET['action']) {
			case 'add':
				if(!empty($_POST['quantity']) && !empty($_GET['id'])) {
					$id = $_GET['id'];
					$product = searchProductById($id);

					$cart_item = array('id'=>$id, 'name'=>$product[2], 'price'=>$product[5], 'price_unit'=>$product[6], 'quantity'=>$_POST['quantity']);
					$cart_item_array = array($cart_item);

					if(!empty($_SESSION['cart_item'])) {
						$flag_id_not_found = true;
						foreach($_SESSION['cart_item'] as $item) {
							if($item['id'] == $id) {
								$key = array_search($item, $_SESSION['cart_item']);
								$_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
								$flag_id_not_found = false;
								break;
							}
						}
						if($flag_id_not_found) {
							$_SESSION['cart_item'][] = $cart_item;
						}
					} else {
						$_SESSION['cart_item'] = $cart_item_array;
					}
					header("Location: ../../pages/other/displayProduto.php?id=".$_GET['id']);
				}
			break;
			case 'remove':
				if(!empty($_GET['id'])) {
					$id = $_GET['id'];
					if(!empty($_SESSION['cart_item'])) {
						foreach($_SESSION['cart_item'] as $item) {
							if($item['id'] == $id) {
								$key = array_search($item, $_SESSION['cart_item']);
								unset($_SESSION['cart_item'][$key]);
							}
						}
					}
					header("Location: ../../pages/other/displayCarrinho.php");
				}
			break;
			case 'edit':
				if(!empty($_GET['id'])) {
					$id = $_GET['id'];
					if(!empty($_SESSION['cart_item'])) {
						foreach ($_SESSION['cart_item'] as $item) {
							if($item['id'] == $id) {
								$key = array_search($item, $_SESSION['cart_item']);
								$_SESSION['cart_item'][$key]['quantity'] = $_POST['quantity'];
							}
						}
					}
					header("Location: ../../pages/other/displayCarrinho.php");
				}
			break;
			case 'clean':
				clearCart();
				header("Location: ../../pages/other/displayCarrinho.php");
			break;
			case 'checkout': // TODO - falta implementar
				if(!empty($_SESSION['cart_item'])) {
					if(newOrder($_SESSION['cart_item'])) {
						clearCart();
					}
					header("Location: ../../pages/other/displayCarrinho.php");
				}
			break;
			}
		}
?>