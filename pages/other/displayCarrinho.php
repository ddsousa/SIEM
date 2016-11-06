<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");

	$total_price = 0;
?>

<div id="container">
	<div class="display-prod">
		<h3>Carrinho</h3>
		<br>
<?php if(sizeof($_SESSION['cart_item']) > 0) { ?>
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
						<form method="POST" action="../../actions/products/cartHandler.php?action=edit&id=<?php echo $item['id']?>">
							<input type="text" class="text-input-small" value="<?php echo $item['quantity'];?>" name="quantity" >
							<input type="submit" value="Editar" class="btn-princ btn-large">
						</form>
					</td>
					<td>
						<?php echo $item['price']*$item['quantity'];
							$total_price += $item['price']*$item['quantity'];?>
					</td>
					<td>
						<form method="POST" action="../../actions/products/cartHandler.php?action=remove&id=<?php echo $item['id']; ?>">
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
					<form method="POST" action="../../actions/products/cartHandler.php?action=clean">
						<input type="submit" value="Limpar" class="btn-princ btn-large">
					</form>
				</div>
				<div style="float: right; width: auto;">
					<form method="POST" action="../../actions/products/cartHandler.php?action=checkout">
						<input type="submit" value="Finalizar Encomenda" class="btn-princ btn-large">
					</form>
				</div>
			</div>
<?php } else { ?>
			<p>Não tem produtos no seu carrinho.</p>
<?php } ?>
	</div>
</div>

<?php
	include_once("../../common/footer.php")
?>
