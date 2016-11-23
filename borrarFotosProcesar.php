<?php 
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php'); 
		$villaId= $_GET["villaId"];	
		$desdeId= $_GET["desdeId"];	
		$queryDetail = ("DELETE FROM imagegallery WHERE VillaId= $villaId AND ImageGalleryId >= $desdeId");
		//echo $queryDetail;
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		mysql_fetch_array($resultadoDetail);
												
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
		Echo "Ready to go at the papaya";	
		
?>