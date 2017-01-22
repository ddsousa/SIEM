<?php
	include_once("../../config/init.php");
	include_once($BASE_DIR."config/user_only.php");
	include_once($BASE_DIR."database/orders.php");
	include_once($BASE_DIR."database/users.php");

	// sort
  $sort_by = null;
  if(isset($_GET['sort_by'])) {
    $sort_by = $_GET['sort_by'];
  }

	// Page
	if(isset($_GET['pg'])) {
		$pg = $_GET['pg'];
	} else {
		$pg = 1;
	}

	if(isset($_SESSION['permissions'])) {
		if($_SESSION['permissions'] == 0) {
			$orders = getOrdersByClient($_SESSION['username']);
		}
		else if($_SESSION['permissions'] == 1) {

			if(isset($_GET['user'])) {
				$user_id = $_GET['user'];

				$data = getUsername($user_id);

				if($data['username'] == null) {
					header("Location: ".$BASE_URL."pages/clients/list_all_clients.php");
				}

				$orders = getOrdersByClient($data['username']);

			} else {
				$orders = getAllOrders($pg, $sort_by);
			}
		}
	}
	else {
		header('Location: '.$BASE_URL);
		exit;
	}

	$n_orders = getNumOrders();

	$smarty->assign('sort_by', $sort_by);
	$smarty->assign('orders', $orders);
	$smarty->assign('n_orders', $n_orders);
	$smarty->display('common/header.tpl');
	$smarty->display('orders/list.tpl');
	$smarty->display('orders/list_page_numbers.tpl');
	$smarty->display('common/footer.tpl');
?>
