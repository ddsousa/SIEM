{for $i=1 to $n_prod step 8 }
  <div class="page_numbers">
    <a href="{$BASE_URL}pages/products/list_all.php?pg={($i+7)/8}">{($i+7)/8}</a>
  </div>
{/for}
<div class="page_numbers">
	{if isset($smarty.session.type)}
		<a href="{$BASE_URL}pages/products/list_all.php?pg=-1&type={$smarty.session.type}">Todas</a>
	{else}
  	<a href="{$BASE_URL}pages/products/list_all.php?pg=-1">Todas</a>
  {/if}
	}
</div>
