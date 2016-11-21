<section id="products">
  <h2>Produtos</h2>
    {foreach $products as $product}
      <article class="product-data">
        <img class="product-img" src="{$BASE_URL}media/img/products/{$product.id}.jpg" alt="imagem de {$product.name}">
        <br>
        <span>{$product.name}</span>
        <span>{$product.price}</span>
      </article>
    {/foreach}
</section>
