<div class="navbar menu">
	<ul>
		<li id="nav_home"><a href="{$BASE_URL}pages/other/home.php">Inicio</a></li>
		<li id="nav_list_all"><a href="{$BASE_URL}pages/products/list_all.php">Produtos</a></li>
		<li id="nav_report"><a href="{$BASE_URL}pages/other/report.php">Relatório</a></li>
		{if isset($USERNAME)}
			<li id=nav_orders><a href="{$BASE_URL}pages/orders/list_all.php">Encomendas</a></li>
		{/if}
	</ul>
</div>