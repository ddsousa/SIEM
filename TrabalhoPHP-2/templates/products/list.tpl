<section id="products">
  <h2>Produtos</h2>
  <div id="container">
    {foreach $products as $product}
      <article class="product-data">
        <img class="product-img" src="{$BASE_URL}media/img/products/{$product.id}.jpg" alt="imagem de {$product.nome}">
        <br>
        <span>{$product.nome}</span>
        <span>{$product.preco}</span>
      </article>
    {/foreach}
  </div>

</section>
