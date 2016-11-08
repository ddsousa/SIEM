<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/product.php");
  include_once ($BASE_DIR . "/database/stock.php");

  if(!$_GET['id']) {
    echo "Não foi fornecido nenhum id!";
  } else {
    $id = $_GET['id'];
  }

  deleteStock($id);
  deleteProduct($id);

  $_SESSION['SUCCESS_MESSAGES'][] = "Produto removido com sucesso.";
  header("Location: ../../pages/common/info.php");
  exit;
 ?>
