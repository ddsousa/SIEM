<html>
<head>
	<meta charset="UTF-8">
	<title>Oceano Hipermercado</title>
	<!--<link rel="icon" href="media/img/logos/icon.png"> -->
	<?php echo '<link rel="icon" href="'.'../../media/img/logos/icon.png">'?>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
	<div id="wrapper">
		<div id="header">
		<div style="height: 80px">
			<a href="../common/home.php"> <img src="../../media/img/logos/logo.png" class="logo"></a>
			<table class="tab-login" style="visibility: visible">
<?php if(!isset($_SESSION['USERNAME'])) { ?>
				<tr>
					<form method="POST" action="../../actions/users/login.php">
						<td>
							<input style="width: 150px;" type="text" placeholder="Username" name="username"></input>
						</td>
						<td>
							<input style="width: 100px;" type="password" placeholder="Password" name="password"></input>
						</td>
						<td>
							<input type="submit" value="Login" class="btn-princ">
						</td>
						</form>
					<td>
						<a href="../../pages/users/register.php"><input type="button" value="Registrar" class="btn-princ"></input></a>
					</td>
				</tr>
<?php } else { ?>
	<tr>
			<td>
					<?php echo '<a href="../../actions/clients/getDetails.php?username=' . $_SESSION['USERNAME'] . '">' . $_SESSION['USERNAME'] . '</a>' ?>
			</td>
			<td>
					<a href="../../actions/users/logout.php"><input type="button" value="Logout" class="btn-princ"></input></a>
			</td>
	</tr>
<?php } ?>
			</table>

			<div id="login_messages">
				<?php
			    if(isset($_SESSION['ERROR_LOGIN'])) {
			      $error_login = $_SESSION['ERROR_LOGIN'];
			      foreach ($error_login as $error) {
			        echo '<div class="error">' . $error . '<a class="close" href="#">X</a></div>';
			      }

			      unset($_SESSION['ERROR_LOGIN']);
			    }

			    if(isset($_SESSION['SUCCESS_LOGIN'])) {
			      $success_login = $_SESSION['SUCCESS_LOGIN'];
			      foreach ($success_login as $success) {
			        echo '<div class="error">' . $success . '<a class="close" href="#">X</a></div>';
			      }

			      unset($_SESSION['SUCCESS_LOGIN']);
			    }
			  ?>
			</div>
			</div>
