<section id="products">
  <h2>Produtos mais vendidos</h2>
    {for $i=0 to 3}
    	{$product = $products[$i]}
      <article class="product-data">
        <img class="product-img" src="{$BASE_URL}media/img/products/{$product.id}.jpg" alt="imagem de {$product.name}">
        <br>
        <table class="tab-product-data">
          <tr>
            <td>{$product.name}</td>
            <td class="price">{$product.price}</td>
          </tr>
        </table>
      </article>
    {/for}
</section>
