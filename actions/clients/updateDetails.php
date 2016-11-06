<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");

  if(!$_POST['nome'] || !$_POST['email'] || !$_POST['morada'] || !$_POST['codigopostal1'] || !$_POST['codigopostal2']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';
    $_SESSION['CLIENT_DATA'] = $_POST;

    header("Location: ../../pages/users/details.php");
    exit;
  }

  // If the client submited the password update to the new one
  if($_POST['password']) {
    updatePassword($_SESSION['USERNAME'], $_POST['password']);
  }

  // Update the clients' data
  $id_client = getClientId($_SESSION['USERNAME']);

  $address   = "'" . strip_tags('morada=' . urlencode($_POST['morada']) . '&pc1=' . urlencode($_POST['codigopostal1']) . '&pc2=' . urlencode($_POST['codigopostal2'])) . "'";

  updateClient($id_client, $_POST['nome'], $address, $_POST['telefone'], $_POST['email']);

  $_SESSION['SUCCESS_LOGIN'][] = 'Alterações efectuadas com sucesso!';

  //echo 'Location: ../../actions/clients/getDetails.php?username=' . $_SESSION['USERNAME'];

  header('Location: ../../actions/clients/getDetails.php?username=' . $_SESSION['USERNAME']);
  exit;
 ?>
