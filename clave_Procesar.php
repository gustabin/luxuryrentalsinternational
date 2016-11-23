<?php
	session_start(); 
	// conector de BD 
	require_once('tools/mypathdb.php');
	$clave = $_POST ['clave'];
	
	//====================== transformar clave =======================================
	$minuscula = strtolower($clave);
	$minLlave = "[" .$minuscula. "]";
	$minComilla = '"'. $minuscula  . '"';
	$mayuscula = strtoupper($clave);
	$mayLlave = "[" .$mayuscula. "]";
	$mayComilla = '"' . $mayuscula . '"';
	
	$keywords= "$minuscula <br /> $minLlave <br /> $minComilla <br /> $mayuscula <br /> $mayLlave <br /> $mayComilla <br />";
	
	// ===============================================Grabar los datos ===============================================================
	// ===============================================Introducir los datos en la tabla tbl_keywords ==================================
	$query = "INSERT INTO tbl_keywords (keywords) VALUES ('".$keywords."')";
	
	$insertar = mysql_query($query); 	
	$Id = mysql_insert_id(); //obtener id
	
	if($insertar == false) 
	{
		$data=array("error" => '1');
		die(json_encode($data));
	}
	
	$data=array("exito" => '1');
	die(json_encode($data));
?>