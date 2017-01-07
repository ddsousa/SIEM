<?php
	include_once("../../../config/init.php");

	unset($_SESSION['cart']);

	$_SESSION['success_messages'][] = 'Carrinho limpo com sucesso';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	exit;
?>
