<section id="product">
  <form method="POST" id="form-edit-product" action="{$BASE_URL}actions/products/edit_product.php" enctype="multipart/form-data"></form>
  <form method="POST" id="form-edit-stock" action="{$BASE_URL}actions/stocks/edit_stock.php?id={$product.id}"></form>
  <div class="details-prod">
    <div class="details-prod-left">
      <img class="img-produto" src="{$BASE_URL}media/img/products/{$product.id}.jpg" alt="{$product.name}">
    </div>
    <div class="details-prod-right">
      <h4 style="margin-bottom: 1.5em;">{$product.name}</h4>
      <table class="tab-details">
        <tr>
          <th>Editar Imagem</th>
          <td>
            <input type="file" name="photo" form="form-edit-product">
          </td>
        </tr>
        <tr>
          <th>Código</th>
          <td>
            <input type="text" form="form-edit-product" name="code" value="{$product['code']}">
          </td>
        </tr>
        <tr>
          <th>Categoria</th>
          <td>
            <select class="dropdown" name="category" onchange="addCategory(this)" form="form-edit-product">
              {foreach $prod_types as $category}
                <option value="{$category['type']}" {if $product['type'] eq $category['type']}selected{/if}>{$category['type']}</option>
              {/foreach}
              <option value="add-new">Adicionar categoria</option>
            </select>
          </td>
        </tr>
        <tr id="new_category" style="display: none;">
          <th>Nova categoria</th>
          <td>
            <input type="text" form="form-edit-product" name="new-category">
          </td>
        </tr>
        <tr>
          <th>Nome</th>
          <td>
            <input type="text" form="form-edit-product" name="name" value="{$product['name']}">
          </td>
        </tr>
        <tr>
          <th>Descrição</th>
          <td>
            <textarea form="form-edit-product" name="description">{$product['description']}</textarea>
          </td>
        </tr>
        <tr>
          <th>Preço</th>
          <td>
            <input type="text" form="form-edit-product" name="price" value="{$product['price']}">
          </td>
        </tr>
        <tr>
          <td colspan="2"><hr></td>
        </tr>
        <tr>
          <th>Qt. Armazém</th>
          <td>
            <input type="text" form="form-edit-stock" name="qt-warehouse" value="{$stock['qt_warehouse']}">
          </td>
        </tr>
        <tr>
          <th>Qt. Disponível</th>
          <td>
            <input type="text" form="form-edit-stock" name="qt-available" value="{$stock['qt_available']}">
          </td>
        </tr>
      </table>
      <div class="details-btn">
        <input type="submit" value="Editar Produto" class="btn-princ" form="form-edit-product">
        <input type="submit" value="Editar Stock" class="btn-princ" form="form-edit-stock" id="center">
        <form method="POST" action="{$BASE_URL}actions/products/delete_product.php?id={$product.id}">
          <input type="submit" value="Remover Produto">
        </form>
      </div>
    </div>
  </div>
</section>
