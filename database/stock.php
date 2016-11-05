<?php
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

 ?>
