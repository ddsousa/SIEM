<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");

  $products = getAllProducts();

  $smarty->assign('products', $products);
  $smarty->display('common/header.tpl');
  $smarty->display('products/list_most_sold.tpl');
  $smarty->display('products/list.tpl');
  $smarty->display('common/footer.tpl');
?>
