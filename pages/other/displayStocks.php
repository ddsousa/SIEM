<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR . "/database/stock.php");
?>

<div id="container">
  <table class="tab-blue">
    <?php
			$result = getAllStocks();
  		$row = pg_fetch_assoc($result);
      if(!isset($row["nome"])) {
        echo "Não existem produtos em stock.";
      } else {
        echo '<tr class="tab-first-row"><td>Código</td><td>Nome produto</td><td>Qt. Armazém</td><td>Qt. Disponível</td></tr>';

    		while (isset($row["nome"])) {
    			echo '<tr><td>' . $row["codigo"] . "</td>" .
							 '<td><a href="../../pages/other/editProduct.php?id=' . $row["id"] . '">' . $row["nome"] . "</a></td>" .
               "<td>" . $row["qt_armazem"] . "</td>" .
               "<td>" . $row["qt_disponivel"] . "</td></a>\n";
    			$row = pg_fetch_assoc($result);
    		}
      }

  ?>
</table>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>
