<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");
  include_once ($BASE_DIR . "/database/order.php");

	if(!empty($_GET['id'])) {
		$order_data = getOrderDetails($_GET['id']);
	}
?>
<div id="container">
  <table class="tab-register">
    <h3 class="page-title">Detalhes de encomenda</h3>
      <tr>
        <td align="right" ><b>Nome do Cliente</b></td>
        <td><?php echo $order_data['nome']; ?></td>
      </tr>
      <tr>
        <td align="right" ><b>Nº Encomenda</b></td>
        <td><?php echo $order_data['numero']; ?></td>
      </tr>
      <tr>
        <td align="right" ><b>Estado</b></td>
        <td>
          <form action="../../actions/products/editOrder.php?id=<?php echo $_GET['id'] ?>" method="POST" id="form_edit_order">
            <select name="estado" class="dropbtn">
              <option value="Pendente" <?php if($order_data['estado'] == "Pendente") echo "selected"; ?>>Pendente</option>
              <option value="Enviada"  <?php if($order_data['estado'] == "Enviada") echo "selected"; ?>>Enviada</option>
              <option value="Entregue" <?php if($order_data['estado'] == "Entregue") echo "selected"; ?>>Entregue</option>
            </select>
          </form>
        </td>
      </tr>
      <tr>
        <td align="right" ><b>Data</b></td>
        <td><?php echo $order_data['data_efetuada']; ?></td>
      </tr>
      <tr>
        <td align="right" ><b>Nº de Artigos</b></td>
        <td><?php echo $order_data['artigos']; ?></td>
      </tr>
      <tr>
        <td align="right" ><b>Preço Total</b></td>
        <td><?php echo $order_data['total']; ?>&euro;</td>
      </tr>
      <tr>
        <td></td>
        <td style="padding-top: 15px;">
          <button class="btn-princ" type="submit" form="form_edit_order" value="Submit">EDITAR</button>
        </td>
      </tr>
  </table>
</div>




<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
