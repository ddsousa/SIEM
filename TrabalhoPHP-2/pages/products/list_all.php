<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."database/products.php");

  $lower_lim = null;
  $upper_lim = null;

  // Page
  $products_page = true;
  if(isset($_GET['pg'])) {
    $pg = $_GET['pg'];
  } else {
    $pg = 1;
  }

  // sort
  $sort_by = null;
  if(isset($_GET['sort_by'])) {
    $sort_by = $_GET['sort_by'];
  }

  // Price filter
  if(isset($_POST['lower_lim']) && isset($_POST['upper_lim'])) {
    $lower_lim = $_POST['lower_lim'];
    $upper_lim = $_POST['upper_lim'];
  } else if (isset($_GET['lower_lim']) && isset($_GET['upper_lim'])) {
    $lower_lim = $_GET['lower_lim'];
    $upper_lim = $_GET['upper_lim'];
  }

  // Product Type
  if(isset($_GET['type'])) {
    $type             = $_GET['type'];
    $_SESSION['type'] = $type;
    $products         = getProductsByType($pg, $type, $lower_lim, $upper_lim, $sort_by);
    $n_prod           = getNumProductsByType($type, $lower_lim, $upper_lim);
  } else {
    unset($_SESSION['type']);
    $type             = "";
    $products         = getAllProducts($pg, $lower_lim, $upper_lim, $sort_by);
    $n_prod           = getNumProducts($lower_lim, $upper_lim);
  }

  // name
  if(isset($_POST['search'])) {
    $name             = $_POST['search'];
    $type             = "";

    if($name == NULL) {
      $products = NULL;
      $n_prod = 0;
    } else {
      $products         = getProductsByName($pg, $name);
      $n_prod           = getNumProductsByName($name);
    }
  }

  $products_most_sold = getMostSoldProducts(); // returns 4 products most sold
  $prod_types         = getProductsTypes();

  $smarty->assign('products_most_sold', $products_most_sold);
  $smarty->assign('products', $products);
  $smarty->assign('n_prod', $n_prod);
  $smarty->assign('prod_types', $prod_types);
  $smarty->assign('products_page', $products_page);
  $smarty->assign('type', $type);
  $smarty->assign('lower_lim', $lower_lim);
  $smarty->assign('upper_lim', $upper_lim);
  $smarty->assign('sort_by', $sort_by);
  $smarty->display('common/header.tpl');
  $smarty->display('products/add_product_btn.tpl');
  $smarty->display('products/list_most_sold.tpl');
  $smarty->display('common/hr.tpl');
  $smarty->display('products/list.tpl');
  $smarty->display('products/list_page_numbers.tpl');
  $smarty->display('common/footer.tpl');
?>
