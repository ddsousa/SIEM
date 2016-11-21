<?php

  function createUser($username, $realname, $password) {
    global $conn;
		echo "INSERT INTO users VALUES (".$username." ".$realname." ".$password.")";
    $stmt = $conn->prepare("INSERT INTO users VALUES (?, ?, ?)");
    $stmt->execute(array($username, $realname, sha1($password)));
  }

?>
