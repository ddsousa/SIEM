<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR."database/users.php");

  if(!$_POST['name'] || !$_POST['address'] || !$_POST['zipcode1'] || !$_POST['zipcode2'] || !$_POST['email'] || !$_POST['phone'] || !$_POST['username'] || !$_POST['password']) {
      $_SESSION['error_messages'][] = 'Campos em falta';
      $_SESSION['form_values'] = $_POST;
      header("Location: $BASE_URL".'pages/users/register.php');
      exit;
    }


  $name      = strip_tags($_POST['name']);
  $address2  = strip_tags($_POST['address']);
  $zipcode1  = strip_tags($_POST['zipcode1']);
  $zipcode2  = strip_tags($_POST['zipcode2']);
  $address   = "'".urlencode($address2).'&zc1='.urlencode($zipcode1)."&zc2=".urlencode($zipcode2)."'";
  $email     = strip_tags($_POST['email']);
  $phone     = strip_tags($_POST['phone']);
  $username  = strip_tags($_POST['username']);
  $password  = strip_tags($_POST['password']);

  createClient($name, $address, $phone, $email);
  createUser(0, $username, $password);
  header("Location: $BASE_URL");
?>
