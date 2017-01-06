<table class="tab-blue">
	<tr>
		{if $PERMISSIONS}
			<th>Cliente</th>
		{/if}
		<th>Número Encomenda</th>
		<th>Estado</th>
		<th>Data de Encomenda</th>
		<th>Número artigos</th>
		<th>Preço Total</th>
	</tr>
	{foreach $orders as $order}
		<tr>
			{if $PERMISSIONS eq 1}
				<td><a href="{$BASE_URL}pages/clients/client_details.php?id={$order['client_id']}">{$order['client_name']}</a></td>
				<td><a href="#">{$order['num']}</a></td>
				<td><a href="#">{$order['state']}</a></td>
				<td><a href="#">{$order['order_date']|date_format:$config.date_time}</a></td>
				<td><a href="#">{$order['num_products']}</a></td>
				<td><a href="#">{$order['total_price']}</a></td>
			{else}
				<td>{$order['num']}</td>
				<td>{$order['state']}</td>
				<td>{$order['order_date']|date_format:$config.date_time}</td>
				<td>{$order['num_products']}</td>
				<td>{$order['total_price']}</td>
			{/if}
		</tr>
	{/foreach}
</table>
