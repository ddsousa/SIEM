<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");

  // User verification
  if(!$_SESSION['USERNAME']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Não tem permissões para aceder a esta página.';

    header("Location: ../../index.php");
    exit;
  }

  // Data verification
  if (!$_GET['username']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Ocorreu um erro. Nome de utilizador não encontrado...';

    header("Location: ../../pages/common/info.php");
    exit;
  }

  // Database access
  if(userExists($_GET['username']) == 0) {
    $_SESSION['ERROR_MESSAGES'][] = 'O username não existe, por favor seleccione outro.';
    header("Location: ../../pages/common/info.php");
    exit;
  }

  $id_client = getClientId($_GET['username']);

  $client_data = getClientData($id_client);

  $_SESSION['CLIENT_DATA'] = $client_data;
  header("Location: ../../pages/users/details.php");
 ?>
