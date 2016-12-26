<section id="product">
  <div class="details-prod">
    <div class="details-prod-left">
      <img class="img-produto" src="{$BASE_URL}media/img/products/{$product.id}.jpg" alt="{$product.name}">
    </div>
    <div class="details-prod-right">
      <h4>{$product.name}</h4>
      <p>{$product.price}€/un</p>
      <br>
      <p>{$product.description}</p>
      <div class="order">
        <form method="POST" action="{$BASE_URL}actions/products/cart/add_product.php?prod_id={$product.id}">
          <input class="ultra-small" type="text" name="prod_quantity" value="1">
          Unid.
          <input type="submit" value="+Adicionar ao carrinho" class="btn-princ">
        </form>
      </div>
    </div>
  </div>
</section>
