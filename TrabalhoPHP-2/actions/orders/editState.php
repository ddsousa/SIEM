<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/orders.php");
  include_once($BASE_DIR."database/stock.php");

  if(!empty($_GET['id']) && isset($_POST['state'])) {
    updateOrderState($_GET['id'], $_POST['state']);
    if($_POST['state'] == 'Entregue') // if delivered decrements warehouse stock
      changeStockWarehouse($_GET['id']);
  }
  else {
    $_SESSION['error_messages'][] = 'Ocorreu um erro ao mudar estado da encomenda';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $_SESSION['success_messages'][] = 'Estado da encomenda alterado com sucesso';
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
?>
