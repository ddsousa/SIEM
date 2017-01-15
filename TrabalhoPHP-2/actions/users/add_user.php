<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR.'config/admin_only.php');
  include_once($BASE_DIR.'database/users.php');
  include_once($BASE_DIR.'database/clients.php');

  if(!$_POST['name'] || !$_POST['address'] ||!$_POST['zc1'] || !$_POST['zc2'] || !$_POST['email'] || !$_POST['phone'] || !$_POST['username'] || !$_POST['password']) {
    $_SESSION['error_messages'][] = 'Erro: campos em falta';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $name     = strip_tags($_POST['name']);
  $address2 = strip_tags($_POST['address']);
  $address  = "addressname=".urlencode($address2).'&zc1='.urlencode($zc1)."&zc2=".urlencode($zc2);
  $zc1      = strip_tags($_POST['zc1']);
  $zc2      = strip_tags($_POST['zc2']);
  $email    = strip_tags($_POST['email']);
  $phone    = strip_tags($_POST['phone']);
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  if(!userExists($username)) {
    createClient($name, $address, $phone, $email);
    try {
      createUser(0, $username, $password);
    } catch (PDOException $e) {
      if (strpos($e->getMessage(), 'users_username_key') !== false) {
        $_SESSION['field_errors']['username'] = 'O username introduzido já existe';
      } else {
        $_SESSION['error_messages'][] = 'Erro ao criar utilizador';
      }

      $_SESSION['form_values'] = $_POST;
      header("Location: $BASE_URL" . 'pages/users/register.php');
      exit;
    }
    $_SESSION['success_messages'][] = 'Nova conta de utilizador criada com sucesso';
    header("Location: $BASE_URL");
    exit;
  }
  else {
    $_SESSION['error_messages'][] = 'O username introduzido já existe';
    $_SESSION['form_values'] = $_POST;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }
?>
