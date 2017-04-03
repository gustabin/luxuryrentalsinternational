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
	//var_dump($_REQUEST);
	//die();
	$settingroomId = $_POST ['id']; //viene oculto
	$toilet = $_POST ['toilet'];	
	$tub = $_POST ['tub'];
	$jettedTub = $_POST ['jettedTub'];	
	$outdoorShower = $_POST ['outdoorShower'];	
	$combination = $_POST ['combination'];	
	$shower = $_POST ['shower'];
	$bidet = $_POST ['bidet'];
		
	// ========================= Buscar la room en la tabla settingbathroom =====================================================
	$querybathroom = mysql_query("SELECT * FROM settingbathroom WHERE settingroomId = '$settingroomId'");			
	$databathroom = mysql_fetch_array($querybathroom);	
		
	if(empty($databathroom)) // =================== si no la encuentra ============================================
	{
		// ==========================================Introducir los datos en la tabla settingbathroom ==================================		
		
		//$type="toilet";	
		//$quantity=$toilet;
		$query_bathroom = "INSERT INTO settingbathroom (settingroomId, toilet, tub, jettedTub, outdoorShower, combination, shower, bidet) 
		VALUES ('".$settingroomId."','".$toilet."','".$tub."','".$jettedTub."','".$outdoorShower."','".$combination."','".$shower."','".$bidet."');";		
		//var_dump($query_bathroom);
		$bathroomDetail = mysql_query($query_bathroom); 
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han creado correctamente.';		
		$data = array("exito" => '2');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
	}
	
	if(!empty($databathroom)) // =================== si la encuentra ============================================
	{		
		
		$query_bathroom = "UPDATE settingbathroom SET toilet='$toilet', tub='$tub', jettedTub='$jettedTub', outdoorShower='$outdoorShower',        combination='$combination', shower='$shower', bidet='$bidet' WHERE settingroomId = '$settingroomId'";	
		//var_dump($query_bathroom);	
		$bathroomDetail = mysql_query($query_bathroom); 
		
				
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd		
	}
?>