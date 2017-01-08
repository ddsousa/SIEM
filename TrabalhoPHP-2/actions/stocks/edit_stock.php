<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR.'database/stock.php');

  if(!$_GET['id'] || !$_POST['qt-warehouse'] || !$_POST['qt-available']) {
    $_SESSION['error_messages'][] = 'Não foi possível atualizar o stock do produto';
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $id           = strip_tags($_GET['id']);
  $qt_warehouse = strip_tags($_POST['qt-warehouse']);
  $qt_available = strip_tags($_POST['qt-available']);

  setStocks($id, $qt_available, $qt_warehouse);

  $_SESSION['success_messages'][] = 'Stock editado com sucesso';
  header("Location: " . $_SERVER['HTTP_REFERER']);
  exit;
?>
