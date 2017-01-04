<?php
  function createClient($name, $address, $phone, $email) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO clients VALUES (default, default, ?, ?, ?, ?);");
    $stmt->execute(array($name, $address, $phone, $email));
  }

  function userExists($username) {
    global $conn;

    if(!$username)
      die('Username is missing');

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute(array($username));

    $user = $stmt->fetch();

    if(!$user) return false;
    else       return true;
  }

  function createUser($permissions, $username, $password) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users VALUES (default, default, ?, ?, ?);");
    $stmt->execute(array($permissions, $username, password_hash($password, PASSWORD_BCRYPT)));
  }

  function isLoginCorrect($username, $password) {
    global $conn;

    if(!$username || !$password)
      die('Username or Password is missing');

    $stmt = $conn->prepare("SELECT *
                            FROM users
                            WHERE username = ?;");
    $stmt->execute(array($username));
    $user = $stmt->fetch();

    if(!$user)
      return false;

    return password_verify($password, $user['password']);
  }

  function getClientId($username) {
    global $conn;

    if(!$username)
      die('Username is missing');

    $stmt = $conn->prepare("SELECT id_clients
                            FROM users
                            WHERE username = ?;");
    $stmt->execute(array($username));
    return $stmt->fetch();
  }

  function getClientData($id) {
    global $conn;

    if(!$id)
      die('ID is missing');

    $stmt = $conn->prepare("SELECT *
                            FROM clients
                            WHERE id = ?;");
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function getPermissions($username) {
    global $conn;

    if(!$username)
      die('Username is missing');

    $stmt = $conn->prepare("SELECT account_type
                            FROM users
                            WHERE username = ?;");
    $stmt->execute(array($username));
    return $stmt->fetch()['account_type'];
  }
?>
