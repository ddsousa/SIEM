<section class="page-numbers">
  {for $i=1 to $n_orders step 8 }
    <div id="pg_{($i+7)/8}" class="page_number">
      <a href="{$BASE_URL}pages/orders/list_all_orders.php?pg={($i+7)/8}">{($i+7)/8}</a>
    </div>
  {/for}
</section>
