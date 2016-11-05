<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR . "/database/stock.php");
?>

<div id="container">
  <table border="1">
    <?php
			$result = getStocks();
  		$row = pg_fetch_assoc($result);
      if(!isset($row["nome"])) {
        echo "Não existem produtos em stock.";
      } else {
        echo "<tr><td>Código</td><td>Nome produto</td><td>Qt. Armazém</td><td>Qt. Disponível</td></tr>\n";

    		while (isset($row["nome"])) {
    			echo "<tr><td>" . $row["codigo"] . "</td>" .
							 "<td>" . $row["nome"] . "</td>" .
               "<td>" . $row["qt_armazem"] . "</td>" .
               "<td>" . $row["qt_disponivel"] . "</td>" . "<td>EDITAR</td>";
    			$row = pg_fetch_assoc($result);
    		}
      }

  ?>
</table>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>
