<?php 
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php'); 
		$queryDetail = ("SELECT villadetail.VillaId, villadetail.Country, villadetailOLD.Country, villadetail.City, villadetailOLD.City, villadetail.quantityroom, villadetail.quantitybath, villadetailOLD.quantityroom, villadetailOLD.quantitybath, villadetail.status, villadetail.PathVilla, villadetailOLD.VillaId, villadetailOLD.status, villadetailOLD.PathVilla FROM villadetail, villadetailOLD WHERE villadetail.VillaId=villadetailOLD.VillaId");
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{							
							$VillaIdOLD = $dataDetail['VillaId'];
							$CityOLD = $dataDetail['City'];											
							$CountryOLD = $dataDetail['Country'];
							
							$sql = "UPDATE villadetail SET City='$CityOLD', Country='$CountryOLD'  WHERE VillaId=$VillaIdOLD";
							var_dump($sql);?><br><?php
							//die();
							$resultadoSql=mysql_query($sql,$dbConn);
							mysql_fetch_array($resultadoSql);
							
							}							
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
	
?>