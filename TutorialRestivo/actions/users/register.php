<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

  if (!isset($_POST['realname'])) die('realname missing');
  if (!isset($_POST['username'])) die('username missing');
  if (!isset($_POST['password'])) die('password missing');
  $realname = $_POST['realname'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  createUser($username, $realname, $password);
  header("Location: $BASE_URL");
?>

