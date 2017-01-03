<div class="nav-container">
<section class="navbar menu">
	<ul>
		<li id="nav_home"><a href="{$BASE_URL}pages/other/home.php">Inicio</a></li>
		<li id="nav_list_all"><a href="{$BASE_URL}pages/products/list_all.php">Produtos</a></li>
		<li id="nav_report"><a href="{$BASE_URL}pages/other/report.php">Relatório</a></li>
		{if isset($USERNAME)}
			<li id=nav_list_all_orders><a href="{$BASE_URL}pages/orders/list_all_orders.php">Encomendas</a></li>
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
