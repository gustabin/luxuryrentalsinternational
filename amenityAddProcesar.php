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
	
	//$amenitiId = $_POST ['amenitiId']; //viene oculto	
	$description = $_POST ['description'];		
	$description = addslashes($description);	
	$category = $_POST ['category'];	
	
		$query_insertarAmenity = "INSERT INTO amenitie (description, category) 
		VALUES ('".$description."', '".$category."');";	
		
		$insertarAmenity = mysql_query($query_insertarAmenity); 
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han insertado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd	
?>