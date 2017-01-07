<?php
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
