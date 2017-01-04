<?php
	function getClientIDByUsername($username) {
		global $conn;

		if(!$username)
			return null;

		$stmt = $conn->prepare("SELECT clients.id
														FROM clients
														JOIN users ON (clients.id = id_clients)
														WHERE username = ?;");
		$stmt->execute(array($username));
		$result = $stmt->fetch();
		return $result['id'];
	}
?>
