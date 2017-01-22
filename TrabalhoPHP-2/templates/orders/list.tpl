{if !$PERMISSIONS}
	<h2>As suas encomendas</h2>
{/if}
{include file='orders/filters.tpl'}
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
			{/if}
			<td><a href="{$BASE_URL}pages/orders/order_details.php?id={$order['order_id']}">{$order['num']}</a></td>
			<td><a href="{$BASE_URL}pages/orders/order_details.php?id={$order['order_id']}">{$order['state']}</a></td>
			<td><a href="{$BASE_URL}pages/orders/order_details.php?id={$order['order_id']}">{$order['order_date']|date_format:$config.date_time}</a></td>
			<td><a href="{$BASE_URL}pages/orders/order_details.php?id={$order['order_id']}">{$order['num_products']}</a></td>
			<td><a href="{$BASE_URL}pages/orders/order_details.php?id={$order['order_id']}">{$order['total_price']}</a></td>
		</tr>
	{/foreach}
</table>
