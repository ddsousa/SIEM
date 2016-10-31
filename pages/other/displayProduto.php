<?php
	include_once("../../common/init.php");
	include_once("../../common/header.php");
	include_once("../../common/navbar.php");

	if(!empty($_GET['action'])) {
		if($_GET['action'] == 'add') {
			if(!empty($_POST['quantity']) && !empty($_GET['id'])) {
				$id = $_GET['id'];
				$query = "SELECT *
									FROM produto
									WHERE id =".$id.";";
				$result = pg_exec($conn, $query);
				$product = pg_fetch_row($result, 0);

				$cart_item = array('id'=>$id, 'name'=>$product[2], 'price'=>$product[5], 'quantity'=>$_POST['quantity']);
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

	$prod_id = $_GET['id'];

	$query = "SELECT *
						FROM produto
						WHERE id=".$prod_id.";";
	$result = pg_exec($conn, $query);
	$product = pg_fetch_row($result, 0);
?>
	</div>
	<div id="container">
		<div class="display-prod">
			<div class="display-prod-left">
				<?php
					echo '<img class="img-produto" src="../../media/img/products/'.$prod_id.'.jpg" alt="'.$product[2].'">';
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
			<div class="order">
				<form method="POST" action="displayProduto.php?action=add&id=<?php echo $prod_id;?> ">
					<input class="text-input-small" type="text" name="quantity" value="1">
					Unid.
					<input type="submit" value="+Adicionar ao carrinho" class="btn-princ btn-large">
				</form>
			</div>
		</div>

		<!-- DEBUG TODO: apagar-->
		<form action="displayCarrinho.php">
			<input type="submit" style="background: red; height: 40px;" value="Carrinho">
		</form>
		<div>
			<h3>DEBUG: Carrinho</h3>
			<table>
			<?php
				foreach($_SESSION['cart_item'] as $item) {
			?>
				<tr>
					<td>id: <?php echo $item['id']; ?></td>
					<td>nome: <?php echo $item['name']; ?></td>
					<td>quantidade: <?php echo $item['quantity']; ?></td>
				</tr>
			<?php
				}
			?>
			</table>
		</div>
	</div>
<?php
	include_once("../../common/footer.php");
?>
