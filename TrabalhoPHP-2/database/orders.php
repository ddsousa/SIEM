<?php
	include_once("clients.php");

	function getAllOrders() {
		global $conn;

		$stmt = $conn->prepare('SELECT clients.name AS client_name, clients.id AS client_id, orders.id AS order_id, num, state, order_date, COUNT(orderdetails.id) AS num_products, SUM(quantity*price) AS total_price
														FROM orders
														JOIN orderdetails ON (orders.id=orderdetails.id_orders)
														JOIN products ON orderdetails.id_products=products.id
														JOIN clients ON clients.id=id_clients
														GROUP BY orders.id, clients.name, clients.id;');
		$stmt->execute();
		return $stmt->fetchAll();
	}

	function getOrdersByClient($username) {
		global $conn;

		if(!$username)
			die('Username is missing');

		$client_id = getClientIDByUsername($username);

		$stmt = $conn->prepare('SELECT clients.name AS client_name, clients.id AS client_id, orders.id AS order_id, num, state, order_date, COUNT(orderdetails.id) AS num_products, SUM(quantity*price) AS total_price
														FROM orders
														JOIN orderdetails ON (orders.id=orderdetails.id_orders AND id_clients = ?)
														JOIN products ON orderdetails.id_products=products.id
														JOIN clients ON clients.id=id_clients
														GROUP BY orders.id, clients.name, clients.id;');
		$stmt->execute(array($client_id));
		return $stmt->fetchAll();
	}

	function getOrderByID($id) {
		global $conn;

		if(!$id)
			die('ID is missing');

		$stmt = $conn->prepare('SELECT clients.name, num, state, order_date, count(orderdetails.id) AS num_products, sum(price) as total_price, orders.id AS order_id
														FROM orders
														JOIN clients ON clients.id=id_clients
														JOIN orderdetails ON id_orders=orders.id
														JOIN products ON products.id=id_products
														WHERE orders.id=?
														GROUP BY clients.name, orders.num, orders.state, orders.order_date, orders.id;');
		$stmt->execute(array($id));
		return $stmt->fetch();
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

	function updateOrderState($id, $state) {
		global $conn;

		if(!$id || !$state)
			die("ID or state is missing");

		$stmt = $conn->prepare('UPDATE orders
														SET state = ?
														WHERE id = ?;');
		$stmt->execute(array($state, $id));
	}
?>
