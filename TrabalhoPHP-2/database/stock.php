<?php
  function deleteStock($id) {
    global $conn;

    if(!$id)
      die('ID is missing');

    $stmt = $conn->prepare("DELETE FROM stocks
                            WHERE id_products = ?;");
    $stmt->execute(array($id));
  }
?>
