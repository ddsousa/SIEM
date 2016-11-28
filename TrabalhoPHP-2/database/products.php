<?php
	function getAllProducts($pg) {
		global $conn;
		if($pg!=-1) {
			$limit  = 8;
			$offset = ($pg-1)*8;
		} else {
			$limit  = getNumProducts();
			$offset = 0;
		}

		$stmt = $conn->prepare('SELECT *
                          	FROM products
														ORDER BY name ASC
														LIMIT ? OFFSET ? ;');
	  $stmt->execute(array($limit, $offset));
	  return $stmt->fetchAll();
	}

	function getMostSoldProducts() {
		global $conn;
		$stmt = $conn->prepare('SELECT *
														FROM products
														ORDER BY n_sales DESC, name
														LIMIT 4;');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getNumProducts() {
		global $conn;
		$stmt = $conn->prepare('SELECT COUNT(*)
														FROM products;');
		$stmt->execute();
		return $stmt->fetchAll()[0]['count'];
	}
?>
