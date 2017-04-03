<?php
	date_default_timezone_set("America/La_Paz");	
	session_start();  
	error_reporting(0);
	// conector de BD 
	require_once('tools/mypathdb.php');

	//$direccion= utf8_decode($_POST['Direccion']);
	$username = $_POST ['username'];
	$usuario = 1; // ********* 1=operador; 2=administrador; 3=manager **************
	$clave = $_POST ['clave'];
	$clave2 = $_POST ['clave2'];
	$nombre = $_POST ['Nombres'];
	$apellido = $_POST ['Apellidos'];
	$email = $_POST ['Email'];
	$email2 = $_POST ['Email2'];
	
	
		//=====================validar que las claves sean iguales========================================		
		if ($clave<>$clave2){			
			$data = array("error" => '2');
			die(json_encode($data));
		}
		//======================validar que el password tenga mas de 6 caracteres=======================================
		if (strlen($clave)<6) {
			$data=array("error" => '3');
			die(json_encode($data)); 
			} 
		//======================validar que los email sean iguales ================================================
		if ($email<>$email2){			
			$data = array("error" => '4');
			die(json_encode($data));
		}	
	
			// ====================== Insertar los datos en la tabla ===============================
			//$fecha_actual = date("Y-m-d");
			$fecha_actual= date("Y-m-d H:i:s"); 
			
			$query_insertarUsuario = mysql_query("INSERT INTO staff (name, lastname, username, email, clave, usuario, fecha) VALUES ('$nombre', '$apellido', '$username', '$email', '$clave', '$usuario', '".$fecha_actual."')");	
			
			$user_id = mysql_insert_id();
			//$_SESSION['us_id']=$user_id;	
			
			if($query_insertarUsuario == false) 
				{
					$data=array("error" => '6');
					die(json_encode($data));
				}		
			
		
			//Los datos se han insertado correctamente.';	
			
			$data = array("exito" => '1');
			die(json_encode($data));									
			//desconectar();
			mysql_close();	//cerrar la conexion a la bd
?>