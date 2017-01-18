<?php
	include_once("clients.php");
	include_once("stock.php");
	include_once("products.php");

	function getAllOrders($pg, $sort_by) {
		global $conn;
		$query_values_array = array();

		if($pg==null)				$pg=1;
		if($sort_by==null)	$sort_by='date_desc';

		$query = 'SELECT clients.name AS client_name, clients.id AS client_id, orders.id AS order_id, num, state, order_date, COUNT(orderdetails.id) AS num_products, SUM(quantity*price) AS total_price
							FROM orders
							JOIN orderdetails ON (orders.id=orderdetails.id_orders)
							JOIN products ON orderdetails.id_products=products.id
							JOIN clients ON clients.id=id_clients
							GROUP BY orders.id, clients.name, clients.id ';

		if($sort_by=='name') {
			$query .= 'ORDER BY client_name ASC';
		}
		else if($sort_by=='date_asc') {
			$query .= 'ORDER BY order_date ASC';
		}
		else if($sort_by=='date_desc') {
			$query .= 'ORDER BY order_date DESC';
		}
		else if($sort_by=='price_asc') {
			$query .= 'ORDER BY total_price ASC';
		}
		else if($sort_by=='price_desc') {
			$query .= 'ORDER BY total_price DESC';
		}

		$query .= ' LIMIT ? OFFSET ?;';

		$limit  = 8;
		$offset = ($pg-1)*8;

		array_push($query_values_array, $limit);
		array_push($query_values_array, $offset);

		$stmt = $conn->prepare($query);
		$stmt->execute($query_values_array);
		return $stmt->fetchAll();
	}

	function getNumOrders() {
		global $conn;

		$query_where_aux = "WHERE visibility=TRUE";

		$stmt = $conn->prepare('SELECT COUNT(*)
														FROM orders ;');
		$stmt->execute();
		return $stmt->fetchAll()[0]['count'];
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
														GROUP BY orders.id, clients.name, clients.id
														ORDER BY order_date DESC;');
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
			$quantity = $item_quantity['quantity'];

			$stmt = $conn->prepare("INSERT INTO orderdetails
															VALUES (default,
																			?, ?, ?);");
			$stmt->execute(array($order_id, intval($prod_id), intval($quantity)));

			incrementNumSales($prod_id, $quantity);
			changeStockAvailable($prod_id, $quantity);
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
