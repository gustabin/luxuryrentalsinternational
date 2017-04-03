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
	
	//$settingRoomId = $_POST ['settingroomId'];
	$villaId = $_POST ['villaId']; //viene oculto
	$name = $_POST ['bathroomName'];
	$description = $_POST ['description'];		
	$description = addslashes($description);		
		
	$query_bathroom = "INSERT INTO settingbathroom2 (villaid, name, description) 
	VALUES ('".$villaId."','".$name."','".$description."');";	

	$insertarBathroom = mysql_query($query_bathroom); 
	$id = mysql_insert_id(); //obtener el ultimo VillaId

	//=========================================== Redireccion a otra pagina  =====================================
	//Los datos se han insertado correctamente.';		
	$data = array("exito" => '1');
	die(json_encode($data));									
	//desconectar();
	mysql_close();	//cerrar la conexion a la bd	
?>