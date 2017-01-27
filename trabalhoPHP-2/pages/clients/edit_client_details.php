<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."config/admin_only.php");
  include_once($BASE_DIR."database/clients.php");

  if(empty($_GET['id'])) {
    $_SESSION['error_messages'][] = 'Não foi possível encontrar o utilizador';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  	exit;
  }

  $client = getClientByID($_GET['id']);

  $smarty->assign('client', $client);
  $smarty->display('common/header.tpl');
  $smarty->display('clients/edit_client_details.tpl');
  $smarty->display('common/footer.tpl');
?>
