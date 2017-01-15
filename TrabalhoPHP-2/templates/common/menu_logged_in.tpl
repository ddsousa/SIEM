<div class="logged_in">
	<span class="username"><a href="{$BASE_URL}pages/clients/client_details.php?id={$smarty.session.id}">{$USERNAME}</a></span>
	<form action="{$BASE_URL}actions/users/logout.php">
		<input type="submit" value="Logout" style="float: right;">
	</form>
	<br>
	<div style="margin-top: 0.5em; padding-right: 0">
		{if $PERMISSIONS eq 0} <!-- user -->
			{if isset($smarty.session.cart)}
				{if $smarty.session.cart|@count eq 1}
					<span class="num-cart-items">1 artigo no carrinho</span>
				{else}
					<span class="num-cart-items">{$smarty.session.cart|@count} artigos no carrinho</span>
				{/if}
			{/if}
			<form action="{$BASE_URL}pages/products/display_cart.php">
				<button type="submit" name="btn-checkout" style="margin-right: 0;"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho</button>
			</form>
		{else} <!-- admin -->
			<select name="user-type" class="dropdown" onchange="addUser('{$BASE_URL}', this)" style="margin-right: 0 !important;">
				<option value="" disabled selected><i class="fa fa-user-circle" aria-hidden="true"></i> Adicionar Utilizador</option>
				<option value="user">Utilizador</option>
				<option value="admin">Administrador</option>
			</select>
		{/if}
	</div>
</div>
