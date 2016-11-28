<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");

  if($_GET['id']) {
    $id_product = $_GET['id'];
  } else {
    // If there's no ID in the GET!???
  }

  $product = searchProductById($id_product);

  $smarty->assign('product', $product);

  $smarty->display('common/header.tpl');
  $smarty->display('products/details.tpl');
  $smarty->display('common/footer.tpl');
?>
