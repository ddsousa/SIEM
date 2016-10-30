<?php
	include_once("../../common/init.php");
	include_once("../../common/header.php");
	include_once("../../common/navbar.php");

	if(!empty($_GET['action'])) {
		switch($_GET['action']) {
			case 'remove':
				if(!empty($_GET['id'])) {
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
			case 'clean':
				unset($_SESSION['cart_item']);
				$_SESSION['cart_item'] = array();
			break;
			case 'checkout': // TODO - falta implementar

			break;
		}
	}
?>

</div>
<div id="container">
	<div class="display-prod">
		<h3>Carrinho</h3>
		<table>
			<?php
				foreach($_SESSION['cart_item'] as $item) {
			?>
			<tr>
			<td>
				<?php echo $item['id'] ?>
			</td>
				<td>
					<?php echo $item['name'].'<br>'.$item['price']; ?>
				</td>
				<td>
					<?php echo $item['quantity'];?>
				</td>
				<td>
					<?php echo $item['price'];?>
				</td>
				<td>
					<form method="POST" action="displayCarrinho.php?action=remove&id=<?php echo $item['id']; ?>">
						<input type="submit" value="Remover" class="btn-princ">
					</form>
				</td>
			</tr>
			<hr>
			<?php
				}
			?>
		</table>

		<form method="POST" action="displayCarrinho.php?action=clean">
			<input type="submit" value="Limpar" class="btn-princ">
		</form>
		<form method="POST" action="displayCarrinho.php?action=checkout">
			<input type="submit" value="Finalizar Encomenda" class="btn-princ">
		</form>
	</div>
</div>

<?php
	include_once("../../common/footer.php")
?>