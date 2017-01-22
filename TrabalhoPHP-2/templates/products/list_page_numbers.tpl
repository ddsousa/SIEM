<section class="page-numbers">
  {for $i=1 to $n_prod step 8 }
    <div id="pg_{($i+7)/8}" class="page-number">
      <a href="{$BASE_URL}pages/products/list_all.php?pg={($i+7)/8}{if isset($smarty.session.type)}&type={$smarty.session.type}{/if}{if isset($lower_lim) && isset($upper_lim)}&lower_lim={$lower_lim}&upper_lim={$upper_lim}{/if}">{($i+7)/8}</a>
    </div>
  {/for}

  <div id="pg_-1" class="page-number">
  		<a href="{$BASE_URL}pages/products/list_all.php?pg=-1
  		{if isset($smarty.session.type)}&type={$smarty.session.type}{/if}
  		{if isset($lower_lim) && isset($upper_lim)}&lower_lim={$lower_lim}&upper_lim={$upper_lim}{/if}">Todas</a>
  </div>
</section>
