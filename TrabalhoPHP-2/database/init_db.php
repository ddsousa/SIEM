<?php
	$HOSTNAME = 'db.fe.up.pt';
  $DATABASE = 'siem1636';
  $USER     = 'siem1636';
  $PASSWORD = 'siempr16';

  $conn = new PDO('pgsql:host='.$HOSTNAME.';dbname='.$DATABASE, $USER, $PASSWORD);
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // activate db exceptions

  $stmt = $conn->prepare("SET SCHEMA 'trabalhophp2';");
  $stmt->execute();
?>
