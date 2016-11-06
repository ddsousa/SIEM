<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");
  include_once ($BASE_DIR . "/database/product.php");
  include_once ($BASE_DIR . "/database/stock.php");

  if(!$_GET['id']) {
    echo "Não foi fornecido nenhum id!";
  } else {
    $id = $_GET['id'];
    $_SESSION['EDIT_PRODUCT'] = $id;
  }

  $product_details = getProduct($id);
  $stock_detail = getStocks($id);
 ?>

<div id="container">

  <?php echo '<img class="img-produto" src="../../media/img/products/'.$id.'.jpg?=' . filemtime('../../media/img/products/'.$id.'.jpg') . '">' ?>
  <form action="../../actions/products/updateProduct.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td  align="right">Editar imagem</td>
        <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
      </tr>
      <tr>
        <td align="right">Código</td>
        <td><input type="text" name="codigo" value="<?php echo $product_details['codigo']; ?>"></input></td>
      </tr>
      <tr>
        <td align="right">Categoria</td>
        <td>
          <select id="product_category" name="tipo" value="<?php echo $product_details['tipo']; ?>" onchange="addCategory()">
            <?php
              $result = getCategories();
              $row = pg_fetch_assoc($result);
          		while (isset($row["tipo"])) {
          			echo "<option value=".$row["tipo"].">".$row["tipo"]."</option>";
          			$row = pg_fetch_assoc($result);
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
        <td><input type="text" name="nome" value="<?php echo $product_details['nome']; ?>"></input></td>
      </tr>

      <tr>
        <td align="right">Descrição</td>
        <td><textarea name="descricao"><?php echo $product_details['descricao']; ?></textarea></td>
      </tr>
      <tr>
        <td align="right">Preço</td>
        <td><input type="text" name="preco" value="<?php echo $product_details['preco']; ?>"></input></td>
      </tr>
      <tr>
        <td></td>
        <td align="right"><input type="submit" value="GUARDAR"></td>
      </tr>
  </form>
  <form action="../../actions/products/editStock.php" method="POST" enctype="multipart/form-data">
    <table>
      <tr>
        <td  align="right">Qt. Armazém</td>
        <td><input type="text" name="qt_armazem" value="<?php echo $stock_detail['qt_armazem']; ?>"></td>
      </tr>
      <tr>
        <td align="right">Qt. Disponível</td>
        <td><input type="text" name="qt_disponivel" value="<?php echo $stock_detail['qt_disponivel']; ?>"></input></td>
      </tr>
      <tr>
        <td></td>
        <td align="right"><input type="submit" value="EDITAR STOCK"></td>
      </tr>
    </table>
  </form>
  <a href="../../actions/products/deleteProduct.php?id=<?php echo $id; ?>"><input type="button" value="REMOVER PRODUTO" class="btn-princ"></input></a>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
