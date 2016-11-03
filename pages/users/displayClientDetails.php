<?php
	include_once("../../common/init.php");
	include_once($BASE_DIR."/common/header.php");
	if(!empty($_GET['menu'])) {
		$active_menu = $_GET['menu'];
	}
	include_once($BASE_DIR."/common/navbar.php");
	include_once($BASE_DIR."/database/user.php");

	// get user info
	if(!empty($_GET['id'])) {
		$user_info = getClientById($_GET['id']);
	}
?>
</div>

<div id="container">
	<h3 style="display: inline-block;">Dados do utilizador <?php echo $user_info['nome']?></h3>
	<img class="edit-icon-big" src="../../media/img/icons/edit.png" alt="icon de editar">
	<table>
		<tr>
			<td><strong>Nome:</strong></td>
			<td><?php echo $user_info['nome']; ?></td>
		</tr>
		<tr>
			<td><strong>Morada:</strong></td>
			<td><?php echo $user_info['morada']; ?></td>
		</tr>
		<tr>
			<td><strong>Código de Postal:</strong></td>
			<td><?php echo "TODO" ?></td>
		</tr>
		<tr>
			<td><strong>Email:</strong></td>
			<td><a href="mailto:<?php echo $user_info['email']; ?>"><?php echo $user_info['email']; ?></a></td>
		</tr>
		<tr>
			<td><strong>Telefone:</strong></td>
			<td><?php echo $user_info['telefone']; ?></td>
		</tr>
	</table>
</div>

<?php
	include_once($BASE_DIR."/common/footer.php");
?>