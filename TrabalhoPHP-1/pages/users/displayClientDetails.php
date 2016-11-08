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
	<h3 class="page-title" style="display: inline-block;">Dados do utilizador <?php echo $client_data['nome']?></h3>
	<a href="changeClientDetails.php?id=<?php echo $_GET['id']?>"><img class="edit-icon-big" src="../../media/img/icons/edit.png" alt="icon de editar"></a>
	<table class="tab-register">
		<tr>
			<td><strong>Nome:</strong></td>
			<td><?php echo $client_data['nome']; ?></td>
		</tr>
		<tr>
			<td><strong>Morada:</strong></td>
			<td><?php echo $client_data['morada']; ?></td>
		</tr>
		<tr>
			<td><strong>Código de Postal:</strong></td>
			<td><?php echo $client_data['codigopostal1'].'-'.$client_data['codigopostal2'] ?></td>
		</tr>
		<tr>
			<td><strong>Email:</strong></td>
			<td><a href="mailto:<?php echo $client_data['email']; ?>"><?php echo $client_data['email']; ?></a></td>
		</tr>
		<tr>
			<td><strong>Telefone:</strong></td>
			<td><?php echo $client_data['telefone']; ?></td>
		</tr>
	</table>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>
