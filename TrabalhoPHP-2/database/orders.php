<?php
	include_once("clients.php");

	function getOrdersByClient($username) {
		global $conn;

		if(!$username)
			return null;
		$client_id = getClientIDByUsername($username);

		$stmt = $conn->prepare('SELECT *
		                        FROM orders
		                        WHERE id_clients = ?
		                        ORDER BY order_date DESC;');

		$stmt->execute(array($client_id));
		return $stmt->fetchAll();
	}

	function newOrder($cart) {
		global $conn;
		if(!$cart)
			return false;

		$client_id = getClientIDByUsername($_SESSION['username']);
		print_r($client_id);

		$stmt = $conn->prepare("INSERT INTO orders
														VALUES (default,
																		'Pendente',
																		default,
																		?,
																		current_timestamp)
																		RETURNING id;");
		$stmt->execute(array($client_id));
		$result   = $stmt->fetch();
		$order_id = $result['id'];
		foreach($cart as $key => $item_quantity) {
			$prod_id  = $key;
			echo "<br>".$prod_id;
			$quantity = $item_quantity;

			$stmt = $conn->prepare("INSERT INTO orderdetails
															VALUES (default,
																			?, ?, ?);");
			$stmt->execute(array($order_id, intval($prod_id), intval($quantity)));
		}
		return true;
	}
?>