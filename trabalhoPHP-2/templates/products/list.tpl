<h2>Todos os produtos</h2>
{if $n_prod == 0}
  <h4>Não foram encontrados produtos</h4>
{else}
  {include file='products/filters.tpl'}
  <section id="products">
      {foreach $products as $product}
        <article class="product-data">
          <a href="{$BASE_URL}pages/products/details.php?id={$product.id}"><img class="product-img" src="{$BASE_URL}media/img/products/{$product.id}.jpg" alt="imagem de {$product.name}"></a>
          <br>
          <table class="tab-product-data">
            <tr>
              <td><a href="{$BASE_URL}pages/products/details.php?id={$product.id}">{$product.name}</a></td>
              <td class="price">{$product.price}€/un</td>
            </tr>
          </table>
        </article>
      {/foreach}
  </section>
{/if}
