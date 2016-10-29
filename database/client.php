<?php

  function createClient($name, $address, $phone, $email) {
    global $conn;
    $result = pg_query($conn, "INSERT INTO cliente
                               VALUES (default, default,
                                      $name,
                                      $address,
                                      $phone,
                                      $email)
                               RETURNING id;");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    $id = pg_fetch_row($result, 0);
    $id = $id[0];
    return $id;
  }
?>
