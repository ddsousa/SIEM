<?php
	include_once("../../config/init.php");
	
	$total_price = 0;
	if(isset($_SESSION['cart'])) {
		foreach($_SESSION['cart'] as $key => $item)
			$total_price += $item['price']*$item['quantity'];
	}
	
	$smarty->assign('total_price', $total_price);
	$smarty->display('common/header.tpl');
	$smarty->display('products/display_cart.tpl');
	$smarty->display('common/footer.tpl');
?>	