<?php
  $BASE_DIR = dirname(__DIR__);

  $conn = pg_connect("host=db.fe.up.pt dbname=siem1609 user=siem1609 password=QLJVntPx");
  if (!$conn) {
    echo "An error occured.\n";
    exit;
  }

  $query = "set schema 'siem';";
  pg_exec($conn, $query);
?>
