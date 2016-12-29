<section id="products">
  <h2>Todos os produtos</h2>
    {include file='products/filters.tpl'}
    {foreach $products as $product}
      <article class="product-data">
        <img class="product-img" src="{$BASE_URL}media/img/products/{$product.id}.jpg" alt="imagem de {$product.name}">
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
