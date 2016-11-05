<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/stock.php");

  if(!$_POST['qt_armazem'] || !$_POST['qt_disponivel']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos relativos ao stock.';
    header("Location: ../../pages/other/editProduct.php");
    exit;
  }

  $id = $_SESSION['EDIT_PRODUCT'];
  unset($_SESSION['EDIT_PRODUCT']);

  updateStocks($id, $_POST['qt_armazem'], $_POST['qt_disponivel']);

  $_SESSION['SUCCESS_MESSAGES'][] = 'Alterações efectuadas com sucesso!';
  header("Location: ../../pages/other/editProduct.php?id=" . $id);
  exit;
 ?>
