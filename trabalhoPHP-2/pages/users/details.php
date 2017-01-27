<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."config/admin_only.php");
  include_once($BASE_DIR."database/users.php");

  $id_client = getClientId($_SESSION['USERNAME']);
  $client_data = getClientData($id_client);

  $smarty->assign('client_data', $client_data);

  $smarty->display('common/header.tpl');
  $smarty->display('users/details.tpl');
  $smarty->display('common/footer.tpl');
?>
