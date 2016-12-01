<section id="register">
  <h2>Registo</h2>

  <form action="{$BASE_URL}actions/users/register.php" method="post">
    <label>Nome:</label><input type="text" name="name" placeholder="Insira o seu nome" {if isset($FORM_VALUES.name)} value="{$FORM_VALUES.name}"{/if}><br>
    <label>Morada:</label><input type="text" name="address" placeholder="Insira a sua morada" {if isset($FORM_VALUES.address)} value="{$FORM_VALUES.address}" {/if}><br>
    <label>Código-Postal:</label><input type="text" name="zipcode1" style="width: 6em;" maxlength=4 {if isset($FORM_VALUES.zipcode1)} value="{$FORM_VALUES.zipcode1}" {/if}>
    - <input type="text" name="zipcode2" style="width: 4em;" maxlength=3 {if isset($FORM_VALUES.zipcode2)} value="{$FORM_VALUES.zipcode2}" {/if}><br>
    <label>Email:</label><input type="email" name="email" placeholder="Insira o seu email" {if isset($FORM_VALUES.email)} value="{$FORM_VALUES.email}" {/if}><br>
    <label>Telefone:</label><input type="text" name="phone" maxlength=9 {if isset($FORM_VALUES.phone)} value="{$FORM_VALUES.phone}" {/if} class="small"><br>
    <label>Username:</label><input type="text" name="username" {if isset($FORM_VALUES.name)} value="{$FORM_VALUES.username}" {/if} class="small"><br>
    <label>Password:</label><input type="password" name="password" value="" class="small"><br>
    <input type="submit" value="Registrar">
  </form>

</section>
