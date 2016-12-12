<div class="logged_out">
	<form action="{$BASE_URL}actions/users/login.php" method="post">
	  <input type="text" placeholder="username" name="username">
	  <input type="password" placeholder="password" name="password">
	  <input type="submit" value="Login">
	</form>
	<form action="{$BASE_URL}pages/users/register.php" method="post">
		<input type="submit" value="Registar" class="register">
	</form>
</div>