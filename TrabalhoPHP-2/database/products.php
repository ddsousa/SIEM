<?php
	function getAllProducts() {
		global $conn;
		$stmt = $conn->prepare('SELECT *
                          FROM produto;');
	  $stmt->execute();
	  return $stmt->fetchAll();
	}
?>