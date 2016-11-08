<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/order.php");

	if(!empty($_GET['id']) && $_POST['estado']) {
		$order_data = updateOrderState($_GET['id'], $_POST['estado']);
	} else {
    $_SESSION['ERROR_MESSAGES'][] = 'Ocorreu um erro!';
    header("Location: ../../pages/other/detailsOrder.php?id=" . $_GET['id']."&menu=Encomendas");
    exit;
  }

  $_SESSION['SUCCESS_MESSAGES'][] = 'Estado da encomenda alterado com sucesso!';
  header("Location: ../../pages/other/detailsOrder.php?id=" . $_GET['id']."&menu=Encomendas");
  exit;
?>
