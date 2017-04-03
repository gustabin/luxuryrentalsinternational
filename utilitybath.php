<?php
	session_start();  
	error_reporting(1);
	
	// conector de BD 
	require_once('tools/mypathdb.php');    
	
	
	// ===================== Buscar los datos en settinbathroom ==============================================
	$queryDetail = ("SELECT * FROM settingbathroom");	
	
	
	$resultadoDetail=mysql_query($queryDetail,$dbConn);
	while($dataDetail=mysql_fetch_array($resultadoDetail))
		{			
			$Id=$dataDetail['settingbathroomid'];
			$type=$dataDetail['type'];
			$quantity=$dataDetail['quantity'];	
			
			switch ($type) {
			case "toilet":
				$query_bathroom = "UPDATE settingbathroom SET toilet='$quantity' WHERE settingbathroomid = '$Id'";	
				break;			
			case "tub":
				$query_bathroom = "UPDATE settingbathroom SET tub='$quantity' WHERE settingbathroomid = '$Id'";	
				break;
			case "jetted tub":
				$query_bathroom = "UPDATE settingbathroom SET jettedTub='$quantity' WHERE settingbathroomid = '$Id'";	
				break;
			case "outdoor shower":
				$query_bathroom = "UPDATE settingbathroom SET outdoorShower='$quantity' WHERE settingbathroomid = '$Id'";	
				break;
			case "combination tub/shower":
				$query_bathroom = "UPDATE settingbathroom SET combination='$quantity' WHERE settingbathroomid = '$Id'";	
				break;
			case "shower":
				$query_bathroom = "UPDATE settingbathroom SET shower='$quantity' WHERE settingbathroomid = '$Id'";	
				break;
			case "bidet":
				$query_bathroom = "UPDATE settingbathroom SET bidet='$quantity' WHERE settingbathroomid = '$Id'";	
				break;
			}
			
			//echo $query_bathroom;
			$bathroomDetail = mysql_query($query_bathroom); 
		}		
	mysql_free_result($resultadoDetail); // Liberamos los registros		
	mysql_close();	//cerrar la conexion a la bd

		
		echo ("******** listo! **********");
?>