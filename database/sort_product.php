<?php
	if(!empty($_GET['sort_by'])) {
		echo "quero ordenar por: ".$_GET['sort_by'].'<br>';
	}
	if(!empty($_GET['type'])) {
		echo "tipo: ".$_GET['type'].'<br>';
	}
?>