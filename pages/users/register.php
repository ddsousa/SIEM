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
<?php if(!empty($_GET['user_type'])) {
        switch($_GET['user_type']) {
          case "admin": ?>
            <h3>Formulário de Registo de Administrador</h3>
    <?php break; 
          case "cliente":?>
            <h3>Formulário de Registo de Cliente</h3>
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
              <td><input type="text" name="postalcode1" maxlength="4" size="5px"></input>
              -
              <input type="text" name="postalcode2" maxlength="3" size="5px"></input>
            </tr>
            <tr>
              <td align="right">Email</td>
              <td><input type="email" name="email" placeholder="Insira o seu endereço de email..."></input></td>
            </tr>
            <tr>
              <td align="right">Telefone</td>
              <td><input type="text" name="phone" placeholder="Insira a seu número de telefone..." maxlength="9"></input></td>
            </tr>
    <?php break; 
        }
      } ?>
        <!-- -->
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
        <td align="right"><input type="submit" class="btn-princ" value="Submeter"></td>
      </tr>



  </form>
</div>

<?php
  include_once ($BASE_DIR . "/common/footer.php");
?>
