<?php

  function getOrders($id_client) {
    global $conn;

    $result = pg_query($conn, "SELECT numero, MIN(data_efetuada) AS data, COUNT(encomenda.numero) AS artigos, SUM(quantidade * preco) AS total
                               FROM encomenda
                               JOIN cliente ON encomenda.id_cliente = cliente.id AND id_cliente = $id_client
                               JOIN produto ON encomenda.id_produto = produto.id
                               GROUP BY encomenda.numero");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    return $result;
  }

 ?>
