<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");
  include_once ($BASE_DIR . "/database/product.php");
?>

<div id="container">
  <h3 class="page-title">Adicionar novo produto</h3>

  <form action="../../actions/products/addProduct.php" method="POST" enctype="multipart/form-data">

    <table class="tab-register">
      <tr>
        <td  align="right">Imagem</td>
        <td><input type="file" name="fileToUpload" data-classButton="btn-princ" id="fileToUpload" data-buttonText="David" ></td>
      </tr>
      <tr>
        <td align="right">Código</td>
        <td><input type="text" name="codigo"></input></td>
      </tr>
      <tr>
        <td align="right">Categoria</td>
        <td>
          <select class="dropbtn" id="product_category" name="tipo" onchange="addCategory()">
            <?php
              $categories = getCategories();
              foreach($categories as $category) {
                echo "<option value=".$category["tipo"].">".$category["tipo"]."</option>";
              }
             ?>
             <option value="adicionar">Adicionar outra</option>
          </select>
        </td>
      </tr>
      <tr id="new_category" style="display:none;">
        <td>Nova categoria</td>
        <td><input type="text" name="nova_categoria"></input></td>
      </tr>
      <tr>
        <td align="right">Nome</td>
        <td><input type="text" name="nome"></input></td>
      </tr>

      <tr>
        <td align="right">Descrição</td>
        <td><textarea name="descricao"></textarea></td>
      </tr>
      <tr>
        <td align="right">Preço</td>
        <td><input type="text" name="preco"></input></td>
      </tr>
      <tr>
        <td></td>
        <td><input class="btn-princ" type="submit" value="GUARDAR"></input></td>
      </tr>
  </form>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
