<?php

  function getOrders($id_client) {
    global $conn;

    $result = pg_query($conn, "SELECT numero, estado, data_efetuada, COUNT(encomenda.numero) AS artigos, SUM(quantidade * preco) AS total
                               FROM encomenda
                               JOIN cliente ON encomenda.id_cliente = cliente.id AND id_cliente = $id_client
                               JOIN detalhesencomenda ON detalhesencomenda.id_encomeda = encomenda.id
                               JOIN produto ON detalhesencomenda.id_produto = produto.id
                               GROUP BY encomenda.id");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    return $result;
  }

 ?>
