<?php
	function getClientIDByUsername($username) {
		global $conn;

		if(!$username)
			return null;

		$stmt = $conn->prepare("SELECT clients.id
														FROM clients
														JOIN users ON (clients.id = id_clients)
														WHERE username = 'pr27';");
		$stmt->execute();
		$result = $stmt->fetch();
		return $result['id'];
	}
?>