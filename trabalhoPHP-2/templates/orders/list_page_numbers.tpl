<section class="page-numbers">
  {for $i=1 to $n_orders step 12 }
    <div id="pg_{($i+11)/12}" class="page-number">
      <a href="{$BASE_URL}pages/orders/list_all_orders.php?pg={($i+11)/12}">{($i+11)/12}</a>
    </div>
  {/for}
</section>
