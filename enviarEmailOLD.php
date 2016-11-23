<?php
	session_start(); 
	// conector de BD 
	require_once('tools/mypathdb.php');
	$Id = $_GET ['Id'];
	$Page = $_GET ['Page'];
	
	// ===============================================Buscar los datos en la tabla tbl_lead ==================================
	$mysql = ("SELECT * FROM tbl_lead WHERE Id=$Id");
	
	$resultado=mysql_query($mysql,$dbConn);
	$fila=mysql_fetch_array($resultado);
	if (!empty($fila)) 
		{
			$fullName= $fila["fullName"];
			$phone= $fila["phone"];
			$email= $fila["email"];
			$desde= $fila["desde"];
			$hasta= $fila["hasta"];
			$destination= $fila["destination"];
			$anythingelse= $fila["anythingelse"];
			$size = $fila['size'];
			$bedrooms = $fila['bedrooms'];
			$bathrooms = $fila['bathrooms'];		
			$photo = $fila['photo'];
			$term = $fila['term'];
		
			// ========================================envio de correo notificandome que alguien completo el formulario ===================		
			if (($Page==index) or ($Page==contact))
			{			
				$destino ="luxuryrentalsinternational@gmail.com";
				//$destino ="info@luxuryrentalsinternational.com.test-google-a.com";
				//$destino ="contacto@tabin.com.ve";
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
				<b>Anything else: </b>$anythingelse<br><br><br>
				LRI Team<br>
				<img src=http://www.luxuryrentalsinternational.com/go/img/lri.png />
				<p>						
				<br> 
				<p></p>Designed by <br>
				© Copyright 2016 © LUXURY RENTALS INTERNATIONAL - All rights reserved<br></h5>
				</p>";				
				
				$yourWebsite = "luxuryrentalsinternational.com";				
				$yourEmail   = "info@luxuryrentalsinternational.com";
				//z$yourEmail   = "info@luxuryrentalsinternational.com.test-google-a.com";
				//$yourEmail   = "contacto@tabin.com.ve";
				$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;				
				mail($destino,$asunto,$cuerpo,$cabeceras);	
			}
			
			// ========================================envio de correo notificandome que alguien completo el formulario Homeowners =================
			if ($Page==homeowners) 
			{					
				//$destino ="info@luxuryrentalsinternational.com";
				//$destino ="info@luxuryrentalsinternational.com.test-google-a.com";
				//$destino ="gustabin@yahoo.com";
				$destino ="luxuryrentalsinternational@gmail.com";
				$asunto = "Contact Web Luxury Rentals International";
				$cabeceras = "Content-type: text/html";
				$cuerpo ="<h2>Hello, a user has registered on Luxury Rentals International’s website!</h2>
				The received information is as follows:<br>		
				<b>Name: </b>$fullName<br>
				<b>Phone: </b>$phone<br>
				<b>Email: </b>$email<br>
				Speculated Travel Dates<br>
				<b>Destination: </b>$destination<br>
				<b>Anything else: </b>$anythingelse<br>
				<b>Size: </b>$size<br>
				<b>Bedrooms: </b>$bedrooms<br>
				<b>Bathrooms: </b>$bathrooms<br>
				<b>Photo: </b>$photo<br>
				<b>Term: </b>$term<br>
				<br><br>
				LRI Team<br>
				<img src=http://www.luxuryrentalsinternational.com/go/img/lri.png />		
				<br> 
				<p></p>Designed by <br>
				© Copyright 2016 © LUXURY RENTALS INTERNATIONAL - All rights reserved<br></h5>
				</p>";
						
				$yourWebsite = "luxuryrentalsinternational.com";
				$yourEmail   = "info@luxuryrentalsinternational.com";
				//$yourEmail   = "info@luxuryrentalsinternational.com.test-google-a.com";
				$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
				mail($destino,$asunto,$cuerpo,$cabeceras);	
			}
		
			// ========================================envio de correo al customer ===================
			$destino = $email;
			$asunto = "Welcome to LUXURY RENTALS INTERNATIONAL";
			$cabeceras = "Content-type: text/html";
			$cuerpo ="<h2>Dear Customer,</h2><br>
			Thank you for contacting Luxury Rentals International. <br>
			Thank you for choosing us as your prefered agency to complete your luxurious vacation rental. <br><br>
			We’ve received your info and one of our agent will get in touch soon. <br>
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
			//$yourEmail   = "info@luxuryrentalsinternational.com.test-google-a.com";
			$cabeceras = "From: $yourWebsite <$yourEmail>\n" . "Content-type: text/html" ;
			mail($destino,$asunto,$cuerpo,$cabeceras);			
		}
		
		//===================================================Redirigir a otra pagina============================================	
		if ($Page==index) {
			header("Location: http://www.luxuryrentalsinternational.com/go/index.php");
			}	
		if ($Page==homeowners) {			
		header("Location: http://www.luxuryrentalsinternational.com/go/homeowners.php");	
			}
		if ($Page==contact) {			
		header("Location: http://www.luxuryrentalsinternational.com/go/contact.php");	
			}
		if ($Page==villa) {					
		header("Location: http://www.luxuryrentalsinternational.com/go/villa.php?villaId=$villaId");
			}
?>