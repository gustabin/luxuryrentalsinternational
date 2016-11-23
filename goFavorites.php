<?php
date_default_timezone_set('America/Caracas');
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php');
$fecha_actual = date("Y-m-d");
$fecha = $fecha_actual;
$VillaId = $_GET['VillaId'];
$email = $_SESSION['email'];	

//*********************Buscar si ya existe esa villa en la tabla temporal ***************************
	$query =  mysql_query("SELECT * FROM tbl_temporal WHERE email='".$email."' AND VillaId = '".$VillaId."'");	
	$dataTemporal = mysql_fetch_array($query);		
		if(!empty($dataTemporal)) {
			$sql = mysql_query("DELETE FROM tbl_temporal WHERE email='".$email."' AND VillaId = '".$VillaId."'");
						
			header("Location: vacation.php");
			die();
		}
//*********************Si existe el email insertar otra villa en la tabla temporal *************************    
		
		if (!empty($email)) {
			$query = mysql_query("INSERT INTO tbl_temporal (email, VillaId, fecha) VALUES ('".$email."','".$VillaId."',  '".$fecha."');");
			$dataTemporal = mysql_fetch_array($query);			  						
		}
		  
//*********************** Si no existe el email se crea uno aleatorio y se inserta la villa en la tabla temporal ******************
		if (empty($email)) {
			$email= rand(); //generar email
			$_SESSION['email'] = $email;		  
			$query = mysql_query("INSERT INTO tbl_temporal (email, VillaId, fecha) VALUES ('".$email."','".$VillaId."',  '".$fecha."');");	  
			$dataTemporal = mysql_fetch_array($query);		
		}	
	mysql_close(); //desconectar();
	header("Location: vacation.php");
	die();
?>