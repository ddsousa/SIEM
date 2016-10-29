<?php
  $conn = pg_connect("host=db.fe.up.pt dbname=siem1636 user=siem1636 password=siempr16");
  if(!$conn) {
		print "ERRO: Não foi possível estabelecer ligação com a base de dados";
		exit;
	}
  
  $query = "SET SCHEMA 'trabalhophp1'";
  $result = pg_exec($conn, $query);
?>
