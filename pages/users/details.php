<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");
  include_once ($BASE_DIR . "/common/user_only.php");

  $id_client = getClientId($_SESSION['USERNAME']);
  $client_data = getClientData($id_client);
?>

<div id="container">
  <h3 class="page-title">Formulário de Registo de Cliente</h3>
  <form method="POST" name="upadate_user_form" action="../../actions/clients/updateDetails.php">
  <table class="tab-register">
  <tr>
    <td align="right">Nome</td>
    <td><input type="text" name="nome" value="<?=$client_data['nome']?>"></input></td>
  </tr>
  <tr>
    <td align="right">Morada</td>
    <td><input type="text" name="morada" value="<?=$client_data['morada']?>"></input></td>
  </tr>
  <tr>
    <td align="right">Código postal</td>
    <td>
      <table class="tab-zipcode">
        <tr>
          <td><input type="text" name="codigopostal1" maxlength="4" value="<?=$client_data['codigopostal1']?>" style="width: 85px;"></input></td>
          <td>-</td>
          <td><input type="text" name="codigopostal2" maxlength="3" value="<?=$client_data['codigopostal2']?>" style="width: 70px;"></input></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td align="right">Email</td>
    <td><input type="email" name="email" value="<?=$client_data['email']?>"></input></td>
  </tr>
  <tr>
    <td align="right">Telefone</td>
    <td><input class="medium" type="text" name="telefone" value="<?=$client_data['telefone']?>" maxlength="9"></input></td>
  </tr>
<!-- -->
<tr>
<td align="right">Username</td>
<td><input class="medium" type="text" name="username" value="<?=$_SESSION['USERNAME']?>" disabled=""></input></td>
</tr>
<tr>
<td align="right">Password</td>
<td><input class="medium" type="password" name="password"></input></td>
</tr>
<tr>
  <td></td>
  <td><input type="submit" class="btn-princ" value="GUARDAR"></td>
</tr>
</table>

</form>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
