<?php
// Buscar producto 
	session_start();  

	$_SESSION['villaName'] = $_POST['villaNameForm'];
	$data = array("exito" => '1');
	die(json_encode($data));		

?>