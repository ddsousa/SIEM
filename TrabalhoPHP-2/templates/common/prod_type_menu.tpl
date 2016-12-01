<div class="navbar menu">
	<ul>
		{foreach $prod_types as $prod_type}
			<li><a href="{$BASE_URL}pages/products/list_all.php?type={$prod_type['type']}">{$prod_type['type']}</a></li>
		{/foreach}
	</ul>
</div>