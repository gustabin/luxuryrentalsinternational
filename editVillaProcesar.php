<?php
	session_start();  
	error_reporting(0);
	
	//var_dump($_REQUEST);
	//die();
	
	//=======Redirigir al login  ===================
	if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) { 	
	$data=array("error" => '1');
		die(json_encode($data));
	}
	// conector de BD 
	require_once('tools/mypathdb.php');    
	
	$villaId = $_POST ['villaId']; //viene oculto
	$villaName = $_POST ['villaName'];
	$type = $_POST ['type'];	
	$description = $_POST ['description'];		
	$description = addslashes($description);		
	$arrivalTime= $_POST['arrivalTime'];	
	$departureTime= $_POST['departureTime'];
	$popular= $_POST['popular'];
	$rating= $_POST['rating'];
	if (empty($rating)){$rating=1;}
	$polices= $_POST['polices'];
	$polices = addslashes($polices);
	$longitud= $_POST['longitud'];
	$latitud = $_POST ['latitud'];
	$video = $_POST ['video'];
	$pricefrom = $_POST ['pricefrom'];
	$priceto= $_POST['priceto'];
	$country = $_POST ['country'];
	$city = $_POST ['city'];
	$quantityroom = $_POST ['quantityroom'];
	$quantitybath = $_POST ['quantitybath'];
	$pathVilla = $_POST ['pathVilla'];
	$swimming = $_POST ['swimming'];
	$season= $_POST['season'];
	$seasondatefrom = $_POST ['seasondatefrom'];
	$seasondateto = $_POST ['seasondateto'];
	$definedroom = $_POST ['definedroom'];		 
	$price = $_POST ['price'];	
	$pricetype = $_POST ['pricetype']; 
	$minimument = $_POST ['minimument']; 		
	$status = $_POST ['activo'];
	//var_dump($status);
	//die();
	$featured= $_POST['featured']; 
	if ($featured==Null) {$featured="0";}
	if ($status==Null) {$status="0";}
	
	// ********* recoger datos del select multiple ***********
	$alsoLike = $_POST ['lstFruits'];
	for ($i=0;$i<count($alsoLike);$i++)    
	{     
	$also= $also . $alsoLike[$i].", ";    
	} 
	

	// ========================= Buscar la propiedad en la tabla villa =======================================================

	$queryVilla = mysql_query("SELECT * FROM villa WHERE VillaId = '$villaId'");	
	$dataVilla = mysql_fetch_array($queryVilla);
	
		//===================== villa =============================
		$LocationId=1;   			//no se usa
		//$Type=1;					//no se usa
		$HowBig=1;					//no se usa
		$MarketingText="1";			//no se usa
		$MarketingTeaser="1";		//no se usa
		$Url="1";					//no se usa
		$Booking="1";				//no se usa
		//$ArrivalTime="3:00 PM";
		//$DepartureTime="10:00 AM";
		$villaguidid="1";			//no se usa
		$locationstr="1";			//no se usa
		//$ranting="1";				//no se usa
		$typestr="1";				//no se usa		
		//$alsolike="1";				//no se usa
		$addressmapdescription="1"; //no se usa
		//$video="1";					//no se usa
		$frienlyurl="1";			//no se usa
		$villaorderid="1";			//no se usa
		//==================== villa detail ====================
		$Address="1";				//no se usa
		$Address2="1";				//no se usa
		//$status="1";				//no se usa
		//$Country="1";				//no se usa
		$RegionState="1";			//no se usa
		$Province="1";				//no se usa
		$ZipCode="1";				//no se usa
		$City="1";					//no se usa
		$Phone="1";					//no se usa
		$area="1";					//no se usa
		$villadetailcol="1";		//no se usa				
		$countrystr="1";			//no se usa
		$addressmapname="1";		//no se usa
		
		
		
		
	if(empty($dataVilla)) // =================== si no la encuentra ============================================
	{
		// ===========================Registrar en la tbl_usuarios ================================================
		
		$query_insertarVilla = "INSERT INTO villa (LocationId, Name, Type, HowBig, MarketingText, Description, MarketingTeaser, Url,
		Booking, ArrivalTime, DepartureTime, villaguidid, locationstr, ranting, pricefrom, priceto, typestr, alsolike, polices, 
		longitud, latitud, addressmapdescription, video, friendlyurl, villaorderid, featured, popular) VALUES (	
		'".$LocationId."', 
		'".$villaName."', 
		'".$type."', 
		'".$HowBig."', 
		'".$MarketingText."', 
		'".$description."', 
		'".$MarketingTeaser."', 
		'".$Url."', 
		'".$Booking."', 
		'".$arrivalTime."', 
		'".$departureTime."', 
		'".$villaguidid."', 
		'".$locationstr."', 
		'".$feature."', 
		'".$rating."', 
		'".$pricefrom."',
		'".$priceto."', 
		'".$typestr."', 
		'".$also."', 
		'".$polices."', 
		'".$longitud."', 
		'".$latitud."', 
		'".$addressmapdescription."', 
		'".$video."', 
		'".$frienlyurl."', 
		'".$villaorderid."',
		'".$featured."',
		'".$popular."');";	
		
		$insertarVilla = mysql_query($query_insertarVilla); 
		$villaId = mysql_insert_id(); //obtener el ultimo VillaId
				
		// ==========================================Introducir los datos en la tabla villadetails ==================================		
		$query_villaDetail = "INSERT INTO villadetail (VillaId, Address, Address2, status, PathVilla, Country, RegionState, Province, 
			ZipCode, City, Phone, area, longitude, latitude, quantityroom, villadetailcol, quantitybath, countrystr, addressmapname, swimming) VALUES ('".$villaId."','".$Address."', '".$Address2."', '".$status."', '".$pathVilla."', '".$country."', '".$RegionState."', '".$Province."', '".$ZipCode."', '".$City."', '".$Phone."', '".$area."', '".$longitud."', '".$latitud."', '".$quantityroom."', '".$villadetailcol."', '".$quantitybath."', '".$countrystr."', '".$addressmapname."', '".$swimming."');";
		
		
		$villaDetail = mysql_query($query_villaDetail); 
		if($insertarVilla == true) 
		{
			// ========================================envio de correo notificandome que un cliente se suscribio ===================
			// ========================================envio de correo al cliente ==================================================			
		}
	}
	
	if(!empty($dataVilla)) // =================== si la encuentra ============================================
	{
		// ===============================================Actualizar los datos en villa=====================================
		$actualizar_villa = mysql_query("UPDATE villa SET Name='$villaName', Type='$type', Description='$description', ArrivalTime='$arrivalTime', DepartureTime='$departureTime', ranting='$rating',
		pricefrom='$pricefrom', priceto='$priceto', alsolike='$also', polices='$polices', longitud='$longitud', latitud='$latitud', video='$video', featured='$featured', popular='$popular'  WHERE VillaId='$villaId'");	
				
		$actualizar_villaDetail = mysql_query("UPDATE villadetail SET Country='$country', quantityroom='$quantityroom',  quantitybath='$quantitybath', City='$city', PathVilla='$pathVilla', swimming='$swimming', status='$status' WHERE VillaId='$villaId'");
		
		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
		$data = array("exito" => '1');
		die(json_encode($data));									
		//desconectar();
		mysql_close();	//cerrar la conexion a la bd
	}		
?>