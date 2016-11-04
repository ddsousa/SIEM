<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");

  // Data verification
  if (!$_POST['username'] || !$_POST['name'] || !$_POST['email'] || !$_POST['password'] || !$_POST['address'] || !$_POST['postalcode1'] || !$_POST['postalcode2'] || $_POST['phone_number']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';
    $_SESSION['form_values'] = $_POST;

    // save data in session
    $_SESSION['username']    = $_POST['username'];
    $_SESSION['name']        = $_POST['name'];
    $_SESSION['email']       = $_POST['email'];
    $_SESSION['password']    = $_POST['password'];
    $_SESSION['address']     = $_POST['address'];
    $_SESSION['postalcode1'] = $_POST['postalcode1'];
    $_SESSION['postalcode2'] = $_POST['postalcode2'];
    $_SESSION['phone']       = $_POST['phone_number'];

    header("Location: ../../pages/users/register.php");
    exit;
   }

   // Extract data
   $username  = "'" . strip_tags($_POST['username']) . "'";
   $password  = strip_tags($_POST['password']);
   $name      = "'" . strip_tags($_POST['name']) . "'";
   $address   = "'" . strip_tags('morada=' . urlencode($_POST['address']) . '&pc1=' . urlencode($_POST['postalcode1']) . '&pc2=' . urlencode($_POST['postalcode2'])) . "'";
   $email     = "'" . strip_tags($_POST['email']) . "'";
   $phone     = strip_tags($_POST['phone_number']);

   // Database access
   if(userExists($username) > 0) {
     $_SESSION['ERROR_MESSAGES'][] = 'O username inserido não se encontra disponível, por favor insira outro.';
     $_SESSION['form_values'] = $_POST;

     header("Location: ../../pages/users/register.php");
     exit;
   }

   $new_id = createClient($name, $address, $phone, $email);

   createUser($new_id, 0, $username, $password);

   $_SESSION['SUCCESS_MESSAGES'][] = 'A sua conta foi criada com sucesso!';
   header("Location: ../../pages/common/info.php");
 ?>
