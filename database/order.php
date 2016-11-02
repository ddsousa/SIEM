<?php

  function getOrders($id_client) {
    global $conn;

    $id_client = '"' . $id_clientn. '"';

    $result = pg_query($conn, "SELECT numero, data_efetuada, COUNT(encomenda.numero), SUM(produto.preco)
                               FROM encomenda
                               JOIN cliente ON encomenda.id_cliente = cliente.id
                               JOIN produto ON encomenda.id_produto = produto.id
                               WHERE id_cliente = $id_client");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    $id = pg_fetch_row($result, 0);
    $id = $id[0];
    return $id;
  }

 ?>
