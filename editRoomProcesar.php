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
	
	$Id = $_POST ['id']; //viene oculto
	$name = $_POST ['roomName'];	
	$description = $_POST ['description'];		
	$description = addslashes($description);		
	
	
				
		// ==========================================Introducir los datos en la tabla settingprice ==================================		
	//	$query_room = "INSERT INTO settingroom (settingroomId, villaid, name, description) VALUES ('".$settingroomId."','".$villaId."','".$name."', '".$description."');";
		
		//$roomDetail = mysql_query($query_room); 
		
	
	//if(!empty($dataVilla)) // =================== si la encuentra ============================================
	//{
		// ===============================================Actualizar los datos en settingroom =====================================
		
		$actualizar_room = mysql_query("UPDATE settingroom SET name='$name', description='$description' WHERE id='$Id'");	
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
	//}		
?>