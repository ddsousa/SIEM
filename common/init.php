<?php
  session_start();

  $BASE_DIR = dirname(__DIR__);

  $conn = pg_connect("host=db.fe.up.pt dbname=siem1636 user=siem1636 password=siempr16");
  if (!$conn) {
    echo "An error occured.\n";
    exit;
  }

  $query = "set schema 'trabalhophp1';";
  pg_exec($conn, $query);
?>