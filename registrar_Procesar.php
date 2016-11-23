<?php
	session_start(); 
	// conector de BD 
	require_once('tools/mypathdb.php');
	$fullName = $_POST ['fullName'];
	$phone = strtolower ($_POST ['phone']);
	$email = $_POST ['inputEmail'];
	$desde = $_POST ['desde'];
	$hasta = $_POST ['hasta'];
	$destination = $_POST ['destination'];
	$anythingelse = $_POST ['anythingelse'];
	$size = $_POST ['size'];
	$bedrooms = $_POST ['bedrooms'];
	$bathrooms = $_POST ['bathrooms'];
	$amenities = $_POST ['amenities'];		
	$photo = $_POST ['photo'];
	$term = $_POST ['term'];	
	$villaId = $_POST ['villaId'];	
	$fecha= date("Y-m-d H:i:s"); 
	
	//======================validar que el phone tenga mas de 6 caracteres=======================================
	if (strlen($phone)<6) 
	{
		//===================================================Redirigir a otra pagina============================================
		$data=array("error" => '1');
		die(json_encode($data));
	} 

	// ===============================================Grabar los datos ===============================================================
	// ===============================================Introducir los datos en la tabla tbl_lead ==================================
	$query = "INSERT INTO tbl_lead (fullName, phone, email, desde, hasta, destination, anythingelse, size, bedrooms, bathrooms, amenities, photo, term, fecha, villaId) VALUES ('".$fullName."','".$phone."',  '".$email."', '".$desde."', '".$hasta."', '".$destination."', '".$anythingelse."', '".$size."', '".$bedrooms."', '".$bathrooms."', '".$amenities."', '".$photo."', '".$term."', '".$fecha."', '".$villaId."');";
	
	$insertar = mysql_query($query); 
	
	$Id = mysql_insert_id(); //obtener id
	
	

	if($insertar == false) 
	{
		$data=array("error" => '1');
		die(json_encode($data));
	}
	
	else
	{
		//Los datos se han insertado correctamente.
		//========asignar valor a variable de session ==============
		$_SESSION['fullName']=$fullName;
		$_SESSION['phone']=$phone;
		$_SESSION['email']=$email;
		$_SESSION['desde']=$desde;
		$_SESSION['hasta']=$hasta;
		$_SESSION['destination']=$destination;
		$_SESSION['anythingelse']=$anythingelse;
		$_SESSION['Id']=$Id;
		//desconectar();
		mysql_close();
		
	
		// ========================================envio de correo notificandome que alguien completo el formulario ===================
		
		$destino ="info@luxuryrentalsinternational.com";
		$asunto = "Contact Web Luxury Rentals International";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Hello, a user has registered on Luxury Rentals International’s website!</h2>
		The received information is as follows:<br>		
		<b>Name: </b>$fullName<br>
		<b>Phone: </b>$phone<br>
		<b>Email: </b>$email<br>
		Speculated Travel Dates<br>
		<b>Arriving: </b>$desde<br>
		<b>Departing: </b>$hasta<br>
		<b>Destination: </b>$destination<br>
		<b>Anything else: </b>$anythingelse<br>
		<b>Villa: </b>$villaId<br>
		<br><br>
  	    LRI Team<br>
		<img src=http://www.luxuryrentalsinternational.com/go/img/lri.png />
		<p>		
		<img src=http://www.luxuryrentalsinternational.com/go/img/developer.gif />
		<br> 
		<p></p>Designed by <br>
		© Copyright 2016 © LUXURY RENTALS INTERNATIONAL - All rights reserved<br></h5>
		</p>";
		
		$yourWebsite = "luxuryrentalsinternational.com";
		$yourEmail   = "info@luxuryrentalsinternational.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		//mail($destino,$asunto,$cuerpo,$cabeceras);	
		
		
		// ========================================envio de correo al customer ===================
		$destino = $email;
		$asunto = "Welcome to LUXURY RENTALS INTERNATIONAL";
		$cabeceras = "Content-type: text/html";
		$cuerpo ="<h2>Dear Customer,</h2><br>
        Thank you for contacting Luxury Rentals International. <br>
		Thank you for choosing us as your prefered agency to complete your luxurious vacation rental. <br><br>
		We’ve received your info and one of our agent will get in touch soon. <br>
		While you wait, why not be social?<br><br>
		<a href=https://www.facebook.com/Luxuryrentals1><img src=http://www.luxuryrentalsinternational.com/go/img/facebook.jpg width=155 height=43 /></a>  		
		<br>With regards,<br>
		The Luxury Rentals International Team<br>
		<a href=https://www.luxuryrentalsinternational.com><img src=http://www.luxuryrentalsinternational.com/go/img/lri.png /></a> 
		<br> 
		<p></p>Designed by <br>
		© Copyright 2016 © LUXURY RENTALS INTERNATIONAL - All rights reserved<br></h5>
		</p>";
		$yourWebsite = "luxuryrentalsinternational.com";
		$yourEmail   = "info@luxuryrentalsinternational.com";
	    $cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
		//mail($destino,$asunto,$cuerpo,$cabeceras);
				
		$data=array("exito" => '1');
		die(json_encode($data));
		//===================================================Redirigir a otra pagina============================================				
		//header("Location: contact.php");	
	}	
?>
