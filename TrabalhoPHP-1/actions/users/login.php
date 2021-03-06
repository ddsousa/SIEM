<?php
  include_once('../../common/init.php');
  include_once ($BASE_DIR . "/database/user.php");

  // Data verification
  if (!$_POST['username'] || !$_POST['password']) {
    $_SESSION['ERROR_MESSAGES'][] = 'Por favor, preencha todos os campos.';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
   }

   // Extract data
   $username  = strip_tags($_POST['username']);
   $password  = strip_tags($_POST['password']);

   // Database access
   $login_result = isLoginCorrect($username, $password);

   echo "login:" . $login_result;

   if($login_result == 1) {
     $_SESSION['SUCCESS_MESSAGES'][] = 'Efectou login com sucesso!';
     $_SESSION['USERNAME'] = $username;
     $_SESSION['PERMISSIONS'] = 0;

   } else if($login_result == 2) {
     $_SESSION['SUCCESS_MESSAGES'][] = 'Efectou login com sucesso!';
     $_SESSION['USERNAME'] = $username;
     $_SESSION['PERMISSIONS'] = 1;

   } else {
     $_SESSION['ERROR_MESSAGES'][] = 'Login errado.';

   }

   //header('Location: ' . $_SERVER['HTTP_REFERER']);
   header("Location: ../../pages/common/home.php?menu=Inicio");
   exit;

 ?>
