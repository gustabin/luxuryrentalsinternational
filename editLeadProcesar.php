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
 	
	$Id = $_POST ['Id']; //viene oculto
	$name = $_POST ['name'];
	$phone = $_POST ['phone'];	
	$email = $_POST ['email'];
	$desde= $_POST['desde'];	
	$hasta= $_POST['hasta'];
	$destination= $_POST['destination'];	
	$anythingelse= $_POST['anythingelse'];	
	$size= $_POST['size'];	
	$bedrooms= $_POST['bedrooms'];
	$bathrooms = $_POST ['bathrooms'];
	$amenities = $_POST ['amenities'];
	$photo = $_POST ['photo'];
	$term= $_POST['term'];
	$fecha = $_POST ['fecha'];
	$villaId = $_POST ['villaId'];
	
	// ========================= Buscar la propiedad en la tabla tbl_lead ==================================================
	$queryDetail = ("SELECT * FROM tbl_lead WHERE Id='$Id'");	
	$resultadoDetail=mysql_query($queryDetail,$dbConn);
	while($data_his=mysql_fetch_array($resultadoDetail))
	{
		// ===============================================Actualizar los datos en villa=====================================
		$actualizar_villa = mysql_query("UPDATE tbl_lead SET fullName='$name', phone='$phone', email='$email', desde='$desde', hasta='$hasta', destination='$destination', anythingelse='$anythingelse', size='$size', bedrooms='$bedrooms', bathrooms='$bathrooms', amenities='$amenities', photo='$photo', term='$term', fecha='$fecha', villaId='$villaId'  WHERE Id='$Id'");				
	}		
	//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
?>