<?php
	function getAllProducts() {
		global $conn;
		$stmt = $conn->prepare('SELECT *
                          	FROM products;');
	  $stmt->execute();
	  return $stmt->fetchAll();
	}

	function getMostSoldProducts() {
		global $conn;
		$stmt = $conn->prepare('SELECT *
														FROM products
														ORDER BY n_sales DESC, name;');
		$stmt->execute();
		return $stmt->fetchAll();
	}
?>
