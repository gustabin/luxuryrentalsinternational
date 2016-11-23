<?php 
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php'); 
		$queryDetail = ("SELECT villadetail.VillaId, villadetail.status, villadetailOLD.status FROM villadetail, villadetailOLD WHERE villadetail.VillaId=villadetailOLD.VillaId");
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{							
							$VillaIdOLD = $dataDetail['VillaId'];
							$statusOLD = $dataDetail['status'];											
							
							
							$sql = "UPDATE villadetail SET status='$statusOLD' WHERE VillaId=$VillaIdOLD";
							var_dump($sql);?><br><?php
							//die();
							$resultadoSql=mysql_query($sql,$dbConn);
							mysql_fetch_array($resultadoSql);
							
							}							
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
	
?>