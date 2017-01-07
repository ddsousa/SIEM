<?php
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

  function changeStockWarehouse($id, $quantity) {
    global $conn;

    if(!$id || !$quantity)
      die("ID or stock is missing");

    $stmt = $conn->prepare("UPDATE stocks
                            SET qt_warehouse=qt_warehouse-?
                            WHERE id_products=?;");
    $stmt->execute(array($quantity, $id));
  }
?>
