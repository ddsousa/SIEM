<?php
function getProductsByID($id) {
  global $conn;

  if(!$id)
    die("ID is missing");

  $stmt = $conn->prepare('SELECT *
                          FROM orderdetails
                          WHERE id_orders=?;');
  $stmt->execute(array($id));
  return $stmt->fetchAll();
}
?>
