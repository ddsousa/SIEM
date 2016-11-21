<?php
  include_once("../../config/init.php");

  $smarty->display('common/header.tpl');
  $smarty->display('users/register.tpl');
  $smarty->display('common/footer.tpl');
?>
