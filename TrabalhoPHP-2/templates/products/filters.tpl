<div id="filters">
	<div id="filter-price">
		{if isset($type)}
			{if $type != ""}
				<form method='POST' action="{$BASE_URL}pages/products/list_all.php?type={$type}">
			{else}
			<form method='POST' action="{$BASE_URL}pages/products/list_all.php">
			{/if}
		{else}
			<p>aqui</p>
			<form method='POST' action="{$BASE_URL}pages/products/list_all.php">
		{/if}
			<span>Preço de:</span>
			<input type="text" class="input-text-small" name="lower_lim" {if isset($lower_lim)} value="{$lower_lim}"{/if}>
			<span>até</span>
			<input type="text" class="input-text-small" name="upper_lim" {if isset($upper_lim)} value="{$upper_lim}"{/if}>
			<input type="submit" value="Filtrar">
		</form>
	</div>

	{if !isset($type)}
		{assign var="type" value=null}
	{/if}
	{if !isset($lower_lim)}
		{assign var="lower_lim" value=null}
	{/if}
	{if !isset($upper_lim)}
		{assign var="upper_lim" value=null}
	{/if}


	<select id="filter-sort" class="dropdown" onchange="sortProductsBy(this, '{$type}'), '{$lower_lim}', '{$upper_lim}'">
		<option disabled selected>Ordenar</option>
		<option value="price_asc">Preço mais baixo</option>
		<option value="price_desc">Preço mais alto</option>
		<option value="name">Nome</option>
		<option value=""></option>
	</select>
</div>
