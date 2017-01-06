<?php
  if(!isset($_SESSION['permissions'])) {
    if($_SESSION['permissions']!=1)
      header("Location: ../../");
  }
?>
