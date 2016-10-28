<?php
  if (!$_POST['username'] || !$_POST['email'] || !$_POST['password']) {
     $_SESSION['error_messages'][] = 'Por favor, preencha todos os campos.';
     $_SESSION['form_values'] = $_POST;
     header("Location: $BASE_URL" . 'pages/users/register.php');
     exit;
   }
 ?>
