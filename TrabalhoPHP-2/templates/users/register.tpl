<section id="register">
  <h2>Register</h2>

  <form action="{$BASE_URL}actions/users/register.php" method="post">
    <label>Nome: <input type="text" name="name" placeholder="Insira o seu nome" value=""></label><br>
    <label>Morada: <input type="text" name="address" placeholder="Insira a sua morada" value=""></label><br>
    <label>Código-Postal: <input type="text" name="zipcode1" style="width: 6em;" maxlength=4 value=""></label>
    -<input type="text" name="zipcode2" style="width: 4em;" maxlength=3     value=""><br>
    <label>Email: <input type="email" name="email" placeholder="Insira o seu email" value=""></label><br>
    <label>Telefone: <input type="text" name="phone" maxlength=9 value=""></label><br>
    <label>Username: <input type="text" name="username" value=""></label><br>
    <label>Password: <input type="password" name="password" value=""></label><br>
    <input type="submit" value="Registrar">
  </form>

</section>
