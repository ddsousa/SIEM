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
  if(isset($_POST['password'])) {
    updatePassword($_SESSION['USERNAME'], $_POST['password']);
  }

  // Update the clients' data
  if(!empty($_GET['id'])) {
    $id_client = $_GET['id'];
  } else {
    $id_client = getClientId($_SESSION['USERNAME']);
  }

  $address   = "'" . strip_tags('morada=' . urlencode($_POST['morada']) . '&pc1=' . urlencode($_POST['codigopostal1']) . '&pc2=' . urlencode($_POST['codigopostal2'])) . "'";

  updateClient($id_client, $_POST['nome'], $address, $_POST['telefone'], $_POST['email']);

  $_SESSION['SUCCESS_MESSAGES'][] = 'Alterações efectuadas com sucesso!';

  header('Location: ../../pages/users/details.php');
  exit;
 ?>
