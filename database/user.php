<?php

  function createUser($id, $permissions, $username, $password) {
    $id = intval($id);
    $password = "'" . sha1($password) . "'";
    global $conn;

    $result = pg_query($conn, "INSERT INTO utilizador
                               VALUES (default,
                                      $id,
                                      $permissions,
                                      $username,
                                      $password)");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }
  }

  function isLoginCorrect($username, $password) {
    global $conn;

    $username = "'" . $username . "'";
    $password = "'" . sha1($password) . "'";

    $result = pg_query($conn, "SELECT tipo_conta
                               FROM utilizador
                               WHERE username = $username AND password = $password");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }
    if(pg_num_rows($result) == 0) return 0;
    else {
      $login_permissions = pg_fetch_row($result, 0);
      $login_permissions = $login_permissions[0] + 1;
      return $login_permissions;
    }
  }

  function userExists($username) {
    global $conn;

    $result = pg_query($conn, "SELECT *
                               FROM utilizador
                               WHERE username = $username");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    return pg_num_rows($result);
  }

  function getClientId($username) {
    global $conn;

    $username = "'" . $username . "'";

    $result = pg_query($conn, "SELECT id_cliente
                               FROM utilizador
                               WHERE username = $username");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    if(pg_num_rows($result) == 0) return -1;
    else {
      $id_client = pg_fetch_row($result, 0);
      return $id_client[0];
    }
  }

  function updatePassword($username, $password) {
    global $conn;

    $username = "'" . $username . "'";
    $password = "'" . sha1($password) . "'";

    $result = pg_query($conn, "UPDATE utilizador
                               SET    password=$password
                               WHERE  username=$username");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    if(pg_num_rows($result) == 0) return -1;
    else return 0;
  }
?>
