<?php
  $BASE_DIR = dirname(__DIR__).'/';
  $BASE_URL = 'http://192.168.33.10/SIEM/TutorialRestivo/';

	include_once($BASE_DIR . 'lib/smarty/Smarty.class.php');

  $conn = new PDO('pgsql:host=db.fe.up.pt;dbname=siem1636', 'siem1636', 'siempr16');
  $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	$smarty = new Smarty;
  $smarty->assign('BASE_URL', $BASE_URL);
  $smarty->template_dir = $BASE_DIR . 'templates/';
  $smarty->compile_dir = $BASE_DIR . 'templates_c/';
?>
