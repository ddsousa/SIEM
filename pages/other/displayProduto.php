<?php
	include_once("../../common/init.php");
	include_once("../../common/header.php");
	include_once("../../common/navbar.php");

	if(!empty($_GET['action'])) {
		switch($_GET['action']) {
			case 'add':
				if(!empty($_POST['quantity'])) {
					$query = "SELECT *
										FROM produto
										WHERE id =".$_GET['id'].";";
					$result = pg_exec($conn, $query);
					$product = pg_fetch_row($result, 0);

					$cart_item = array($product[0]=>array('id'=>$product[0], 'name'=>$product[2], 'price'=>$product[5], 'quantity'=>$_POST['quantity']));

					echo '<br>'.$product[0].'<br>';
					echo var_dump($_SESSION['cart_item']).'<br>';
					if(!empty($_SESSION['cart_item'])) {
						if(array_key_exists($product[0], $_SESSION['cart_item'])) {
							foreach($_SESSION['cart_item'] as $i => $j) {
								if($product[0] == $i) {
									$_SESSION['cart_item'][$i]['quantity'] += $_POST['quantity'];
								}
							}
						} else {
							echo 'nao tinha este id';
							$_SESSION['cart_item'] = array_merge($_SESSION['cart_item'], $cart_item);
						}
					} else {
						echo 'estava vazio';
						$_SESSION['cart_item'] = $cart_item;
					}
				}
			break;
			case 'remove':
				if(!empty($_SESSION['cart_item'])) {
					foreach($_SESSION['cart_item'] as $i => $j) {
						if($_GET['id'] == $i) {
							unset($_SESSION['cart_item'][$i]);
						}
						if(empty($_SESSION['cart_item'])) {
							unset($_SESSION['cart_item']);
						}
					}
				}
			break;
			case 'empty':
				unset($_SESSION['cart_item']);
			break;
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
					<input style="width: 40px;" class="order-item" type="text" name="quantity" value="1">
					Unid.
					<input type="submit" value="+Adicionar ao carrinho" class="btn-princ order-item">
				</form>
			</div>
		</div>

		<!-- DEBUG TODO: apagar-->
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
