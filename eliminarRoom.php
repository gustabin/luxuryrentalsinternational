<?php
session_start(); 
//error_reporting(0);
require_once('tools/mypathdb.php');
	$Id = $_GET ['id'];
	
		$queryDetail = ("SELECT * FROM settingroom WHERE id='$Id'");
		$resultadoDetail=mysql_query($queryDetail,$dbConn);				
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{								
							$name = $dataDetail['name'];
							$description = $dataDetail['description'];
							$settingroomId = $dataDetail['settingroomId'];	
							$villaId = $dataDetail['villaid'];						
							}									
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		//mysql_close(); //desconectar();

	
   //=========================eliminar registro de la tabla settingroom ============================================
   $query=mysql_query("DELETE from settingroom WHERE id='$Id'");
   
   //=========================eliminar registro de la tabla settinbedroom ============================================
   $query=mysql_query("DELETE from settinbedroom WHERE settingroomId='$Id'");
   
	//desconectar();		
	mysql_close();
	header("Location: room.php?id=$villaId");
?>