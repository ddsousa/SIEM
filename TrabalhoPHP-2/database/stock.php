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
?>
