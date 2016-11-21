<?php
	function getAllProducts() {
		global $conn;
		$stmt = $conn->prepare('SELECT *
                          	FROM products;');
	  $stmt->execute();
	  return $stmt->fetchAll();
	}
?>
