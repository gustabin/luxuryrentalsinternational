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
	$name = $_POST ['bathroomName'];	
	$description = $_POST ['description'];		
	$description = addslashes($description);		
	
	
		// ===============================================Actualizar los datos en settingbathroom2 =====================================
		
		$actualizar_room = mysql_query("UPDATE settingbathroom2 SET name='$name', description='$description' WHERE id='$Id'");	
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
	//}		
?>