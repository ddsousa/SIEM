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
