<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");

  if($_GET['pg']) {
    $pg = $_GET['pg'];
  } else {
    $pg = 1;
    echo "aqui";
  }

  $products = getAllProducts($pg);
  $n_prod = getNumProducts();

  $smarty->assign('products', $products);
  $smarty->assign('n_prod', $n_prod);
  $smarty->display('common/header.tpl');
  $smarty->display('products/list_most_sold.tpl');
  $smarty->display('products/list.tpl');
  $smarty->display('products/list_page_numbers.tpl');
  $smarty->display('common/footer.tpl');
?>
