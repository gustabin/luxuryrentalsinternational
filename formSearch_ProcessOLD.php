<?php
	session_start();  
	$countryForm = $_POST ['estados'];
	
	
	if (empty($countryForm))
		{
			$data=array("error" => '1');
			die(json_encode($data));
		}
	switch ($countryForm) {
			case 0:
				$country = "";
				break;
			case 1:
				$country = "Puerto Rico";
				break;
			case 2:
				$country = "Dominican Republic";
				break;
			case 3:
				$country = "St. Barts";
				break;
			case 4:
				$country = "Costa Rica";
				break;
		}
	$_SESSION['country'] = $country;
	$_SESSION['city'] = $_POST ['ciudades']; 
	$_SESSION['bedrooms'] = $_POST ['bedrooms'];
	$_SESSION['bathrooms'] = $_POST ['bathrooms'];
	
	
	
	$data = array("exito" => '1');
	die(json_encode($data));		
?>
