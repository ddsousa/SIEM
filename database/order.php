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

  function getAllOrders($sort_by) {
    global $conn;

    $add_query = "";

    if($sort_by!=null) {
      $add_query = " ORDER BY $sort_by";
    }

    $result = pg_query($conn, "SELECT cliente.nome, numero, estado, data_efetuada, COUNT(encomenda.numero) AS artigos, SUM(quantidade * preco) AS total
                               FROM encomenda
                               JOIN cliente ON encomenda.id_cliente = cliente.id
                               JOIN detalhesencomenda ON detalhesencomenda.id_encomeda = encomenda.id
                               JOIN produto ON detalhesencomenda.id_produto = produto.id
                               GROUP BY encomenda.id, cliente.id" . $add_query);
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    return $result;
  }

 ?>
