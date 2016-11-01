<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");

  if (!$_POST['username'] || !$_POST['name'] || !$_POST['email'] || !$_POST['password'] || !$_POST['address'] || !$_POST['postalcode1'] || !$_POST['postalcode2']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';
    $_SESSION['form_values'] = $_POST;

    header("Location: ../../pages/users/register.php");
    exit;
  }

 ?>
