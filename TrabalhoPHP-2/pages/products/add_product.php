<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR.'config/admin_only.php');
  include_once($BASE_DIR.'database/products.php');

  $products_page = true;
  $categories = getProductsTypes();

  $smarty->assign('categories', $categories);
  $smarty->assign('products_page', $products_page);
  $smarty->display('common/header.tpl');
  $smarty->display('products/add_product.tpl');
  $smarty->display('common/footer.tpl');
?>
