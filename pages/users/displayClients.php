<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/database/client.php");
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR."/common/admin_only.php");

	// get clients from database
	if(!empty($_POST['search'])) {
		$clients_array = getClientsByName($_POST['search']);
	} else {
		$clients_array = getClients();
	}
?>
<div id="container">
	<h3 class="page-title">Clientes</h3>

	<table class="tab-blue" style="margin-bottom:20px;">
		<tr class="tab-first-row">
			<td>Nome</td>
			<td>Morada</td>
			<td>Código Postal</td>
			<td>Email</td>
			<td>Telefone</td>
		</tr>
		<?php
			for($i=0; $i<sizeof($clients_array); $i++) {
				$client = $clients_array[$i]; ?>
				<tr>
				<td><a href="displayClientDetails.php?menu=Clientes&id=<?php echo $client['id']?>"><?php echo $client['nome']?></a></td>
					<td><?php echo $client['morada']; ?></td>
					<td><?php echo $client['codigopostal1'].'-'.$client['codigopostal2']; ?></td>
					<td><a href="mailto:<?php echo $client['email']?>"><?php echo $client['email']; ?></a></td>
					<td><?php echo $client['telefone'] ?></td>
				</tr>
		<?php } ?>

	</table>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>
