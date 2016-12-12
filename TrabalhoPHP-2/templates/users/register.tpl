<script type="text/javascript">
  function hasNumber(address) {
    return /\d/.test(address);
  }

  function validateForm() {
    var flagSubmitOk  = true;
    var form          = document.register_form;
    var username      = form.username.value;
    var password      = form.password.value;
    var name          = form.name.value;
    var name_space    = form.name.value.indexOf(" ");
    var zipcode1      = form.zipcode1.value;
    var zipcode2      = form.zipcode2.value;
    var address       = form.address.value;
    var email       = form.email.value;
    var email_at      = form.email.value.indexOf("@");
    var email_dot     = form.email.value.indexOf(".");
    var phone         = form.phone.value;

    $('.field_error').html('');

    // validate username
    if(username.length<4 || username.length>10) {
      $('.field_error#username').html('O username deverá conter no mínimo 4 caracteres e no máximo 10 caracteres');
      flagSubmitOk = false;
    }

    // validate password
    if(password.length<5 || password.length>24) {
      $('.field_error#password').html('A password deverá conter no mínimo 5 caracteres e no máximo 24 caracteres');
      flagSubmitOk = false;
    }

    // valid name
    if(name.length<10) {
      $('.field_error#name').html('O campo de nome deve conter no mínimo 10 caracteres');
      flagSubmitOk = false;
    } else if(name_space == -1) {
      $('.field_error#name').html('Por favor introduza o primeiro e o último nome');
      flagSubmitOk = false;
    }

    // validate address
    if(!hasNumber(address) || address.length<5) {
      $('.field_error#address').html('A morada também deve conter o número da porta');
      flagSubmitOk = false;
    }

    // validate zip code
    if(zipcode1<1000 || zipcode1>9980 || zipcode2<1) {
      $('.field_error#zipcode').html('Código postal incorrecto');
      flagSubmitOk = false;
    }

    if(email_at<0 || email_dot<0) {
      $('.field_error#email').html('E-mail inválido');
      flagSubmitOk = false;
    }

    // validate phone
    if(phone.toString().length<9 || isNaN(parseFloat(phone))) {
      $('.field_error#phone').html('O número de telefone deve conter exatamente 9 dígitos');
      flagSubmitOk = false;
    }

    return flagSubmitOk;
  }

</script>


<section id="register">
  <h2>Registo</h2>

  <form name="register_form" action="{$BASE_URL}actions/users/register.php" onsubmit="return validateForm()" method="post">
    <label>Nome:</label>
      <input type="text" name="name" placeholder="Insira o seu nome" {if isset($FORM_VALUES.name)} value="{$FORM_VALUES.name}"{/if}  >
      <span class="field_error" id="name">{if isset($FIELD_ERRORS.name)} {}$FIELD_ERRORS.name} {/if}</span>
    <br>
    <label>Morada:</label>
      <input type="text" name="address" placeholder="Insira a sua morada" {if isset($FORM_VALUES.address)} value="{$FORM_VALUES.address}" {/if}  >
      <span class="field_error" id="address">{if isset($FIELD_ERRORS.address)} {$FIELD_ERRORS.address} {/if}</span>
    <br>
    <label>Código-Postal:</label>
      <input type="text" name="zipcode1" style="width: 6em;" maxlength=4 {if isset($FORM_VALUES.zipcode1)} value="{$FORM_VALUES.zipcode1}" {/if}>
      -
      <input type="text" name="zipcode2" style="width: 4em;" maxlength=3 {if isset($FORM_VALUES.zipcode2)} value="{$FORM_VALUES.zipcode2}" {/if}>
      <span class="field_error" id="zipcode">{if isset($FIELD_ERRORS.zipcode)} {$FIELD_ERRORS.zipcode} {/if}</span>
    <br>
    <label>Email:</label>
      <input type="email" name="email" placeholder="Insira o seu email" {if isset($FORM_VALUES.email)} value="{$FORM_VALUES.email}" {/if}  >
      <span class="field_error" id="email">{if isset($FIELD_ERRORS.email)} {$FIELD_ERRORS.email} {/if}</span>
    <br>
    <label>Telefone:</label>
      <input type="text" name="phone" maxlength=9 {if isset($FORM_VALUES.phone)} value="{$FORM_VALUES.phone}" {/if} class="small"  >
      <span class="field_error" id="phone">{if isset($FIELD_ERRORS.phone)} {$FIELD_ERRORS.phone} {/if}</span>
    <br>
    <label>Username:</label>
      <input type="text" name="username" {if isset($FORM_VALUES.name)} value="{$FORM_VALUES.username}" {/if} class="small">
      <span class="field_error" id="username">{if isset($FIELD_ERRORS.username)} {$FIELD_ERRORS.username} {/if}</span>
    <br>
    <label>Password:</label>
      <input type="password" name="password" value="" class="small">
      <span class="field_error" id="password">{if isset($FIELD_ERRORS.password)} {$FIELD_ERRORS.password} {/if}</span>
    <br>
    <input type="submit" value="Registrar">
  </form>

</section>
