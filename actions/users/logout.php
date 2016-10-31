<?php
  include_once('../../common/init.php');

  session_destroy();

  header('Location: ../../index.php');
?>
