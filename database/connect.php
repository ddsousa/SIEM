<?php
	function connect($host, $dbname, $user, $password) {
		if($host!=null && $dbname!=null && $user!=null && $password!=null) {
			$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password");
			
			if (!$conn) {
		    echo "ERROR - Cannot connect to the database.\n";
		    return null;
		  }
		  return $conn;
		}
	}

	function setSchema($schema) {
		global $conn;

		if($schema!=null) {
			$query = "SET SCHEMA '$schema'";
			pg_exec($conn, $query);
		}
	}
?>