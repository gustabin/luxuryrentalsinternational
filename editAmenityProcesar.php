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
	
	$amenitieId = $_POST ['amenitieId']; //viene oculto
	$category = $_POST ['category'];	
	$description = $_POST ['description'];		
	$description = addslashes($description);		
	

	// ========================= Buscar la propiedad en la tabla villa =====================================================
	$queryAmenitie = mysql_query("SELECT * FROM amenitie WHERE amenitieid = '$amenitieId'");	
	$dataAmenitie = mysql_fetch_array($queryAmenitie);
	
		
	if(empty($dataAmenitie)) // =================== si no la encuentra ============================================
	{
		$query_insertarAmenitie = "INSERT INTO amenitie (description, category) VALUES ('".$description."', '".$category."');";	
		$insertarAmenitie = mysql_query($query_insertarAmenitie); 
	}
	
	if(!empty($dataAmenitie)) // =================== si la encuentra ============================================
	{
		$actualizarAmenitie = mysql_query("UPDATE amenitie SET description='$description', category='$category' WHERE amenitieid='$amenitieId'");	
	}
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
?>