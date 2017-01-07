<?php
	include_once('../../../config/init.php');

	if(isset($_GET['prod_id'])) {
		$prod_id = $_GET['prod_id'];

		if(isset($_SESSION['cart'][$prod_id]))
			unset($_SESSION['cart'][$prod_id]);
	}

	$_SESSION['success_messages'][] = 'Produto removado com sucesso';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
?>
