<?php
  if(!isset($_SESSION['permissions'])) {
    header("Location: ../..");
    exit;
  }
?>
