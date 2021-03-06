<?php
  include_once("user.php");
  include_once("stock.php");

  function newOrder($cart_items) {
    global $conn;

    if(!isset($_SESSION['USERNAME'])) {
      echo "An error occured.\n";
        return false;
    }
    $client_id = getClientId($_SESSION['USERNAME']);

    // create order
    $result = pg_query($conn, "INSERT INTO encomenda
                               VALUES (default,
                                      'Pendente',
                                      default,
                                      $client_id,
                                      current_timestamp)
                              RETURNING id");

    if(!$result) {
      echo "An error occured.\n";
      return false;
    }
    $order_id = pg_fetch_row($result, 0)[0];

    foreach ($cart_items as $item) {
      // create order detail
      $id = $item['id'];
      $quantity = $item['quantity'];
      $result = pg_query($conn, "INSERT INTO detalhesencomenda
                                 VALUES (default,
                                        $order_id,
                                        $id,
                                        $quantity);");
      if(!$result) {
        echo "An error occured.\n";
        return false;
      }

      // increment product number of sales
      $result = pg_query($conn, "UPDATE produto
                                 SET n_vendas = n_vendas + $quantity
                                 WHERE id = $id;");
      if(!$result) {
        echo "An error occured.\n";
        return false;
      }

      // update stock
      $result = pg_query($conn, "UPDATE stock
                                 SET qt_disponivel = qt_disponivel - $quantity
                                 WHERE id_produto = $id;");
      if(!$result) {
        echo "An error occured.\n";
        return false;
      }
    }
    return true;
  }

  function getOrderDetails($id_order) {
    global $conn;

    $result = pg_query($conn, "SELECT cliente.nome, numero, estado, to_char(data_efetuada, 'DD-MM-YYYY HH24:MI') AS data_efetuada, COUNT(encomenda.numero) AS artigos, SUM(quantidade * preco) AS total
                               FROM encomenda
                               JOIN cliente ON encomenda.id_cliente = cliente.id AND encomenda.id = $id_order
                               JOIN detalhesencomenda ON detalhesencomenda.id_encomeda = encomenda.id
                               JOIN produto ON detalhesencomenda.id_produto = produto.id
                               GROUP BY encomenda.id, cliente.nome");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    $result = pg_fetch_assoc($result, 0);
    return $result;
  }

  function getOrders($id_client) {
    global $conn;

    $result = pg_query($conn, "SELECT numero, estado, to_char(data_efetuada, 'DD-MM-YYYY HH24:MI') AS data_efetuada, COUNT(encomenda.numero) AS artigos, SUM(quantidade * preco) AS total
                               FROM encomenda
                               JOIN cliente ON encomenda.id_cliente = cliente.id AND id_cliente = $id_client
                               JOIN detalhesencomenda ON detalhesencomenda.id_encomeda = encomenda.id
                               JOIN produto ON detalhesencomenda.id_produto = produto.id
                               GROUP BY encomenda.id;");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    return pg_fetch_all($result);
  }

  function getAllOrders($sort_by) {
    global $conn;

    $add_query = "";

    if($sort_by!=null) {
      $add_query = " ORDER BY $sort_by";
    }

    $result = pg_query($conn, "SELECT encomenda.id, cliente.id AS idclient, cliente.nome, numero, estado, to_char(data_efetuada, 'DD-MM-YYYY HH24:MI') AS data_efetuada, COUNT(encomenda.numero) AS artigos, SUM(quantidade * preco) AS total
                               FROM encomenda
                               JOIN cliente ON encomenda.id_cliente = cliente.id
                               JOIN detalhesencomenda ON detalhesencomenda.id_encomeda = encomenda.id
                               JOIN produto ON detalhesencomenda.id_produto = produto.id
                               GROUP BY encomenda.id, cliente.id" . $add_query.";");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    return pg_fetch_all($result);
  }

  function updateOrderState($id, $state) {
    global $conn;

    if($state == "Enviada") {
      checkOrderDelivered($id);
    }

    $state = "'" . $state . "'";

    $result = pg_query($conn, "UPDATE encomenda
                               SET    estado=$state
                               WHERE  id=$id");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }
  }

 ?>
