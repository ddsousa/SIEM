<?php

  function getAllStocks() {
    global $conn;

    $result = pg_query($conn, "SELECT produto.id, codigo, nome, qt_armazem, qt_disponivel
                               FROM stock
                               JOIN produto ON stock.id_produto = produto.id");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    return pg_fetch_all($result);
  }

  function getStocks($id_product) {
    global $conn;

    $result = pg_query($conn, "SELECT qt_armazem, qt_disponivel
                               FROM stock
                               JOIN produto ON stock.id_produto = produto.id
                               WHERE produto.id = $id_product");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }

    if(pg_num_rows($result) > 0)
      $result = pg_fetch_assoc($result, 0);

    return $result;
  }

  function updateStocks($id_product, $qt_armazem, $qt_disponivel) {
    global $conn;

    $result = pg_query($conn, "UPDATE stock
                               SET    qt_armazem=$qt_armazem, qt_disponivel=$qt_disponivel
                               WHERE  id_produto=$id_product");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }
  }

  function newStock($id_product) {
    global $conn;

    $result = pg_query($conn, "INSERT INTO stock
                               VALUES ( default,
                                        $id_product,
                                        0,
                                        0)");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }
  }

  function deleteStock($id_product) {
    global $conn;

    $result = pg_query($conn, "DELETE FROM stock
                               WHERE id_produto = $id_product");
    if (!$result) {
      echo "An error occured.\n";
      exit;
    }
  }

  function checkOrderDelivered($id_order) {
    global $conn;

    $result = pg_query($conn, "SELECT id_produto
                               FROM   detalhesencomenda
                               WHERE  id_encomeda = $id_order");
    if (!$result) {
     echo "An error occured.\n";
     exit;
    }

    $product = pg_fetch_assoc($result, 0);

		while (isset($product["id"])) {
      $result = pg_query($conn, 'UPDATE stock
                                 SET    qt_armazem = qt_armazem -
                                   (
                                     SELECT quantidade
                                     FROM detalhesencomenda
                                     WHERE id_produto = $product["id"] AND id_encomeda = $id_order
                                   )
                                 WHERE  id_produto = $product["id"]');
      if (!$result) {
        echo "An error occured.\n";
        exit;
      }
		}
  }

 ?>
