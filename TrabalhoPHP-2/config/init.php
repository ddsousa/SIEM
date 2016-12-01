<?php
	// No gnomo para dar erros
		//error_reporting(-1);
		//ini_set('display_errors','On');
	session_set_cookie_params(3600, '/SIEM/TrabalhoPHP-2/'); // TODO - mudar quando passar para paginas
	session_start();

	$BASE_DIR = dirname(__DIR__).'/';
	include_once($BASE_DIR."config/base_url.php"); // TODO - mudar isto

	include_once($BASE_DIR."database/init_db.php");
	include_once($BASE_DIR."lib/smarty/Smarty.class.php");

	$smarty = new Smarty;
	$smarty->assign('BASE_URL', $BASE_URL);
	$smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';

	if(isset($_SESSION['error_messages'])) {
	  $smarty->assign('ERROR_MESSAGES', $_SESSION['error_messages']);
		unset($_SESSION['error_messages']);
	}
	if(isset($_SESSION['success_messages'])) {
		$smarty->assign('SUCCESS_MESSAGES', $_SESSION['success_messages']);
		unset($_SESSION['success_messages']);
	}
	if(isset($_SESSION['form_values'])) {
		$smarty->assign('FORM_VALUES', $_SESSION['form_values']);
		unset($_SESSION['form_values']);
	}
	if(isset($_SESSION['username'])) {
		$smarty->assign('USERNAME', $_SESSION['username']);
	}
	if(isset($_SESSION['active_page'])) {
		$smarty->assign('active_page', $_SESSION['active_page']);
	}
	if(isset($_SESSION['type'])) {
		$smarty->assign('type', $_SESSION['type']);
	}
?>
