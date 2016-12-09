<div class="price-filter">
	{if isset($type)}
		{if $type != ""}
			<form method='POST' action="{$BASE_URL}pages/products/list_all.php?type={$type}&">
		{/if}
	{else}
		<form method='POST' action="{$BASE_URL}pages/products/list_all.php">
	{/if}
		<span>Preço de:</span>
		<input type="text" class="text-input-small" name="lower_lim">
		<span>até</span>
		<input type="text" class="text-input-small" name="upper_lim">
		<input type="submit" value="Filtrar">
	</form>
</div>