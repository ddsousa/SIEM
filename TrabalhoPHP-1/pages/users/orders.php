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
        		$orders = getOrders(getClientId($_SESSION['USERNAME']));

            if(empty($orders)) {
              echo "Não efectou encomendas.";
            } else {
              echo '<tr class="tab-first-row"><td>Nr Encomenda</td><td>Estado</td><td>Data da encomenda</td><td>N artigos</td><td>Preco total</td></tr>';

              foreach($orders as $order) {
                 echo "<tr><td>" . $order["numero"] . "</td>" .
                     "<td>" . $order["estado"] . "</td>" .
                     "<td>" . $order["data_efetuada"] . "</td>" .
                     "<td>" . $order["artigos"] . "</td>" .
                     "<td>" . $order["total"] . "</td> </tr>";
              }
            }

        ?>
  </table>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
