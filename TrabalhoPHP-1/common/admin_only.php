<?php
  if(isset($_SESSION['PERMISSIONS'])) {
    if($_SESSION['PERMISSIONS'] == 0) {
      header("Location: ../../");
      exit;
    }
  } else {
    header("Location: ../../");
    exit;
  }
?>
