<?php
	include_once("../../common/init.php");
	include_once("../../common/header.php");
	include_once("../../common/navbar.php");

	$total_price = 0;

	if(!empty($_GET['action'])) {
		switch($_GET['action']) {
			case 'remove':
				if(!empty($_GET['id']) && !empty($_POST['quantity'])) {
					$id = $_GET['id'];
					if(!empty($_SESSION['cart_item'])) {
						foreach($_SESSION['cart_item'] as $item) {
							if($item['id'] == $id) {
								$key = array_search($item, $_SESSION['cart_item']);
								unset($_SESSION['cart_item'][$key]);
							}
						}
					}
				}
			break;
			case 'edit':
				if(!empty($_GET['id'])) {
					$id = $_GET['id'];
					if(!empty($_SESSION['cart_item'])) {
						foreach ($_SESSION['cart_item'] as $item) {
							if($item['id'] == $id) {
								$key = array_search($item, $_SESSION['cart_item']);
								$_SESSION['cart_item'][$key]['quantity'] = $_POST['quantity'];
							}
						}
					}
				}
			break;
			case 'clean':
				unset($_SESSION['cart_item']);
				$_SESSION['cart_item'] = array();
			break;
			case 'checkout': // TODO - falta implementar

			break;
		}
	}
?>

<div id="container">
	<div class="display-prod">
		<h3>Carrinho</h3>
		<br>
		<table class="tab-centrada">
			<tr class="titulo-centrado" style="line-height: 50px;">
				<td style="text-align: left;"><strong>Nome/Preço</strong></td>
				<td><strong>Quantidade</strong></td>
				<td><strong>Total</strong></td>
			</tr>
			<?php
				foreach($_SESSION['cart_item'] as $item) {
			?>
			<tr>
				<td>
				<table>
					<tr>
						<td>
							<?php echo $item['name']; ?>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo $item['price']."€/".$item['price_unit']; ?>
						</td>
					</tr>
				</table>
				</td>
				<td>
					<form method="POST" action="displayCarrinho.php?action=edit&id=<?php echo $item['id']?>">
						<input type="text" class="text-input-small" value="<?php echo $item['quantity'];?>" name="quantity" >
						<input type="submit" value="Editar" class="btn-princ btn-large">
					</form>
				</td>
				<td>
					<?php echo $item['price']*$item['quantity'];
						$total_price += $item['price']*$item['quantity'];?>
				</td>
				<td>
					<form method="POST" action="displayCarrinho.php?action=remove&id=<?php echo $item['id']; ?>">
						<input type="submit" value="Remover" class="btn-princ btn-large">
					</form>
				</td>
			</tr>
			<tr>
				<td colspan="4">
					<hr style="width: 100%;">
				</td>
			</tr>
			<?php
				}
			?>
			<tr style="line-height: 50px;">
				<td></td>
				<td><strong>Preço Total</strong></td>
				<td><?php echo $total_price; ?></td>
				<td></td>
			</tr>
		</table>
		
		<div class="cart-page-btn">
			<div style="float: left; width: auto;">
				<form method="POST" action="displayCarrinho.php?action=clean">
					<input type="submit" value="Limpar" class="btn-princ btn-large">
				</form>
			</div>
			<div style="float: right; width: auto;">
				<form method="POST" action="displayCarrinho.php?action=checkout">
					<input type="submit" value="Finalizar Encomenda" class="btn-princ btn-large">
				</form>
			</div>
		</div>
	</div>
</div>

<?php
	include_once("../../common/footer.php")
?>