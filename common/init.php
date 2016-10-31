<?php
  session_start();

	if(empty($_SESSION['cart_item'])) {
	  $_SESSION['cart_item'] = array();
	}

  $BASE_DIR = dirname(__DIR__);

  $conn = pg_connect("host=db.fe.up.pt dbname=siem1636 user=siem1636 password=siempr16");
  if (!$conn) {
    echo "An error occured.\n";
    exit;
  }

  $query = "SET SCHEMA 'trabalhophp1';";
  pg_exec($conn, $query);
?>
