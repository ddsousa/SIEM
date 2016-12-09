<div class="price-filter">
	{if isset($type)}
		{if $type != ""}
			<form method='POST' action="{$BASE_URL}pages/products/list_all.php?type={$type}&">
		{else}
		<form method='POST' action="{$BASE_URL}pages/products/list_all.php">
		{/if}
	{else}
		<p>aqui</p>
		<form method='POST' action="{$BASE_URL}pages/products/list_all.php">
	{/if}
		<span>Preço de:</span>
		<input type="text" class="text-input-small" name="lower_lim" {if isset($lower_lim)} value="{$lower_lim}"{/if}>
		<span>até</span>
		<input type="text" class="text-input-small" name="upper_lim" {if isset($upper_lim)} value="{$upper_lim}"{/if}>
		<input type="submit" value="Filtrar">
	</form>
</div>