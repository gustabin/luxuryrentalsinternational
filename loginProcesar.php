<?php
	session_start(); 
	error_reporting(0);
	$pagina=$_SESSION['pagina'];
	require_once('tools/mypathdb.php');
	$username = strtolower($_POST ['username']);
	$clave = $_POST ['password'];

	$query = mysql_query("SELECT * FROM staff WHERE username = '$username' AND clave = '$clave'"); 	
	$dataUsuario = mysql_fetch_array($query);	
	
	if(!empty($dataUsuario))
	{
	$usuario = $dataUsuario['usuario']; 
	$userID = $dataUsuario['staffid']; 
	$email = $dataUsuario['email']; 
	$nombre = $dataUsuario['name']; 
	$apellido = $dataUsuario['lastname']; 
	// ********** guardar en variables de sesion ******************
	$_SESSION['user_id'] = $userID;
	$_SESSION['correo'] = $email;
	$_SESSION['nombre'] = $nombre;
	$_SESSION['apellido'] = $apellido;	
	$_SESSION['usuario'] = $usuario; // ********* 1=operador; 2=administrador; 3=manager **************
	}	
	
	if(empty($dataUsuario))
		{		
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else
	{
		mysql_close();
		
		if ($pagina=='editVilla') {
			$data=array("exito" => '2'); // ingresar editvilla
			die(json_encode($data));
		}
		if ($pagina=='villaAdd') {
			$data=array("exito" => '3'); // ingresar villaAdd
			die(json_encode($data));
		}
		if ($pagina=='amenities') {
			$data=array("exito" => '4'); // ingresar amenities
			die(json_encode($data));
		}
		if ($pagina=='room') {
			$data=array("exito" => '5'); // ingresar room
			die(json_encode($data));
		}
		if ($pagina=='imagesOrder') {
			$data=array("exito" => '6'); // ingresar imagesOrder
			die(json_encode($data));
		}
		if ($pagina=='editLead') {
			$data=array("exito" => '7'); // ingresar editLead
			die(json_encode($data));
		}
		if ($pagina=='review') {
			$data=array("exito" => '8'); // ingresar review
			die(json_encode($data));
		}
		if ($pagina=='price') {
			$data=array("exito" => '9'); // ingresar price
			die(json_encode($data));
		}
		if ($pagina=='editCustomer') {
			$data=array("exito" => '10'); // ingresar customer
			die(json_encode($data));
		}
		
		$data=array("exito" => '1'); // ingresar
		die(json_encode($data));
	}
?>