<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR . "/database/order.php");

	if(!empty($_GET['sort_by'])) {
		$sort_by = $_GET['sort_by'];
	} else {
		$sort_by = null;
	}

	$result = getAllOrders($sort_by);
?>

<script language="javascript">
	function sortOrdersBy(sel) {
		window.location.assign("displayEncomendas.php?sort_by="+sel.value);
	}
</script>

<div id="container">
	<div style="margin-left: 5%;">
		<select class="dropbtn" onchange="sortOrdersBy(this)">
			<option disabled selected>Ordenar</option>
			<option value="data_efetuada desc" <?php if($sort_by == 'data_efetuada desc') echo "selected" ?>>Mais recente</option>
			<option value="data_efetuada asc"  <?php if($sort_by == 'data_efetuada asc') echo "selected" ?>>Mais antiga</option>
			<option value="nome"				 			 <?php if($sort_by == 'nome asc') echo "selected" ?>>Nome cliente</option>
			<option value="total desc"				 <?php if($sort_by == 'total desc') echo "selected" ?>>Preço mais alto</option>
			<option value="total asc"					 <?php if($sort_by == 'total asc') echo "selected" ?>>Preço mais baixo</option>
		</select>
	</div>
  <table class="tab-blue">
    <?php

  		$row = pg_fetch_assoc($result);
      if(!isset($row["numero"])) {
        echo "Não há encomendas.";
      } else {
        echo '<tr class="tab-first-row"><td>Cliente</td><td>Nr Encomenda</td><td>Estado</td><td>Data da encomenda</td><td>N artigos</td><td>Preco total</td></tr>';

    		while (isset($row["numero"])) {
          $estado = ($row["estado"]=='f') ? "Pendente" : "Entregue";

    			echo '<tr><td><a href="../../pages/users/displayClientDetails.php?id='. $row["idclient"] . '">' . $row["nome"] . "</a></td>" .
							 '<td><a href="../../pages/other/detailsOrder.php?id='. $row["id"] . '">' . $row["numero"] . "</a></td>" .
               '<td><a href="../../pages/other/detailsOrder.php?id='. $row["id"] . '">' . $estado . "</a></td>" .
               '<td><a href="../../pages/other/detailsOrder.php?id='. $row["id"] . '">' . $row["data_efetuada"] . "</a></td>" .
               '<td><a href="../../pages/other/detailsOrder.php?id='. $row["id"] . '">' . $row["artigos"] . "</a></td>" .
               '<td><a href="../../pages/other/detailsOrder.php?id='. $row["id"] . '">' . $row["total"] . "</a></td> </tr>";
    			$row = pg_fetch_assoc($result);
    		}
      }

  ?>
</table>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>
