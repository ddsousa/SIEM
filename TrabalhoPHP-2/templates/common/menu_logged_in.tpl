<div class="logged_in">
	<a class="mybtn logout" href="{$BASE_URL}actions/users/logout.php">Logout</a>
	<span class="username">{$USERNAME}</span>
	<br>
	{if isset($smarty.session.cart)}
		{if $smarty.session.cart|@count eq 1}
			<span class="num-cart-items">1 artigo no carrinho</span>
		{else}
			<span class="num-cart-items">{$smarty.session.cart|@count} artigos no carrinho</span>
		{/if}
	{/if}
	<form action="{$BASE_URL}pages/products/display_cart.php">
		<button type="submit" name="btn-checkout"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Carrinho</button>
	</form>
</div>
