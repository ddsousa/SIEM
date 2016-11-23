<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/users.php');  

	if (!$_POST['username'] || !$_POST['realname'] || !$_POST['password']) {
		$_SESSION['error_messages'][] = 'All fields are mandatory';
		$_SESSION['form_values'] = $_POST;
		header("Location: $BASE_URL" . 'pages/users/register.php');
		exit;
	}

  $realname = strip_tags($_POST['realname']);
  $username = strip_tags($_POST['username']);
  $password = strip_tags($_POST['password']);

  //createUser($username, $realname, $password);
	try {
		createUser($realname, $username, $password);
	} catch (PDOException $e) {
		//$_SESSION['error_messages'][] = 'Error creating user ' . $e->getMessage();
		if (strpos($e->getMessage(), 'users_pkey') !== false)
			$_SESSION['error_messages'][] = 'Duplicate username';
		else $_SESSION['error_messages'][] = 'Error creating user';
		$_SESSION['form_values'] = $_POST;
		header("Location: $BASE_URL" . 'pages/users/register.php');
		exit;
	}

	$_SESSION['success_messages'][] = 'User registered successfully';  
  header("Location: $BASE_URL");

  
?>

