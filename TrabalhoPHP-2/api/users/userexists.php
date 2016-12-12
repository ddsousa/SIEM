<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR."database/users.php");

  $count = userExists($_GET['username']);

  echo json_encode($count);
?>
