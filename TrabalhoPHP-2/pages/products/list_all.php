<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");

  $_SESSION['active_page'] = 'Produtos';
  // Page
  if($_GET['pg']) {
    $pg = $_GET['pg'];
  } else {
    $pg = 1;
  }

  // Product Type
  if($_GET['type']) {
    $type       = $_GET['type'];
    $products   = getProductsByType($pg, $type);
    $n_prod     = getNumProductsByType($type);
  } else {
    unset($_SESSION['type']);
    $products   = getAllProducts($pg);
    $n_prod     = getNumProducts();
  }



  $products_most_sold = getMostSoldProducts(); // returns 4 products most sold
  $prod_types         = getProductsTypes();

  $smarty->assign('products_most_sold', $products_most_sold);
  $smarty->assign('products', $products);
  $smarty->assign('n_prod', $n_prod);
  $smarty->assign('prod_types', $prod_types);
  $smarty->display('common/header.tpl');
  $smarty->display('products/list_most_sold.tpl');
  $smarty->display('products/list.tpl');
  $smarty->display('products/list_page_numbers.tpl');
  $smarty->display('common/footer.tpl');
?>
