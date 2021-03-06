<?php
  include_once("orderdetails.php");

  function deleteStock($id) {
    global $conn;

    if(!$id)
      die('ID is missing');

    $stmt = $conn->prepare("DELETE FROM stocks
                            WHERE id_products = ?;");
    $stmt->execute(array($id));
  }

  function changeStockAvailable($id, $quantity) {
    global $conn;

    if(!$id || !$quantity)
      die("ID or stock is missing");

    $stmt = $conn->prepare("UPDATE stocks
                            SET qt_available=qt_available-?
                            WHERE id_products=?;");
    $stmt->execute(array($quantity, $id));
  }

  function changeStockWarehouse($order_id) {
    global $conn;

    if(!$order_id)
      die("ID is missing");

    $order_details = getProductsByID($order_id);

    foreach($order_details as $order_detail) {
      $stmt = $conn->prepare("UPDATE stocks
                              SET qt_warehouse=qt_warehouse-?
                              WHERE id_products=?;");
      $stmt->execute(array($order_detail['quantity'], $order_detail['id_products']));
    }
  }

  function getAllStocks() {
    global $conn;

    $stmt = $conn->prepare('SELECT products.id AS prod_id, code, name, qt_warehouse, qt_available
                            FROM stocks
                            JOIN products ON products.id=id_products;');
    $stmt->execute();
    return $stmt->fetchAll();
  }

  function getStockByID($id) {
    global $conn;

    if(!$id)
      die('ID is missing');

    $stmt = $conn->prepare('SELECT *
                            FROM stocks
                            WHERE id_products=?;');
    $stmt->execute(array($id));
    return $stmt->fetch();
  }

  function newStock($id) {
    global $conn;

    if(!$id)
      die('ID is missing');

    $stmt = $conn->prepare('INSERT INTO stocks
                            VALUES (
                              default, ?, 0, 0
                            );');
    $stmt->execute(array($id));
  }

  function setStocks($id, $qt_available, $qt_warehouse) {
    global $conn;

    if(!$id || !$qt_available || !$qt_warehouse)
      die('ID or a stock is missing');

    $stmt = $conn->prepare('UPDATE stocks
                            SET qt_available=?, qt_warehouse=?
                            WHERE id_products=?;');
    $stmt->execute(array($qt_available, $qt_warehouse, $id));
  }
?>
