<?php
	// No gnomo para dar erros
		//error_reporting(-1);
		//ini_set('display_errors','On');
	$BASE_DIR = dirname(__DIR__).'/';
	$BASE_URL = "http://192.168.33.10/SIEM/TrabalhoPHP-2/";

	include_once($BASE_DIR."database/init_db.php");
	include_once($BASE_DIR."lib/smarty/Smarty.class.php");

	$smarty = new Smarty;
	$smarty->assign('BASE_URL', $BASE_URL);
	$smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
?>
