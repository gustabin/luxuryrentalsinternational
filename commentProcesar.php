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
	//var_dump($_REQUEST);
	$villaid = $_POST ['villaid'];
	$name = $_POST ['name'];
	$reviewDate = $_POST ['reviewDate'];
	$profileImage = $_POST ['profileImage'];
	$review = $_POST ['review'];
	$rating = $_POST ['rating'];
	$showHide = $_POST ['showHide'];
	if (empty($showHide))	{$showHide='0';}
	$villareviewid = $_POST ['villareviewid'];		
	
	$sql = "UPDATE villareview SET showHide=$showHide WHERE villareviewid=$villareviewid";
	//var_dump($sql);
	//die();
	$resultadoSql=mysql_query($sql,$dbConn);
	mysql_fetch_array($resultadoSql);
	
			
	//=========================================== Redireccion a otra pagina  =====================================
	//Los datos se han actualizado correctamente.';		
	$data = array("exito" => '1');
	die(json_encode($data));									
	//desconectar();
	mysql_close();	//cerrar la conexion a la bd
?>