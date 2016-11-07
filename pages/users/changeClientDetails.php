<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR."/database/client.php");
	include_once($BASE_DIR."/common/admin_only.php");

	// get user info
	if(!empty($_GET['id'])) {
		$client_data = getClientData($_GET['id']);
	}
?>

<div id="container">
	<h3 class="page-title">Alterar dados do utilizador <?php echo $client_data['nome']?></h3>
	<form method="POST" action="../../actions/clients/updateDetails.php?id=<?php echo $_GET['id']?>">
		<table class="tab-register">
			<tr>
				<td><strong>Nome:</strong></td>
				<td><input type="text" name="nome" value="<?php echo $client_data['nome']?>"></td>
			</tr>
			<tr>
				<td><strong>Morada:</strong></td>
				<td><input type="text" name="morada" value="<?php echo $client_data['morada']?>"></td>
			</tr>
			<tr>
				<td><strong>Código de Postal:</strong></td>
				<td>
					<table class="tab-zipcode">
						<tr>
							<td><input type="text" name="codigopostal1" value="<?php echo $client_data['codigopostal1']?>" maxlength="4" style="width: 85px;"></td>
							<td>-</td>
							<td><input type="text" name="codigopostal2" value="<?php echo $client_data['codigopostal2']?>" maxlength="3" style="width: 70px;"></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td><strong>Email:</strong></td>
				<td><input type="email" name="email" value="<?php echo $client_data['email']?>"></td>
			</tr>
			<tr>
				<td><strong>Telefone:</strong></td>
				<td><input class="medium" type="text" name="telefone" value="<?php echo $client_data['telefone']?>" maxlength="9"></td>
			</tr>
		</table>
		<input type="submit" class="btn-princ" value="Alterar" style="margin: 20px auto auto 160px; width: 80px;">
	</form>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>