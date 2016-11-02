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
?>

<div id="container">
  <H3>Resultado da consulta</H3>

  <table border="1">

    <!-- Impressao dos headers da tabela  -->
    <tr>
      <td>Estado</td><td>Nr Encomenda</td><td>Data da encomenda</td><td>N artigos</td><td>Preco total</td>
    </tr>

    <!-- Impressao da  linha contendo o resultado da consulta -->
    <tr>
      <td>
        <?php echo $cidade;?>
      </td>
      <td>
        <?php echo $temperatura;?>
      </td>
    </tr>
  </table>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
