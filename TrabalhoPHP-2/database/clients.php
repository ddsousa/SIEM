<?php
	function editClientDetails($id, $name, $address, $email, $phone) {
		global $conn;

		if(!$id || !$name || !$address || !$email || !$phone)
			die('fiels are missing');

		$stmt = $conn->prepare('UPDATE clients
														SET name=?, address=?, phone=?, email=?
														WHERE id=?;');
		$stmt->execute(array($name, $address, $phone, $email, $id));
	}

	function getClientIDByUsername($username) {
		global $conn;

		if(!$username)
			die('Username is missing');

		$stmt = $conn->prepare("SELECT clients.id
														FROM clients
														JOIN users ON (clients.id = id_clients)
														WHERE username = ?;");
		$stmt->execute(array($username));
		$result = $stmt->fetch();
		return $result['id'];
	}

	function getClientByID($id) {
		global $conn;

		if(!$id)
			die('ID is missing');

		$stmt = $conn->prepare("SELECT clients.id AS id, name, address, email, phone, username
														FROM clients
														JOIN users ON clients.id=id_clients
														WHERE clients.id=?;");
		$stmt->execute(array($id));
		$client = $stmt->fetch();
		print_r($client);
		$address 								= $client['address'];
		parse_str($address);
		$client['address_name'] = $addressname;
		$client['zc1']     			= $zc1;
		$client['zc2']					= $zc2;

		return $client;
	}

	function getClientDetails($id) {
		global $conn;

		if(!$id)
			die('Client ID is missing');

		$stmt = $conn->prepare("SELECT *
														FROM clients
														WHERE id = ?;");
		$stmt->execute(array($id));
		$result = $stmt->fetch();

		$client_data['id']            = $result['id'];
    $client_data['code']     		  = $result['code'];
    $client_data['name']          = $result['name'];
    $address                      = $result['address'];
    parse_str($address);
    $client_data['address']       = $addressname;
    $client_data['zc1'] 					= $zc1;
    $client_data['zc2'] 					= $zc2;
    $client_data['phone']    		  = $result['phone'];
    $client_data['email']         = $result['email'];

    return $client_data;
	}

	function getAllClients() {
		global $conn;

		$stmt = $conn->prepare('SELECT *
														FROM clients;');
		$stmt->execute();
		$result = $stmt->fetchAll();
		foreach($result as $key => $client) {
			$address 								= $client['address'];
			parse_str($address);
			$result[$key]['address_name'] = $addressname;
			$result[$key]['zip-code']     = $zc1.'-'.$zc2;
		}
		return $result;
	}
?>
