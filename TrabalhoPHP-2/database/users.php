<?php
  function createClient($name, $address, $phone, $email) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO clients VALUES (default, default, ?, ?, ?, ?);");
    $stmt->execute(array($name, $address, $phone, $email));
  }

  function createUser($permissions, $username, $password) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users VALUES (default, default, ?, ?, ?)");
    $stmt->execute(array($permissions, $username, sha1($password)));
  }

  function isLoginCorrect($username, $password) {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM users
                            WHERE username = ? AND password = ?");
    $stmt->execute(array($username, sha1($password)));
    return $stmt->fetch() == true;
  }

  function getClientId($username) {
    global $conn;
    $stmt = $conn->prepare("SELECT id_clients
                            FROM users
                            WHERE username = ?");
    $stmt->execute(array($username));
    return $stmt->fetch();
  }

  function getClientData($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT *
                            FROM clients
                            WHERE id = ?");
    $stmt->execute(array($id));
    return $stmt->fetch();
  }
?>
