<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/client.php");
  include_once ($BASE_DIR . "/database/user.php");

  // Data verification
  if (!$_POST['username'] || !$_POST['name'] || !$_POST['email'] || !$_POST['password'] || !$_POST['address'] || !$_POST['postalcode1'] || !$_POST['postalcode2']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';
    $_SESSION['form_values'] = $_POST;

    header("Location: ../../pages/users/register.php");
    exit;
   }

   // Extract data
   $username  = "'" . strip_tags($_POST['username']) . "'";
   $password  = strip_tags($_POST['password']);
   $name      = "'" . strip_tags($_POST['name']) . "'";
   $address   = "'" . strip_tags($_POST['address'] . '#1:' . $_POST['postalcode1'] . '#2:' . $_POST['postalcode2']) . "'";
   $email     = "'" . strip_tags($_POST['email']) . "'";
   $phone     = strip_tags($_POST['phone']);

   // Database access
   $new_id = createClient($name, $address, $phone, $email);

   createUser($new_id, 0, $username, $password);

   $_SESSION['SUCCESS_MESSAGES'][] = 'A sua conta foi criada com sucesso!';
   header("Location: ../../pages/info.php");
 ?>
