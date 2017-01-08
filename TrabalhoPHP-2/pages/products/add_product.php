<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR.'config/admin_only.php');
  include_once($BASE_DIR.'database/products.php');

  $categories = getProductsTypes();

  $smarty->assign('categories', $categories);
  $smarty->display('common/header.tpl');
  $smarty->display('products/add_product.tpl');
  $smarty->display('common/footer.tpl');
?>
