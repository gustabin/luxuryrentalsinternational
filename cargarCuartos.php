<?php 
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php'); 
		$queryDetail = ("SELECT villadetail.VillaId, villadetailOLD.quantityroom, villadetailOLD.quantitybath, villadetailOLD.VillaId FROM villadetail, villadetailOLD WHERE villadetail.VillaId=villadetailOLD.VillaId");
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{							
							$VillaIdOLD = $dataDetail['VillaId'];
							$quantityroomOLD = $dataDetail['quantityroom'];											
							$quantitybathOLD = $dataDetail['quantitybath'];
							
							$sql = "UPDATE villadetail SET quantityroom='$quantityroomOLD', quantitybath='$quantitybathOLD'  WHERE VillaId=$VillaIdOLD";
							var_dump($sql);?><br><?php
							//die();
							$resultadoSql=mysql_query($sql,$dbConn);
							mysql_fetch_array($resultadoSql);
							
							}							
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();	
?>