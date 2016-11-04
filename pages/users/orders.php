<?php
/*
  User em questão indicado por GET?
  Só o próprio user logado e admins é que podem ver o detalhes do User
  Tem de ser redireccionado
*/
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");
  include_once ($BASE_DIR . "/database/order.php");
?>

<div id="container">
  <H3>Resultado da consulta</H3>

  <table border="1">

    <!-- Impressao dos headers da tabela  -->
    <tr>
      <td>Nr Encomenda</td><td>Estado</td><td>Data da encomenda</td><td>N artigos</td><td>Preco total</td>
    </tr>

    <!-- Impressao da  linha contendo o resultado da consulta -->

        <?php

        		$result = getOrders(getClientId($_SESSION['USERNAME']));

            $row = pg_fetch_assoc($result);
            if(!isset($row["numero"])) {
              echo "Não efectou encomendas.";
            } else {
          		while (isset($row["numero"])) {
          			echo "<tr><td>" . $row["numero"] . "</td>" .
                     "<td>-</td>" .
                     "<td>" . $row["data"] . "</td>" .
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
