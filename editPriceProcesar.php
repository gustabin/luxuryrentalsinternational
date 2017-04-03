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
	
	$Id = $_POST ['id']; //viene oculto
	$villaId = $_POST ['villaId']; //viene oculto
	$season = $_POST ['season'];
	$dateFrom = $_POST ['dateFrom'];		
	$dateTo = $_POST ['dateTo'];
	$quantityRoom = $_POST ['quantityRoom'];	
	$price = $_POST ['price'];
	$type = $_POST ['type'];
	$minNights = $_POST ['minNights'];		
	

    // ===============================================Actualizar los datos en settingroom ===========================
		
	$actualizar = mysql_query("UPDATE settingprice SET season='$season', seasondatefrom='$dateFrom', seasondateto='$dateTo', 
	definedroom='$quantityRoom', price='$price', pricetype='$type', minimument='$minNights' WHERE settingpriceid='$Id'");	
	
	//=========================================== Redireccion a otra pagina  ========================+++=============
	//Los datos se han actualizado correctamente.';		
	$data = array("exito" => '1');
	die(json_encode($data));									
	//desconectar();
	mysql_close();	//cerrar la conexion a la bd
?>