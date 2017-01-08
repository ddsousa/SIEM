<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");
  include_once($BASE_DIR."database/stock.php");

  if(!empty($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    deleteStock($id);
    deleteProduct($id);
  }
  else {
    $_SESSION['error_messages'][] = ' Erro ao remover produto - Falta de ID';
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
  exit;
?>
