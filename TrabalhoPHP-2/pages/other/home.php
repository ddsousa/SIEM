<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");

  $products_most_sold = getMostSoldProducts();

  $smarty->assign('products_most_sold', $products_most_sold);
  $smarty->display('common/header.tpl');
  $smarty->display('products/list_most_sold.tpl');
  $smarty->display('other/home.tpl');
  $smarty->display('common/footer.tpl');
?>
