<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR."database/users.php");

  if(!isset($_POST['name']))     die('Falta de Nome');
  if(!isset($_POST['address']))  die('Falta de Morada');
  if(!isset($_POST['zipcode1'])) die('Falta do campo 1 do código postal');
  if(!isset($_POST['zipcode2'])) die('Falta do campo 2 do código postal');
  if(!isset($_POST['email']))    die('Falta de Email');
  if(!isset($_POST['phone']))    die('Falta de número de telefone');
  if(!isset($_POST['username'])) die('Falta de Username');
  if(!isset($_POST['password'])) die('Falta de Password');

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
