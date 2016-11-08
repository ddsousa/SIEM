<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR . "/database/stock.php");
?>

<div id="container">
  <table class="tab-blue">
    <?php
			$stocks = getAllStocks();
      if(sizeof($stocks)<1) {
        echo "Não existem produtos em stock.";
      } else {
        echo '<tr class="tab-first-row"><td>Código</td><td>Nome produto</td><td>Qt. Armazém</td><td>Qt. Disponível</td></tr>';

        foreach ($stocks as $stock) {
        	echo '<tr><td>' . $stock["codigo"] . "</td>" .
							 '<td><a href="../../pages/other/editProduct.php?id=' . $stock["id"] . '">' . $stock["nome"] . "</a></td>" .
               "<td>" . $stock["qt_armazem"] . "</td>" .
               "<td>" . $stock["qt_disponivel"] . "</td></a>\n";
        }
      }

  ?>
</table>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>
