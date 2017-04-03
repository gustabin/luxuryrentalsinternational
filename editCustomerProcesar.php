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
	$name = $_POST ['name'];	
	$lastname = $_POST ['lastname'];	
	$username = $_POST ['username'];	
	$email = $_POST ['email'];	
	$phone = $_POST ['phone'];	
	$address = $_POST ['address'];	
	$city = $_POST ['city'];	
	$state = $_POST ['state'];	
	$country = $_POST ['country'];	
	
	$adult = $_POST ['adult'];	
	$children = $_POST ['children'];	
	$age1 = $_POST ['age1'];	
	$age2 = $_POST ['age2'];	
	$age3 = $_POST ['age3'];	
	$age4 = $_POST ['age4'];	
	
	
	
		// ===============================================Actualizar los datos en staff =====================================
		
		$actualizar_staff = mysql_query("UPDATE staff SET name='$name', lastname='$lastname', username='$username', email='$email', phone='$phone',        address='$address', city='$city', state='$state', country='$country',  adult='$adult', children='$children', age1='$age1', age2='$age2', age3='$age3', age4='$age4' WHERE staffid='$Id'");	
		
		
		//die("UPDATE staff SET name='$name', lastname='$lastname', username='$username', email='$email', phone='$phone',        address='$address', city='$city', state='$state', country='$country', clave='$clave', usuario='$usuario', fecha='$fecha', adult='$adult', children='$children', age1='$age1', age2='$age2', age3='$age3', age4='$age4' WHERE staffid='$Id'");	
		
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
	//}		
?>