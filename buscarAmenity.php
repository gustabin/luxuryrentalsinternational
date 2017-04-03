<?php
	session_start();  

	$_SESSION['amenity'] = $_POST['nombre'];

	$data = array("exito" => '1');
	die(json_encode($data));		
?>