<h1>Carrinho</h1>
{if isset($smarty.session.cart) }
	<table class="tab-spaced">
		<tr>
			<th>Nome / Preço</td>
			<th>Quantidade</td>
			<th>Total</td>
			<th></td>
		</tr>
		<tr>
			<td colspan="4"><hr></td>
		</tr>
		{foreach from=$smarty.session.cart key=$id item=$product}
			<tr>
				<td>{$product.name}<br>{$product.price}€/un</td>
				<td><form method="POST" action="{$BASE_URL}actions/products/cart/edit_quantity.php?prod_id={$id}"><input type="text" value="{$product.quantity}" name="quantity" class="input-text-small"><input type="submit" value="Editar" style="margin-left: 0.5em"></form></td>
				<td>{math equation="x*y" x=$product.quantity y=$product.price} €</td>
				<td><form method="POST" action="{$BASE_URL}actions/products/cart/remove_product.php?prod_id={$id}"><input type="submit" value="Remover"></form></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
		{/foreach}
		<tr>
			<td></td>
			<td></td>
			<td><strong>{$total_price} €</strong></td>
		</tr>
		<tr>
			<td colspan="4" class="inline-btn-section">
				<form method="POST" action="{$BASE_URL}actions/products/cart/clear_cart.php">
					<input type="submit" value="Limpar">
				</form>
				<form method="POST" action="{$BASE_URL}actions/products/cart/checkout.php" style="float: right">
					<input type="submit" value="Finalizar Encomenda">
				</form>
			</td>
		</tr>
</table>
{else}
	<p>Não tem produtos no seu carrinho</p>
{/if}
