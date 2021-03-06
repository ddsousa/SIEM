<script language="javascript">
	function createUser(sel) {
		window.location.assign("../../pages/users/register.php?user_type="+sel.value);
	}

	function addCategory() {
		 if(document.getElementById("product_category").value == "adicionar") {
			 //document.getElementById("new_category").style.visibility = "visible";
			 $("#new_category").show(1000);
		 } else {
			 //document.getElementById("new_category").style.visibility = "hidden";
			 $("#new_category").hide(1000);
		 }
	}


</script>

<html>
<head>
	<meta charset="UTF-8">
	<title>Oceano Hipermercado</title>
	<?php echo '<link rel="icon" href="'.'../../media/img/logos/icon.png">'?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
	<div id="wrapper">
		<div id="header">
		<div style="height: 80px;">
			<a href="../common/home.php?menu=Inicio"> <img src="../../media/img/logos/logo.png" class="logo"></a>
			<div style="width: 300px; float: right">
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
						<?php echo '<a style="color: #fff; padding-right: 15px;" href="../../pages/users/details.php">' . $_SESSION['USERNAME'] . '</a>' ?>
				</td>
				<td>
						<a href="../../actions/users/logout.php"><input type="button" value="Logout" class="btn-princ"></input></a>
				</td>
		</tr>
	<?php } ?>
				</table>

	<?php if(isset($_SESSION['PERMISSIONS'])) {
					if($_SESSION['PERMISSIONS']==1) { // admin ?>
						<!-- create-user dropdown -->
		        <select class="dropbtn-blue" style="float:right;" onchange="createUser(this)">
		          <option disabled selected>Adicionar Utilizador</option>
		          <option value="cliente">Cliente</option>
		          <option value="admin">Administrador</option>
		        </select>
	  <?php } else if($_SESSION['PERMISSIONS']==0) { ?>
						<!-- user cart section -->
						<div class="cart">
							<?php
								if(!empty($_SESSION['cart_item'])) {
									$artigos = 0;

									foreach($_SESSION['cart_item'] as $item) {
										$artigos++;
									} ?>
									<p class="nr-cart-items"> <?=$artigos?> artigos no carrinho</p>
					<?php	} ?>
							<a href="../../pages/other/displayCarrinho.php?menu=Encomendas">
								<img width=29px height=29px src="../../media/img/icons/cart_icon.png" alt="imagem de carrinho">
								<div class="btn-princ" style="color: white; float: right;">Finalizar</div>
							</a>
						</div>
	  <?php }
	  		} ?>
			</div>


			<div id="login_messages">
				<?php
			    if(isset($_SESSION['ERROR_LOGIN'])) {
			      $error_login = $_SESSION['ERROR_LOGIN'];
			      foreach ($error_login as $error) {
			        echo '<div class="error">' . $error . '<a class="close" href="#">X</a></div>';
			      }

			      unset($_SESSION['ERROR_LOGIN']);
			    }
			  ?>
			</div>
		</div>
	</div>
