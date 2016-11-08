<?php
  session_start();

	if(empty($_SESSION['cart_item'])) {
	  $_SESSION['cart_item'] = array();
	}

  $BASE_DIR = dirname(__DIR__);

  include_once($BASE_DIR."/database/connect.php");

  // database connection
  $host     = "db.fe.up.pt";
  $dbname   = "siem1636";
  $user     = "siem1636";
  $password = "siempr16";

  $conn = connect($host, $dbname, $user, $password);
  if(!$conn) {
    exit;
  }

  setSchema("trabalhophp1");
?>
