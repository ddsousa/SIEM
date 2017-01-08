<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");
  include_once($BASE_DIR."database/stock.php");

  if($_GET['id']) {
    $id_product = $_GET['id'];
  } else {
    // If there's no ID in the GET!???
  }

  $product    = searchProductById($id_product);
  $prod_types = getProductsTypes();

  $smarty->assign('product', $product);
  $smarty->assign('prod_types', $prod_types);

  $smarty->display('common/header.tpl');
  $smarty->display('common/prod_type_menu.tpl');
  if(isset($_SESSION['permissions'])) {
    if($_SESSION['permissions'] == 0)
      $smarty->display('products/details.tpl');
    else {
      $stock = getStockByID($product['id']);
      $smarty->assign('stock', $stock);
      $smarty->display('products/edit_product.tpl');
    }
  }
  $smarty->display('common/footer.tpl');
?>
