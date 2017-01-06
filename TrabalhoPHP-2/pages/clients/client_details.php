<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."config/admin_only.php");
  include_once($BASE_DIR."database/clients.php");

  if(!isset($_GET['id']))
    header('Location: ' . $_SERVER['HTTP_REFERER']);

  $client = getClientDetails($_GET['id']);

  $smarty->assign('client', $client);
  $smarty->display('common/header.tpl');
  $smarty->display('clients/client_details.tpl');
  $smarty->display('common/footer.tpl');
?>
