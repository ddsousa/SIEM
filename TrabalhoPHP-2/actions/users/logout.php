<?php
	include_once('../../config/init.php');

  session_destroy();

	$_SESSION['success_messages'][] = 'Logout realizado com sucesso';
  header('Location: '.$BASE_URL);
	exit;
?>
