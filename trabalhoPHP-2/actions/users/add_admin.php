<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR.'config/admin_only.php');
  include_once($BASE_DIR.'database/users.php');

  if(!$_POST['username'] || !$_POST['password']) {
    $_SESSION['error_messages'][] = 'Username ou password em falta';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  if(!userExists($username)) {
    createAdmin($username, $password);
    $_SESSION['success_messages'][] = 'Conta de administrador criada com sucesso';
    header('Location: ' . $BASE_URL);
    exit;
  }
  else {
    $_SESSION['error_messages'][] = 'O username introduzido já existe';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }
?>
