<h1>Carrinho</h1>
{if isset($smarty.session.cart) }
	<table>
		<tr>
			<td>Nome/Preço</td>
			<td>Quantidade</td>
			<td>Total</td>
			<td></td>
		</tr>
		{foreach from=$smarty.session.cart key=$id item=$product}
			<tr>
				<td>{$product.name}<br>{$product.price}/un</td>
				<td><form method="POST" action="{$BASE_URL}actions/products/cart/edit_quantity.php?prod_id={$id}"><input type="text" value="{$product.quantity}" name="quantity"><input type="submit" value="Editar"></form></td>
				<td>{math equation="x*y" x=$product.quantity y=$product.price}</td>
				<td><form method="POST" action="{$BASE_URL}actions/products/cart/remove_product.php?prod_id={$id}"><input type="submit" value="Remover"></form></td>
			</tr>
			<hr>
		{/foreach}
	</table>
	{$total_price}
	<form method="POST" action="{$BASE_URL}actions/products/cart/clear_cart.php">
		<input type="submit" value="Limpar">
	</form>
	<form method="POST" action="{$BASE_URL}actions/products/cart/checkout.php">
		<input type="submit" value="Finalizar Encomenda">
	</form>
{else}
	<p>Não tem produtos no seu carrinho</p>
{/if}
