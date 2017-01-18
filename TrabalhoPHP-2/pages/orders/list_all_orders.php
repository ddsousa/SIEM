<?php
	include_once("../../config/init.php");
	include_once($BASE_DIR."config/user_only.php");
	include_once($BASE_DIR."database/orders.php");

	// sort
  $sort_by = null;
  if(isset($_GET['sort_by'])) {
    $sort_by = $_GET['sort_by'];
  }

	if(isset($_SESSION['permissions'])) {
		if($_SESSION['permissions'] == 0) {
			$orders = getOrdersByClient($_SESSION['username']);
		}
		else if($_SESSION['permissions'] == 1) {
			$orders = getAllOrders($sort_by);
		}
	}
	else {
		header('Location: '.$BASE_URL);
		exit;
	}

	$smarty->assign('sort_by', $sort_by);
	$smarty->assign('orders', $orders);
	$smarty->display('common/header.tpl');
	$smarty->display('orders/list.tpl');
	$smarty->display('common/footer.tpl');
?>
