<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");
?>
</div>
<div id="container">
  <form method="POST" action="../../actions/users/register.php">

    <table>
      <tr>
        <td align="right">Nome</td>
        <td><input type="text" name="name" placeholder="Insira o seu nome..."></input></td>
      </tr>
      <tr>
        <td align="right">Morada</td>
        <td><input type="text" name="address" placeholder="Insira a sua morada..."></input></td>
      </tr>
      <tr>
        <td align="right">Código postal</td>
        <td><input type="text" name="postalcode1" maxlength="4"></input></td>
        <td>-</td>
        <td><input type="text" name="postalcode2" maxlength="3"></input></td>
      </tr>
      <tr>
        <td align="right">Email</td>
        <td><input type="email" name="email" placeholder="Insira o seu endereço de email..."></input></td>
      </tr>
      <tr>
        <td align="right">Telefone</td>
        <td><input type="text" name="phone" placeholder="Insira a seu número de telefone..." maxlength="9"></input></td>
      </tr>
      <tr>
        <!-- -->
      </tr>
      <tr>
        <td align="right">Username</td>
        <td><input type="text" name="username"></input></td>
      </tr>
      <tr>
        <td align="right">Password</td>
        <td><input type="password" name="password"></input></td>
      </tr>
      <tr>
        <td></td>
        <td align="right"><input type="submit" value="Submeter"></td>
      </tr>



  </form>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
