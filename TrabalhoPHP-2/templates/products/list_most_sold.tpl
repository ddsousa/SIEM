<section id="products">
  <h2>Produtos mais vendidos</h2>
    {foreach $products_most_sold as $product_ms}
      <article class="product-data">
        <img class="product-img" src="{$BASE_URL}media/img/products/{$product_ms.id}.jpg" alt="imagem de {$product.name}">
        <br>
        <table class="tab-product-data">
          <tr>
            <td><a href="{$BASE_URL}pages/products/details.php?id={$product_ms.id}">{$product_ms.name}</a></td>
            <td class="price">{$product_ms.price}€/un</td>
          </tr>
        </table>
      </article>
    {/foreach}
</section>
