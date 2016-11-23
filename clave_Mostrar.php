<?php
	session_start(); 
	// conector de BD 
	require_once('tools/mypathdb.php');

	// ===============================================Buscar los datos en la tabla tbl_keywords ==================================
	$query = "SELECT * FROM tbl_keywords WHERE grupo=1";
	$resultado=mysql_query($query,$dbConn);
		while($fila=mysql_fetch_array($resultado))	
		{
			$keywords= $fila["keywords"];
			var_dump($keywords);
		}	
	//$data=array("exito" => '1');
	//die(json_encode($data));
?>