<?php
  include_once("../../config/init.php");
  include_once($BASE_DIR.'config/user_only.php');
  include_once($BASE_DIR.'database/clients.php');
  include_once($BASE_DIR.'database/users.php');

  if(!$_GET['id'] || !$_POST['name'] || !$_POST['address_name'] | !$_POST['zc1'] || !$_POST['zc2'] || !$_POST['email'] || !$_POST['phone']) {
    $_SESSION['error_messages'][]	= 'Campos do utilizador em falta';
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
  }

  $id        = $_GET['id'];
  $name      = strip_tags($_POST['name']);
  $address2  = strip_tags($_POST['address_name']);
  $zipcode1  = strip_tags($_POST['zc1']);
  $zipcode2  = strip_tags($_POST['zc2']);
  $address   = "addressname=".urlencode($address2).'&zc1='.urlencode($zipcode1)."&zc2=".urlencode($zipcode2);
  $email     = strip_tags($_POST['email']);
  $phone     = strip_tags($_POST['phone']);
  if($_SESSION['permissions'] == 0) {
    if(!$_POST['username'] ||  !$_POST['password']) {
      $_SESSION['error_messages'][]	= 'Campos do utilizador em falta';
      header('Location: ' . $_SERVER['HTTP_REFERER']);
      exit;
    }
    $username  = strip_tags($_POST['username']);
    $password  = strip_tags($_POST['password']);
    editUserDetails($id, $username, $password);
    $_SESSION['username'] = $username;
  }
    editClientDetails($id, $name, $address, $email, $phone);

  $_SESSION['success_messages'][] = 'Dados do utilizador editados com sucesso';
  header('Location: ' . $BASE_URL);
  exit;
?>
