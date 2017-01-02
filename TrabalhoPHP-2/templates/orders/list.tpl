<table class="tab-blue">
	<tr>
		<th>Número Encomenda</th>
		<th>Estado</th>
		<th>Data de Encomenda</th>
		<th>Número artigos</th>
		<th>Preço Total</th>
	</tr>
	{foreach $client_orders as $order}
		<tr>
			<td>{$order['num']}</td>
			<td>{$order['state']}</td>
			<td>{$order['order_date']|date_format:$config.date_time}</td>
			<td>{$order['num_products']}</td>
			<td>{$order['total_price']}</td>
		</tr>
	{/foreach}
</table>
