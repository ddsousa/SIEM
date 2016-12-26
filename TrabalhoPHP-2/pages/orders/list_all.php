<?php
	include_once("../../config/init.php");
	include_once($BASE_DIR."database/orders.php");

	$client_orders = getOrdersByClient($_SESSION['username']);
 
	$smarty->assign('client_orders', $client_orders);
	$smarty->display('common/header.tpl');
	$smarty->display('orders/list.tpl');
	$smarty->display('common/footer.tpl');
?>