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

	function getNumProductsByType($type) {
		global $conn;
		if(!$type)
			die('Type missing');
		$stmt = $conn->prepare('SELECT COUNT(*)
														FROM products
														WHERE type = ?;');
		$stmt->execute(array($type));
		return $stmt->fetchAll()[0]['count'];
	}

	function searchProductById($id) {
		global $conn;
		$stmt = $conn->prepare('SELECT *
														FROM products
														WHERE id = ?;');
		$stmt->execute(array($id));
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	function getProductsTypes() {
		global $conn;
		$stmt = $conn->prepare('SELECT DISTINCT type
														FROM products;');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getProductsByType($pg, $type) {
		global $conn;
		if(!$type)
			die('Type missing');
		if($pg!=-1) {
			$limit  = 8;
			$offset = ($pg-1)*8;
		} else {
			$limit  = getNumProductsByType($type);
			$offset = 0;
		}

		$stmt = $conn->prepare('SELECT *
                          	FROM products
                          	WHERE type = ?
														ORDER BY name ASC
														LIMIT ? OFFSET ? ;');
	  $stmt->execute(array($type, $limit, $offset));
	  return $stmt->fetchAll();
	}
?>
