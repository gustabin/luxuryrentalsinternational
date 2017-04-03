<?php
	session_start();  
	error_reporting(1);
	
	// conector de BD 
	require_once('tools/mypathdb.php');    
	
	
	// ===================== Buscar los datos en settinbedroom ==============================================
	$queryDetail = ("SELECT * FROM settinbedroom");	
	
	
	$resultadoDetail=mysql_query($queryDetail,$dbConn);
	while($dataDetail=mysql_fetch_array($resultadoDetail))
		{			
			$Id=$dataDetail['settinbedgroomid'];
			$type=$dataDetail['type'];
			$quantity=$dataDetail['quantity'];	
	
			switch ($type) {
			case "KING":
				$query_room = "UPDATE settinbedroom SET king='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "King":
				$query_room = "UPDATE settinbedroom SET king='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "QUEEN":
				$query_room = "UPDATE settinbedroom SET queen='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "TWIN":
				$query_room = "UPDATE settinbedroom SET twin='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "FULL":
				$query_room = "UPDATE settinbedroom SET full='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "ROLLAWAYS":
				$query_room = "UPDATE settinbedroom SET rollaways='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "BUNK":
				$query_room = "UPDATE settinbedroom SET bunk='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "DAYBED":
				$query_room = "UPDATE settinbedroom SET daybed='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "TRUNDLES":
				$query_room = "UPDATE settinbedroom SET trundles='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "Trundles":
				$query_room = "UPDATE settinbedroom SET trundles='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "PULL":
				$query_room = "UPDATE settinbedroom SET pull='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;
			case "Pull Out Sofa":
				$query_room = "UPDATE settinbedroom SET pull='$quantity' WHERE settinbedgroomid = '$Id'";	
				break;	
									
			}
			
			$roomDetail = mysql_query($query_room); 
		}		
	mysql_free_result($resultadoDetail); // Liberamos los registros		
	mysql_close();	//cerrar la conexion a la bd

		
		echo ("******** listo! **********");
?>