<section id="register">
  <h2>Register</h2>

  <form action="{$BASE_URL}actions/users/register.php" method="post">
    <label>Nome:</label><input type="text" name="name" placeholder="Insira o seu nome" value="{$FORM_VALUES.name}"><br>
    <label>Morada:</label><input type="text" name="address" placeholder="Insira a sua morada" value="{$FORM_VALUES.address}"><br>
    <label>Código-Postal:</label><input type="text" name="zipcode1" style="width: 6em;" maxlength=4 value="{$FORM_VALUES.zipcode1}">
    - <input type="text" name="zipcode2" style="width: 4em;" maxlength=3     value="{$FORM_VALUES.zipcode2}"><br>
    <label>Email:</label><input type="email" name="email" placeholder="Insira o seu email" value="{$FORM_VALUES.email}"><br>
    <label>Telefone:</label><input type="text" name="phone" maxlength=9 value="{$FORM_VALUES.phone}" class="small"><br>
    <label>Username:</label><input type="text" name="username" value="{$FORM_VALUES.username}" class="small"><br>
    <label>Password:</label><input type="password" name="password" value="" class="small"><br>
    <input type="submit" value="Registrar">
  </form>

</section>
