<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/orders.php");

  if(!empty($_GET['id']) && isset($_POST['state'])) {
    updateOrderState($_GET['id'], $_POST['state']);
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
