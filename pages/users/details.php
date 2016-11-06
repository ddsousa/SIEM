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

  <a href="../../pages/users/orders.php"><input type="button" value="Encomendas" class="btn-princ"></input></a>
  <form method="POST" action="../../actions/clients/updateDetails.php">

    <table>
      <tr>
        <td align="right">Nome</td>
        <td><input type="text" name="nome" value="<?php echo $_SESSION['CLIENT_DATA']['nome']; ?>"></input></td>
      </tr>
      <tr>
        <td align="right">Morada</td>
        <td><input type="text" name="morada" value="<?php echo $_SESSION['CLIENT_DATA']['morada']; ?>"></input></td>
      </tr>
      <tr>
        <td align="right">Código postal</td>
        <td><input type="text" name="codigopostal1" value="<?php echo $_SESSION['CLIENT_DATA']['codigopostal1']; ?>"></input></td>
        <td>-</td>
        <td><input type="text" name="codigopostal2" value="<?php echo $_SESSION['CLIENT_DATA']['codigopostal2']; ?>"></input></td>
      </tr>
      <tr>
        <td align="right">Email</td>
        <td><input type="e-mail" name="email" value="<?php echo $_SESSION['CLIENT_DATA']['email']; ?>"></input></td>
      </tr>
      <tr>
        <td align="right">Telefone</td>
        <td><input type="text" name="telefone" value="<?php echo $_SESSION['CLIENT_DATA']['telefone']; ?>"></input></td>
      </tr>
      <tr>
        <!-- -->
      </tr>
      <tr>
        <td align="right">Username</td>
        <td><input type="text" name="username" value="<?php echo $_SESSION['USERNAME']; ?>" disabled></input></td>
      </tr>
      <tr>
        <td align="right">Password</td>
        <td><input type="password" name="password"></input></td>
      </tr>
      <tr>
        <td></td>
        <td align="right"><input type="submit" value="GUARDAR"></td>
      </tr>
  </form>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
