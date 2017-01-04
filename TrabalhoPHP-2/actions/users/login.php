<?php
	include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');

  if (!$_POST['username'] || !$_POST['password']) {
    $_SESSION['error_messages'][] = 'Login Inválido';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $username = $_POST['username'];
  $password = $_POST['password'];

  if (isLoginCorrect($username, $password)) {
    $_SESSION['username']						= $username;
		$_SESSION['permissions'] 				= getPermissions($username);
    $_SESSION['success_messages'][] = 'Login efetuado com sucesso';
  } else {
    $_SESSION['error_messages'][]		= 'Login falhou';
  }
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
