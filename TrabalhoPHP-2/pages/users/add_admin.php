<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR.'config/admin_only.php');

  $smarty->display('common/header.tpl');
  $smarty->display('users/add_admin.tpl');
  $smarty->display('common/footer.tpl');
?>
