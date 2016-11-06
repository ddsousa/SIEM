<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");
  include_once ($BASE_DIR . "/database/order.php");
?>

<div id="container">
  <H3>Encomendas</H3>

  <table class="tab-blue">
        <?php
        		$result = getOrders(getClientId($_SESSION['USERNAME']));

            $row = pg_fetch_assoc($result);
            if(!isset($row["numero"])) {
              echo "Não efectou encomendas.";
            } else {
              echo '<tr class="tab-first-row"><td>Nr Encomenda</td><td>Estado</td><td>Data da encomenda</td><td>N artigos</td><td>Preco total</td></tr>';

          		while (isset($row["numero"])) {
                $estado = ($row["estado"]=='f') ? "Pendente" : "Entregue";

          			echo "<tr><td>" . $row["numero"] . "</td>" .
                     "<td>" . $estado . "</td>" .
                     "<td>" . $row["data_efetuada"] . "</td>" .
                     "<td>" . $row["artigos"] . "</td>" .
                     "<td>" . $row["total"] . "</td> </tr>";
          			$row = pg_fetch_assoc($result);
          		}
            }

        ?>
  </table>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
