<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR."config/admin_only.php");
  include_once($BASE_DIR."database/stock.php");

  $stocks = getAllStocks();

  $smarty->assign('stocks', $stocks);
  $smarty->display('common/header.tpl');
  $smarty->display('stocks/list_stocks.tpl');
  $smarty->display('common/footer.tpl');
?>
