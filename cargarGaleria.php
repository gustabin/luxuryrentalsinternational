<?php 
session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php'); 
		$queryDetail = ("SELECT imagegallery.VillaId, imagegallery.Country, imagegallery.Country, imagegallery.City, imagegallery.City, villadetail.quantityroom, villadetail.quantitybath, villadetailOLD.quantityroom, villadetailOLD.quantitybath, villadetail.status, villadetail.PathVilla, villadetailOLD.VillaId, villadetailOLD.status, villadetailOLD.PathVilla FROM villadetail, villadetailOLD WHERE villadetail.VillaId=villadetailOLD.VillaId");
		
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
<?php 
/*session_start(); 
error_reporting(0);
require_once('tools/mypathdb.php'); 
		$queryDetail = ("SELECT * FROM imagegalleryOLD WHERE VillaId=259");
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{		
							
							$VillaIdOLD = $dataDetail['VillaId'];							
							$DescriptionOLD = $dataDetail['Description'];											
							$PathOLD = $dataDetail['Path'];
							$DisplayOrderOLD = $dataDetail['DisplayOrder'];
							$IsEnableOLD = $dataDetail['IsEnable'];
							$ImageTypeOLD = $dataDetail['ImageType'];
							$villaguididOLD = $dataDetail['villaguidid'];
							$isthumbnailOLD = $dataDetail['isthumbnail'];
							
							//$sql = "UPDATE imagegallery SET VillaId='$VillaIdOLD', Description='$DescriptionOLD', Path='$PathOLD', DisplayOrder='$DisplayOrderOLD', IsEnable='$IsEnableOLD', ImageType='$ImageTypeOLD', villaguidid='$villaguididOLD', isthumbnail='$isthumbnailOLD'  WHERE VillaId=$VillaIdOLD";
							$sql = "INSERT INTO imagegallery (VillaId, Description, Path, DisplayOrder, IsEnable, ImageType, villaguidid, isthumbnail) VALUES (".$VillaIdOLD.",'".$DescriptionOLD."',  '".$PathOLD."', ".$DisplayOrderOLD.", ".$IsEnableOLD.", ".$ImageTypeOLD.", '".$villaguididOLD."', ".$isthumbnailOLD.");";
							//var_dump($sql);
							//die();	
							var_dump($sql);?><br><?php
							die();
							$resultadoSql=mysql_query($sql,$dbConn);
							mysql_fetch_array($resultadoSql);
							
							}							
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();*/
	
?>