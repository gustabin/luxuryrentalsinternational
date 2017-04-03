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
	//var_dump($querybedroom);	
	$databedroom = mysql_fetch_array($querybedroom);
	
		
	if(empty($databedroom)) // =================== si no la encuentra ============================================
	{
		// ==========================================Introducir los datos en la tabla settinbedroom ==================================		
		
		$query_room = "INSERT INTO settinbedroom (settingroomId, king, queen, twin, full, rollaways, bunk, daybed, trundles, pull) 
		VALUES ('".$settingroomId."','".$king."','".$queen."','".$twin."','".$full."','".$roolaways."','".$bunk."','".$daybed."','".$trundles."','".$pull."');";		
		//var_dump($query_room);	
		$roomDetail = mysql_query($query_room); 		
		
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han creado correctamente.';		
		$data = array("exito" => '2');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
	}
	
	if(!empty($databedroom)) // =================== si la encuentra ============================================
	{		
		$type="King";					
		$quantity=$king;
		$query_room = "UPDATE settinbedroom SET king='$king', queen='$queen', twin='$twin', full='$full', rollaways='$rollaways', bunk='$bunk',  daybed='$daybed', trundles='$trundles', pull='$pull' WHERE settingroomId = '$settingroomId'";		
		//var_dump($query_room);	
		$roomDetail = mysql_query($query_room); 
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd		
	}
?>