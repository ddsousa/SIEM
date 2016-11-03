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

  function getClientData($id_client) {
    global $conn;
    $result = pg_query($conn, "SELECT codigo, nome, morada, telefone, email
                               FROM cliente
                               WHERE id = $id_client");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    if(pg_num_rows($result) == 0) return -1;
    else {
      $result = pg_fetch_row($result, 0);

      $client_data['codigo']        = $result[0];
      $client_data['nome']          = $result[1];
      $address                      = $result[2];
      parse_str($address);
      $client_data['morada']        = $morada;
      $client_data['codigopostal1'] = $pc1;
      $client_data['codigopostal2'] = $pc2;
      $client_data['telefone']      = $result[3];
      $client_data['email']         = $result[4];

      return $client_data;
    }
  }

  function updateClient($id, $name, $address, $phone, $email) {
    global $conn;

    $name = "'" . $name . "'";
    $email = "'" . $email . "'";

    $result = pg_query($conn, "UPDATE cliente
                               SET    nome=$name, morada=$address, telefone=$phone, email=$email
                               WHERE  id=$id");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    if(pg_num_rows($result) == 0) return -1;
    else return 0;
  }

  function getClients() {
    global $conn;

    $result = pg_exec($conn, "SELECT *
                              FROM cliente;");
    if(!$result) {
      echo "An error occured.\n";
      exit;
    }

    return pg_fetch_all($result);
  }
?>
