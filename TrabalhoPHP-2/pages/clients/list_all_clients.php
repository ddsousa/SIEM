<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."config/admin_only.php");
  include_once($BASE_DIR."database/clients.php");

  $clients = getAllClients();

  $smarty->assign('clients', $clients);
  $smarty->display('common/header.tpl');
  $smarty->display('clients/list.tpl');
  $smarty->display('common/footer.tpl');
?>
