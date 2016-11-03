<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	include_once($BASE_DIR."/database/client.php");
?>
</div>

<?php 
	// get clients from database
	$clients_array = getClients();
?>
<div id="container">
	<table>
		<tr>
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
					<td><?php echo $client['nome']; ?></td>
					<td><?php echo $client['morada']; ?></td>
					<td>TODO-zip-code</td>
					<td><?php echo $client['email']; ?></td>
					<td><?php echo $client['telefone'] ?></td>
				</tr>
		<?php } ?>

	</table>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>