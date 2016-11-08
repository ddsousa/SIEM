<?php
  if(isset($_SESSION['PERMISSIONS'])) {
    if($_SESSION['PERMISSIONS'] == 1) {
      header("Location: ../../");
      exit;
    }
  } else {
    header("Location: ../../");
    exit;
  }
?>
