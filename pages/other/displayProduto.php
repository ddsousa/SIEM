<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR."/database/product.php");
/*
	if(!empty($_GET['action'])) {
		if($_GET['action'] == 'add') {
			if(!empty($_POST['quantity']) && !empty($_GET['id'])) {
				$id = $_GET['id'];
				$product = searchProductById($id);

				$cart_item = array('id'=>$id, 'name'=>$product[2], 'price'=>$product[5], 'price_unit'=>$product[6], 'quantity'=>$_POST['quantity']);
				$cart_item_array = array($cart_item);

				if(!empty($_SESSION['cart_item'])) {
					$flag_id_not_found = true;
					foreach($_SESSION['cart_item'] as $item) {
						if($item['id'] == $id) {
							$key = array_search($item, $_SESSION['cart_item']);
							$_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
							$flag_id_not_found = false;
							break;
						}
					}
					if($flag_id_not_found) {
						$_SESSION['cart_item'][] = $cart_item;
					}
				} else {
					$_SESSION['cart_item'] = $cart_item_array;
				}
			}
		}
	}
*/
	$product = searchProductById($_GET['id']);
?>

	<div id="container">
		<div class="display-prod">
			<div class="display-prod-left">
				<?php
					echo '<img class="img-produto" src="../../media/img/products/'.$_GET['id'].'.jpg" alt="'.$product[2].'">';
				?>
			</div>
			<div class="display-prod-right">
				<?php
					echo '<h4>'.$product[2].'</h4>';
					echo '<p>'.$product[5].'€/'.$product[6].'</p>';
					echo '<br>';
					echo '<p>'.$product[4].'</p>';
				?>
			</div>
			<?php
				if(isset($_SESSION['PERMISSIONS'])) {
			  	if($_SESSION['PERMISSIONS'] == 0) { ?>
			<div class="order">
				<!-- <form method="POST" action="displayProduto.php?action=add&id=<?php echo $_GET['id'];?> "> TODO - apagar -->
				<form method="POST" action="../../actions/products/cartHandler.php?action=add&id=<?php echo $_GET['id'];?> ">
					<input class="text-input-small" type="text" name="quantity" value="1">
					Unid.
					<input type="submit" value="+Adicionar ao carrinho" class="btn-princ btn-large">
				</form>
			</div>
			<?php
				}
					}
			 ?>
		</div>
	</div>
<?php
	include_once("../../common/footer.php");
?>
