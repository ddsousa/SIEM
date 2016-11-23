<?php
  session_set_cookie_params(3600, '/SIEM/TutorialRestivo/');
	session_start();

  $BASE_DIR = dirname(__DIR__).'/';
  $BASE_URL = 'http://192.168.33.10/SIEM/TutorialRestivo/';
	
	include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');

  $conn = new PDO('pgsql:host=db.fe.up.pt;dbname=siem1636', 'siem1636', 'siempr16');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$stmt = $conn->prepare("SET SCHEMA 'tutorialRestivo';");
	$stmt->execute();

	$smarty = new Smarty;
  $smarty->assign('BASE_URL', $BASE_URL);
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';

	$smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
  $smarty->assign('FORM_VALUES', $_SESSION['form_values']);
	$smarty->assign('USERNAME', $_SESSION['username']);
	$smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);

  unset($_SESSION['error_messages']);
	unset($_SESSION['success_messages']);
  unset($_SESSION['form_values']);
?>
