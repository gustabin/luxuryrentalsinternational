<?php
	session_start();
	require_once('tools/mypathdb.php');
	$email = $_POST ['Email'];
	$_SESSION["email"]=$email;
	// ==========================Buscar el password del cliente=====================================
	$query = mysql_query("SELECT * FROM staff WHERE email = '$email'"); 	
	$dataUsuario = mysql_fetch_array($query);	
	
	$clave = $dataUsuario['clave']; 
	$nombre = $dataUsuario['name']; 
	$apellido = $dataUsuario['lastname'];  
		
		
	if(empty($dataUsuario))
		{
		$data=array("error" => '1');
		die(json_encode($data));
		}
	else
		{		
		//Consegui el registro		
		// ==================envio de correo con el password ===================
		$destino = $email;
		
		$asunto = "Retrieve Password Luxury Rentals International";
		$cabeceras = "Content-type: text/html"; 
		$cuerpo ="<h1>In Luxury Rentals International we help you!</h1><br><br>
				Hello <b>".$nombre." ".$apellido."</b>,<br><br> 				
				We have recovered your password: <strong> &nbsp;" 	.$clave."</strong><br><br>				
				Remember to login </a>  With your email account: <b> $email </b><br><br>
				Your friends in LRI<br>
				<img src=http://www.luxuryrentalsinternational.com/img/password.jpg /><br>
				<a href=http://www.luxuryrentalsinternational.com><img src=http://www.luxuryrentalsinternational.com/img/logo.png /></a>
				<p></p>	<p></p>
				<hr>
				© Luxury Rentals International 2016 - All rights reserved<br></h5>
				</p>";

		$yourWebsite = "luxuryrentalsinternational.com";				
		$yourEmail   = "info@luxuryrentalsinternational.com";
		$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		//mail($destino,$asunto,$cuerpo,$cabeceras);	
		}
		//desconectar();
		mysql_close();
		$data=array("exito" => '1');
		die(json_encode($data));		
?>