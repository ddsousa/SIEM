<?php
	function getAllProducts($pg, $lower_lim, $upper_lim) {
		global $conn;
		$query = "SELECT *
							FROM products
							WHERE 1=1";

		if($lower_lim && $upper_lim) {
			$query .= "AND price >= ? AND price <= ? ";
			$query_values_array = array($lower_lim, $upper_lim);
		}

		if($pg!=-1) {
			$limit  = 8;
			$offset = ($pg-1)*8;
		} else {
			$limit  = getNumProducts($lower_lim, $upper_lim);
			$offset = 0;
		}
		if(isset($query_values_array)) {
			array_push($query_values_array, $limit);
			array_push($query_values_array, $offset);
		} else {
			$query_values_array = array($limit, $offset);
		}

		$query .= 'ORDER BY name ASC
		 					 LIMIT ? OFFSET ?;';

		$stmt = $conn->prepare($query);

		$stmt->execute($query_values_array);
	  return $stmt->fetchAll();
	}

	function getProductsByType($pg, $type, $lower_lim, $upper_lim) {
		global $conn;
		$query = "SELECT *
							FROM products
							WHERE 1=1";

		if(!$type)
			die('Type missing');

		$query .= " AND type = ?";
		$query_values_array = array($type);

		if($lower_lim && $upper_lim) {
			$query .= " AND price >= ? AND price <= ? ";
			array_push($query_values_array, $lower_lim);
			array_push($query_values_array, $upper_lim);
		}

		if($pg!=-1) {
			$limit  = 8;
			$offset = ($pg-1)*8;
		} else {
			$limit  = getNumProductsByType($type);
			$offset = 0;
		}

		array_push($query_values_array, $limit);
		array_push($query_values_array, $offset);

		$query .= 'ORDER BY name ASC
							 LIMIT ? OFFSET ? ;';

		$stmt = $conn->prepare($query);
		$stmt->execute($query_values_array);
		return $stmt->fetchAll();
	}

	function getProductByID($id) {
		global $conn;

		$stmt = $conn->prepare('SELECT *
														FROM products
														WHERE id = ?;');
		$stmt->execute(array($id));
		return $stmt->fetch();
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

	function getNumProducts($lower_lim, $upper_lim) {
		global $conn;
		$query_where_aux = "";
		if($lower_lim && $upper_lim) {
			$query_where_aux = "WHERE price >= ? AND price <= ? ";
			$query_values_array = array($lower_lim, $upper_lim);
		}
		$stmt = $conn->prepare('SELECT COUNT(*)
														FROM products '.$query_where_aux.';');
		if($lower_lim && $upper_lim) {
			$stmt->execute($query_values_array);
		} else {
			$stmt->execute();
		}
		return $stmt->fetchAll()[0]['count'];
	}

	function getNumProductsByType($type, $lower_lim, $upper_lim) {
		global $conn;
		if(!$type)
			die('Type missing');
		$query_values_array = array($type);
		$query_where_aux = "";
		if($lower_lim && $upper_lim) {
			$query_where_aux = "AND price >= ? AND price <= ? ";
			array_push($query_values_array, $lower_lim);
			array_push($query_values_array, $upper_lim);
		}
		$stmt = $conn->prepare('SELECT COUNT(*)
														FROM products
														WHERE type = ? '.$query_where_aux.';');
		$stmt->execute($query_values_array);
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

?>
