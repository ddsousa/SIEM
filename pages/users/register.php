<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
?>

<form method="POST" action="actionAddUser.php">

  <table>
    <tr>
      <td>Nome</td>
      <td><input type="text" name="name" value="Insira o seu nome..."></input></td>
    </tr>
    <tr>
      <td>Morada</td>
      <td><input type="text" name="address" value="Insira a sua morada..."></input></td>
    </tr>
    <tr>
      <td>Código postal</td>
      <td><input type="text" name="postalcode1"></input></td>
      <td>-</td>
      <td><input type="text" name="postalcode2"></input></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><input type="e-mail" name="email" value="Insira o seu endereço de email..."></input></td>
    </tr>
    <tr>
      <td>Telefone</td>
      <td><input type="text" name="phone" value="Insira a seu número de telefone..."></input></td>
    </tr>
    <tr>
      <!-- -->
    </tr>
    <tr>
      <td>Username</td>
      <td><input type="text" name="username"></input></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><input type="password" name="password"></input></td>
    </tr>

  <input type="submit" value="Submeter">

</form>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
