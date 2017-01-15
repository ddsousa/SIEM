<div class="nav-container">
<section class="navbar menu">
	<ul>
		<li id="nav_home"><a href="{$BASE_URL}pages/other/home.php">Inicio</a></li>
		<li id="nav_list_all"><a href="{$BASE_URL}pages/products/list_all.php">Produtos</a></li>
		<li id="nav_report"><a href="{$BASE_URL}pages/other/report.php">Relatório</a></li>
		{if isset($USERNAME)}
			<li id="nav_list_all_orders"><a href="{$BASE_URL}pages/orders/list_all_orders.php">Encomendas</a></li>
			{if isset($PERMISSIONS)}
				{if $PERMISSIONS eq 1}
					<li id="nav_list_all_clients"><a href="{$BASE_URL}pages/clients/list_all_clients.php">Clientes</a></li>
					<li id="nav_list_all_stocks"><a href="{$BASE_URL}pages/products/list_all_stocks.php">Stocks</a></li>
				{/if}
			{/if}
		{/if}
	</ul>
</section>
<section id="search">
	<form method="POST" action="{$BASE_URL}pages/products/list_all.php">
		<label for="search-input">
			<i class="fa fa-search" aria-hidden="true"></i>
		</label>
		<input id="search-input" type="text" placeholder="Pesquisa" tabindex="1" name="search">
	</form>
</section>
</div>
