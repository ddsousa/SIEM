<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."config/user_only.php");

  $smarty->display('common/header.tpl');
  $smarty->display('users/orders.tpl');
  $smarty->display('common/footer.tpl'):
?>
