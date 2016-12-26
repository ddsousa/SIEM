<table class="tab-blue">
	<tr>
		<td>Número Encomenda</td>
		<td>Estado</td>
		<td>Data de Encomenda</td>
		<td>Número artigos</td>
		<td>Preço Total</td>
	</tr>
	{foreach $client_orders as $order}
		<tr>
			<td>{$order['num']}</td>
			<td>{$order['state']}</td>
			<td>{$order['order_date']}</td>
			<td>preco_total</td>
		</tr>
	{/foreach}
</table>
