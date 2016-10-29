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
?>
