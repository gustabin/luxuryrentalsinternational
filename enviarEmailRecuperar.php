<?php
	require_once('tools/mypathdb.php');
	$email = $_GET ['email'];

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
				<br>
				While you wait, why not be social?<br><br>
				<a href=https://www.facebook.com/Luxuryrentals1>
				<img src=http://www.luxuryrentalsinternational.com/go/img/facebook.jpg width=155 height=43 /></a>  		
				<br>With regards,<br>
				The Luxury Rentals International Team<br>
				<a href=http://www.luxuryrentalsinternational.com><img src=http://www.luxuryrentalsinternational.com/go/img/lri.png /></a> 
				<br> 
				<p></p>Designed by <br>
				© Copyright 2016 © LUXURY RENTALS INTERNATIONAL - All rights reserved<br></h5>
				</p>";

		$yourWebsite = "luxuryrentalsinternational.com";				
		$yourEmail   = "info@luxuryrentalsinternational.com";
		$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		mail($destino,$asunto,$cuerpo,$cabeceras);	
		}
		//desconectar();
		mysql_close();
		//===================================================Redirigir a otra pagina============================================	
		header("Location: http://www.luxuryrentalsinternational.com/backend/recuperar.php");		
?>