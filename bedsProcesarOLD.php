<?php
	session_start();  
	error_reporting(0);
	//=======Redirigir al login  ===================
	if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) { 	
	$data=array("error" => '1');
		die(json_encode($data));
	}
	// conector de BD 
	require_once('tools/mypathdb.php');    
	
	$settingroomId = $_POST ['id']; //viene oculto
	$king = $_POST ['king'];	
	$queen = $_POST ['queen'];
	$twin = $_POST ['twin'];
	$full = $_POST ['full'];	
	$rollaways = $_POST ['rollaways'];	
	$bunk = $_POST ['bunk'];
	$daybed = $_POST ['daybed'];
	$trundles = $_POST ['trundles'];	
	$pull = $_POST ['pull'];	
	//$allowguest = '1';
		// $allowguest = preguntar porque no se esta usando;
		
		
	// ========================= Buscar la room en la tabla settinbedroom =====================================================
	$querybedroom = mysql_query("SELECT * FROM settinbedroom WHERE settingroomId = '$settingroomId'");		
	$databedroom = mysql_fetch_array($querybedroom);
	
		
	if(empty($databedroom)) // =================== si no la encuentra ============================================
	{
		// ==========================================Introducir los datos en la tabla settinbedroom ==================================		
		if (!empty($king)){
		$type="King";	
		$quantity=$king;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 		
		}
		if (empty($king)){
		$type="King";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($queen)){
		$type="QUEEN";	
		$quantity=$queen;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($queen)){
		$type="QUEEN";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($twin)){
		$type="TWIN";	
		$quantity=$twin;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($twin)){
		$type="TWIN";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($full)){
		$type="FULL";	
		$quantity=$full;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($full)){
		$type="FULL";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($rollaways)){
		$type="ROLLAWAYS";	
		$quantity=$rollaways;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($rollaways)){
		$type="ROLLAWAYS";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($bunk)){
		$type="BUNK";	
		$quantity=$bunk;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($bunk)){
		$type="BUNK";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($daybed)){
		$type="DAYBED";	
		$quantity=$daybed;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($daybed)){
		$type="DAYBED";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($trundles)){
		$type="Trundles";	
		$quantity=$trundles;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}	
		if (empty($trundles)){
		$type="Trundles";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($pull)){
		$type="Pull Out Sofa";	
		$quantity=$pull;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($pull)){
		$type="Pull Out Sofa";	
		$quantity=0;
		$query_room = "INSERT INTO settinbedroom (settingroomId, type, quantity) 
		VALUES ('".$settingroomId."','".$type."','".$quantity."');";		
		$roomDetail = mysql_query($query_room); 
		}
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han creado correctamente.';		
		$data = array("exito" => '2');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
	}
	
	if(!empty($databedroom)) // =================== si la encuentra ============================================
	{
		if (!empty($king)){
		$type="King";					
		$quantity=$king;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($king)){
		$type="King";					
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($queen)){
		$type="QUEEN";	
		$quantity=$queen;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";	
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($queen)){
		$type="QUEEN";	
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";	
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($twin)){
		$type="TWIN";	
		$quantity=$twin;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($twin)){
		$type="TWIN";	
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($full)){
		$type="FULL";	
		$quantity=$full;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($full)){
		$type="FULL";	
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($rollaways)){
		$type="ROLLAWAYS";	
		$quantity=$rollaways;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";		
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($rollaways)){
		$type="ROLLAWAYS";	
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";		
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($bunk)){
		$type="BUNK";	
		$quantity=$bunk;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($bunk)){
		$type="BUNK";	
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($daybed)){
		$type="DAYBED";	
		$quantity=$daybed;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($daybed)){
		$type="DAYBED";	
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($trundles)){
		$type="Trundles";	
		$quantity=$trundles;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($trundles)){
		$type="Trundles";	
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		
		if (!empty($pull)){
		$type="Pull Out Sofa";	
		$quantity=$pull;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}
		if (empty($pull)){
		$type="Pull Out Sofa";	
		$quantity=0;
		$query_room = "UPDATE settinbedroom SET quantity='$quantity' 
		WHERE settingroomId = '$settingroomId' AND type='$type'";			
		$roomDetail = mysql_query($query_room); 
		}

		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd		
	}
?>