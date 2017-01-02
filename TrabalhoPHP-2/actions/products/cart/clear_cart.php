<?php
	include_once("../../../config/init.php");

	unset($_SESSION['cart']);

	header('Location: ' . $_SERVER['HTTP_REFERER']);
?>