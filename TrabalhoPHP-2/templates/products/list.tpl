<!DOCTYPE html>
<html>
  <head>
    <title>Oceano Hipermercados</title>
    <link rel="stylesheet" href="<?=$BASE_URL?>css/style.css">
    <meta charset="utf-8">
  </head>
  <body>
    <section id="products">
      <h2>Produtos</h2>

      {foreach $products as $product}
        <article class="product-data">
          <img src="{$BASE_URL}media/img/products/{$product.id}.jpg" alt="imagem de {$product.nome}">
          <span>{$product.nome}</span>
          <span>{$product.preco}</span>
        </article>
      {/foreach}

    </section>
  </body>
</html>
