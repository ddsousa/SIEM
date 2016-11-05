<?php
  include_once('../../common/init.php');
  include_once($BASE_DIR . "/database/client.php");
  include_once($BASE_DIR . "/database/user.php");

  if (isset($_SESSION['user_type'])) {
    // Data verification
    if($_SESSION['user_type']=="cliente") { 
      if (!$_POST['username'] || !$_POST['name'] || !$_POST['email'] || !$_POST['password'] || !$_POST['address'] || !$_POST['postalcode1'] || !$_POST['postalcode2'] || !$_POST['phone_number']) {
        $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';
        $_SESSION['form_values'] = $_POST; // save data in session
        
        header("Location: ../../pages/users/register.php");
        exit;
      }
    } else if($_SESSION['user_type']=="admin") {
      if (!$_POST['username'] || !$_POST['password']) {
        $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';
        $_SESSION['form_values'] = $_POST; // save data in session

        header("Location: ../../pages/users/register.php");
        exit;
      }
    }

    // Extract data
    if($_SESSION['user_type']=="cliente") {
      $name      = "'" . strip_tags($_POST['name']) . "'";
      $address   = "'" . strip_tags('morada=' . urlencode($_POST['address']) . '&pc1=' . urlencode($_POST['postalcode1']) . '&pc2=' . urlencode($_POST['postalcode2'])) . "'";
      $email     = "'" . strip_tags($_POST['email']) . "'";
      $phone     = strip_tags($_POST['phone_number']);
    }
    $username  = "'" . strip_tags($_POST['username']) . "'";
    $password  = strip_tags($_POST['password']);
    
    // Database access
    if(userExists($username) > 0) {
      $_SESSION['ERROR_MESSAGES'][] = 'O username inserido não se encontra disponível, por favor insira outro.';
      $_SESSION['form_values'] = $_POST;

      header("Location: ../../pages/users/register.php");
      exit;
    }

    if($_SESSION['user_type']=="cliente") {
      $new_id = createClient($name, $address, $phone, $email);
      createUser($new_id, 0, $username, $password);
    } else if($_SESSION['user_type']=="admin") {
      createUser(-1, 1, $username, $password);
    }
  
    $_SESSION['SUCCESS_MESSAGES'][] = 'Conta criada com sucesso!';

    // unset session variables
    if($_SESSION['user_type']=="cliente") {
      unset($_SESSION['name']);
      unset($_SESSION['address']);
      unset($_SESSION['postalcode1']);
      unset($_SESSION['postalcode2']);
      unset($_SESSION['email']);
      unset($_SESSION['phone_number']);
    }
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['user_type']);

    header("Location: ../../pages/common/info.php");
  } else {
    header("Location: ../../pages/users/register.php");
    exit;
  }
 ?>
