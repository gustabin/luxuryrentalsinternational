<?php 
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php'); 
		$villaId= $_GET["id"];			
		$queryDetail = ("DELETE FROM imagegallery WHERE VillaId= $villaId AND Path = 'banner.jpg' OR Path = 'thumbnail.jpg'");
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		mysql_fetch_array($resultadoDetail);
												
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
		//=======Redirigir al listado  ===================	
		header("Location: editVilla.php?id=$villaId");	
?>