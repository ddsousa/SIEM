<div class="sub-navbar menu">
	<ul>
		{if isset($prod_types)}
			{foreach $prod_types as $prod_type}
				<li id="subnav_{$prod_type['type']}"><a href="{$BASE_URL}pages/products/list_all.php?type={$prod_type['type']}">{$prod_type['type']}</a></li>
			{/foreach}
		{/if}
	</ul>
</div>
