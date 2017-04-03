<?php
	session_start();  
	error_reporting(0);
	//=======Redirigir al login  ===================
	if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) { 	
	$data=array("error" => '1');
		die(json_encode($data));
	}
	// conector de BD 
	require_once('tools/mypathdb.php');    
	
	//$settingRoomId = $_POST ['settingroomId'];
	$villaId = $_POST ['villaId']; //viene oculto
	$season = $_POST ['season'];
	$dateFrom = $_POST ['dateFrom'];		
	$dateTo = $_POST ['dateTo'];
	$quantityRoom = $_POST ['quantityRoom'];
	$type = $_POST ['type'];
	$price = $_POST ['price'];
	$minNights = $_POST ['minNights'];	
		
	$query_price = "INSERT INTO settingprice (villaid, season, seasondatefrom, seasondateto, definedroom, price, pricetype, minimument) 
	VALUES ('".$villaId."','".$season."','".$dateFrom."','".$dateTo."','".$quantityRoom."','".$price."','".$type."','".$minNights."');";	
	//var_dump($query_room);
	$insertarRoom = mysql_query($query_price); 
	
	//=========================================== Redireccion a otra pagina  =====================================
	//Los datos se han insertado correctamente.';		
	$data = array("exito" => '1');
	die(json_encode($data));									
	//desconectar();
	mysql_close();	//cerrar la conexion a la bd	
?>