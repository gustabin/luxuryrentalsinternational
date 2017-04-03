<?php
session_start(); 
//error_reporting(0);
require_once('tools/mypathdb.php');
	$Id = $_GET ['id'];
	
		$queryDetail = ("SELECT * FROM settingprice WHERE settingpriceid='$Id'");
		$resultadoDetail=mysql_query($queryDetail,$dbConn);				
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{								
							$seasonName 	= $dataDetail['season'];
							$datefrom 		= $dataDetail['seasondatefrom'];	
							$dateto 		= $dataDetail['seasondateto'];
							$quantityroom 	= $dataDetail['definedroom'];		
							$price 			= $dataDetail['price'];
							$type 			= $dataDetail['pricetype'];
							$minnights 		= $dataDetail['minimument'];
							$villaId 		= $dataDetail['villaid'];
							//$Id 			= $dataDetail['settingpriceid'];							
							}									
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		//mysql_close(); //desconectar();

	
   //=========================eliminar registro de la tabla settingroom ============================================
  $query=mysql_query("DELETE from settingprice WHERE settingpriceid='$Id'");
   
  //desconectar();		
	mysql_close();
	header("Location: price.php?id=$villaId");
?>