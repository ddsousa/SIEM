<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."config/user_only.php");
  include_once($BASE_DIR."database/orders.php");

  if(!isset($_GET['id'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $order = getOrderByID($_GET['id']);

  $smarty->assign('order', $order);
  $smarty->display('common/header.tpl');
  $smarty->display('orders/order_details.tpl');
  $smarty->display('common/footer.tpl');
?>
