<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");

  if($_GET['pg']) {
    $pg = $_GET['pg'];
  } else {
    $pg = 1;
  }

  $products_most_sold = getMostSoldProducts(); // returns 4 products most sold
  $products = getAllProducts($pg);
  $n_prod = getNumProducts();

  $smarty->assign('products_most_sold', $products_most_sold);
  $smarty->assign('products', $products);
  $smarty->assign('n_prod', $n_prod);
  $smarty->display('common/header.tpl');
  $smarty->display('common/navbar.tpl');
  $smarty->display('products/list_most_sold.tpl');
  $smarty->display('products/list.tpl');
  $smarty->display('products/list_page_numbers.tpl');
  $smarty->display('common/footer.tpl');
?>
