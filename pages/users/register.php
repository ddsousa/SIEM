<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/common/header.php");
  include_once ($BASE_DIR . "/common/navbar.php");
  include_once ($BASE_DIR . "/common/messages.php");

  if(!empty($_GET['user_type'])) {
    $_SESSION['user_type'] = $_GET['user_type'];
  }
?>

<script type="text/javascript">
  function hasNumber(address) {
    alert(/\d/.test(address));
    return /\d/.test(address);
  }

  function validateForm() {
    var flagSubmitOk  = true
    var user_type = "<?php echo $_SESSION['user_type'] ?>"
    var form          = document.register_form
    var username      = form.username.value
    var password      = form.password.value

    // validate username
    if(username.length<4 || username.length>10) {
      alert("O username deverá conter no mínimo 4 caracteres e no máximo 10 caracteres")
      flagSubmitOk = false
    }

    // validate password
    if(password.length<5 || password.length>24) {
      alert("A password deverá conter no mínimo 5 caracteres e no máximo 24 caracteres.")
      flagSubmitOk = false
    }
    if(user_type=="cliente") {
      var email_pos_at      = form.email.value.indexOf("@")
      var email_pos_dot     = form.email.value.indexOf(".")
      var codigo_postal1    = form.postalcode1.value
      var codigo_postal2    = form.postalcode2.value
      var address           = form.address.value
      var name              = form.name.value
      var name_pos_space    = form.name.value.indexOf(" ")
      var phone_number      = form.phone_number.value

      // validate name
      if(name.length<10) {
        alert("O campo de nome deve conter no mínimo 10 caracteres")
        flagSubmitOk = false
      }
      else if(name_pos_space==-1) {
        alert("Por favor introduza o primeiro e o último nome")
        flagSubmitOk = false
      }

      // validate email address
      if(email_pos_at==-1 || email_pos_dot<email_pos_at) {
        alert("O Endereço de email não é válido porque não contém o caracter @ e conter o . a seguir ao @")
        flagSubmitOk = false
      }

      // validate address
      if(!hasNumber(address)) {
        alert("A morada também deve conter o número da porta")
        flagSubmitOk = false
      }

      // validate zip code
      if(codigo_postal1<1000 || codigo_postal1>9980) {
        alert("Código postal incorreto. Deve ser válido e estar entre o intervalo 1000-9980")
        flagSubmitOk = false
      }
      // TODO - obtain city from zip code
      var codigo_postal = codigo_postal1+"-"+codigo_postal2

      // validate phone_number
      if(phone_number.length<9 || !is_numeric(phone_number)) {
        alert("O número de telefone deve conter exatamente 9 dígitos")
        flagSubmitOk = false
      }
    }

    if(!flagSubmitOk) {
      return false
    }

  }
</script>

<div id="container">
    <form method="POST" name="register_form" onsubmit="return validateForm()" action="../../actions/users/register.php">
    <table>
<?php if(!empty($_GET['user_type']) || isset($_SESSION['user_type'])) {
        if(!empty($_GET['user_type']))
          $user_type = $_GET['user_type'];
        else
          $user_type = $_SESSION['user_type'];

        switch($user_type) {
          case "admin": ?>
            <h3>Formulário de Registo de Administrador</h3>
    <?php break;
          case "cliente":?>
            <h3>Formulário de Registo de Cliente</h3>
            <tr>
              <td align="right">Nome</td>
              <td><input type="text" name="name" placeholder="Insira o seu nome..." <?php if(isset($_SESSION['form_values']['name'])) echo 'value="'.$_SESSION['form_values']['name'].'"'; ?> ></input></td>
            </tr>
            <tr>
              <td align="right">Morada</td>
              <td><input type="text" name="address" placeholder="Insira a sua morada..." <?php if(isset($_SESSION['form_values']['address'])) echo 'value="'.$_SESSION['form_values']['address'].'"'; ?> ></input></td>
            </tr>
            <tr>
              <td align="right">Código postal</td>
              <td><input type="text" name="postalcode1" maxlength="4" size="5px" <?php if(isset($_SESSION['form_values']['postalcode1'])) echo 'value="'.$_SESSION['form_values']['postalcode1'].'"'; ?> ></input>
              -
              <input type="text" name="postalcode2" maxlength="3" size="5px" <?php if(isset($_SESSION['form_values']['postalcode2'])) echo 'value="'.$_SESSION['form_values']['postalcode2'].'"'; ?>></input>
            </tr>
            <tr>
              <td align="right">Email</td>
              <td><input type="email" name="email" placeholder="Insira o seu endereço de email..." <?php if(isset($_SESSION['form_values']['email'])) echo 'value="'.$_SESSION['form_values']['email'].'"'; ?>></input></td>
            </tr>
            <tr>
              <td align="right">Telefone</td>
              <td><input type="text" name="phone_number" placeholder="Insira a seu número de telefone..." maxlength="9" <?php if(isset($_SESSION['form_values']['phone_number'])) echo 'value="'.$_SESSION['form_values']['phone_number'].'"'; ?>></input></td>
            </tr>
    <?php break;
        }
      } ?>
        <!-- -->
      <tr>
        <td align="right">Username</td>
        <td><input type="text" name="username" placeholder="Username" <?php if(isset($_SESSION['form_values']['username'])) echo 'value="'.$_SESSION['form_values']['username'].'"'; ?>></input></td>
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
