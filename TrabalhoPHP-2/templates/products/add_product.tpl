<h2>Adicionar novo produto</h2>
<form method="POST" id="form-add-product" action="{$BASE_URL}actions/products/add_product.php" enctype="multipart/form-data"></form>
<table class="tab-details">
  <tr>
    <th>Imagem</th>
    <td>
      <input type="file" name="photo" form="form-add-product">
    </td>
  </tr>
  <tr>
    <th>Código</th>
    <td>
      <input type="text" form="form-add-product" name="code">
    </td>
  </tr>
  <tr>
    <th>Categoria</th>
    <td>
      <select class="dropdown" name="category" onchange="addCategory(this)" form="form-add-product">
        {foreach $categories as $category}
          <option value="{$category['type']}">{$category['type']}</option>
        {/foreach}
        <option value="add-new">Adicionar categoria</option>
      </select>
    </td>
  </tr>
  <tr id="new_category" style="display: none;">
    <th>Nova categoria</th>
    <td>
      <input type="text" form="form-add-product" name="new-category">
    </td>
  </tr>
  <tr>
    <th>Nome</th>
    <td>
      <input type="text" form="form-add-product" name="name">
    </td>
  </tr>
  <tr>
    <th>Descrição</th>
    <td>
      <input type="text" form="form-add-product" name="description">
    </td>
  </tr>
  <tr>
    <th>Preço</th>
    <td>
      <input type="text" form="form-add-product" name="price">
    </td>
  </tr>
  <tr>
    <th></th>
    <td>
      <input type="submit" value="Adicionar" class="btn-princ" form="form-add-product">
    </td>
  </tr>
</table>
