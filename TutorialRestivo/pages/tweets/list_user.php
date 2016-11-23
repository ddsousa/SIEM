<?php
  include_once('../../config/init.php');
  include_once($BASE_DIR .'database/tweets.php');

	if (!$_GET['username']) {
		$_SESSION['error_messages'][] = 'Undefined username';
		header("Location: $BASE_URL");
  	exit;
	}

  $username = $_GET['username'];

  $tweets = getUserTweets($username);  

  $smarty->assign('tweets', $tweets);
	$smarty->display('common/header.tpl');
  $smarty->display('tweets/list.tpl');
	$smarty->display('common/footer.tpl');
	if(isset($_SESSION['error_messages'])) {
		$smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
		unset($_SESSION['error_messages']);
	}
?>
