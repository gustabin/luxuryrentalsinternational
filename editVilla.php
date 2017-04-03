<?php 
session_start();
error_reporting(0);
$_SESSION['valor'] = 2; //Activa la opcion del menu actual
require_once('tools/mypathdb.php');
$_SESSION['nombreRoom']="";

$villaId=$_GET["id"];
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='editVilla';  
$_SESSION['villaId']=$villaId;  
include "header.php";
?> 
  <!--script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script!-->

<style>
.material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
</style>



<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Villas of Luxury Rentals International");
	});
</script>


<script type="text/javascript">
	$(function () {
		$('#lstFruits').multiselect({
			includeSelectAllOption: true
		});
		
		$('#btnSelected').click(function () {
			var selected = $("#lstFruits option:selected");
			var message = "";
			selected.each(function () {
				message += $(this).text() + "  -VillaId: " + $(this).val() + "\n";
			});
			alert(message);
		});
	});
</script>
      
<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formVilla', function(event) {
		event.preventDefault()
		if ($('#formVilla').valid()) {
			$.ajax({
				type: "POST",
				url: "editVillaProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 1000);
						window.location.href='login.php'; 
					}
					if (respuesta.error == 2) {
						$('#error2').show();
						setTimeout(function() {
						$('#error2').hide();
						}, 1000);
					}					
					if (respuesta.exito == 1) {
						document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';						
					}					
				}
			});
		}
	});	
</script> 

<script type="text/javascript">
$(function() {    
    $('#fechaNacimiento').datepicker({
						   changeYear: true,
                            minDate: new Date(1914, 1 - 1, 1),
                            maxDate: 'D',							
                            dateFormat: 'yy-mm-dd',
                            defaultDate: new Date(1980, 1 - 1, 1),
                            changeMonth: true,
                            changeYear: true,
                            //yearRange: '-110:-18'
							yearRange: '1914:2015',
        onSelect: function(selectedDate) {
            var dataString = 'date='+selectedDate;
            $.ajax({
                type: "POST",
                url: "calcularEdad.php",
                data: dataString,
                success: function(data) {
					$('#edad').val(data);
                }
            });
        }

    });
});
</script>




<!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 75px; padding-bottom: 10px;">
    <div class="container">
      <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Villa
        <small>Features</small>                
      </h2>
      <a href='propertylist.php'>
      	<button type="button" class="btn-main"><i class="fa fa-reply" aria-hidden="true"></i> Back to list </button>
      </a>
      <a href='amenities.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-check-square-o" aria-hidden="true"></i> Amenities </button>
      </a>
      <a href='room.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-home" aria-hidden="true"></i> Setting room </button>
      </a>     
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
      <a href='bathroom.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i style="font-size:14px" class="fa">&#xf2cd;</i> Setting bathroom </button>
      </a>
      <a href='images.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-file-image-o" aria-hidden="true"></i> Upload images </button>
      </a>
      <a href='imagesOrder.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i> Order images </button>
      </a>
       <a href='price.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-tags" aria-hidden="true"></i> Setting Price </button>
      </a> 
      
      <!--ul class="breadcrumb">
        <li><span id="titulo"></span></li>
      </ul!-->
    </div>
  </section>


 <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter" style="padding-top: 0px; background:#f5f5f5">
    <div class="container">
      <div class="row">
        <div id="contenido">  
       <div class="col-md-12">
    <?php
		//$villaId= $_GET["villaId"];
		$queryDetail = ("SELECT * FROM villa WHERE VillaId='$villaId'");	
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{
							$villaName = $dataDetail['Name'];
							$_SESSION['villaName']=$villaName;  
							$type = $dataDetail['Type'];
							$description = $dataDetail['Description'];
							$polices = $dataDetail['polices'];
							$alsoLike = $dataDetail['alsolike'];
							$longitud = $dataDetail['longitud'];
							$latitud = $dataDetail['latitud'];
							$video = $dataDetail['video'];
							$rating = $dataDetail['ranting'];
							$pricefrom = $dataDetail['pricefrom'];
							$priceto = $dataDetail['priceto'];
							$villaId = $dataDetail['VillaId'];							
							$arrivalTime = $dataDetail['ArrivalTime'];
							$departureTime = $dataDetail['DepartureTime'];
							$howBig = $dataDetail['HowBig'];
							$marketingText = $dataDetail['MarketingText'];
							$url = $dataDetail['Url'];	
							$featured = $dataDetail['featured'];
							$popular = $dataDetail['popular'];
							}		
		mysql_free_result($resultadoDetail); // Liberamos los registros							
		mysql_close(); //desconectar();
	?>
    <?php		
		$queryDetail = ("SELECT * FROM villadetail WHERE VillaId='$villaId'");	
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{							
							$quantityroom = $dataDetail['quantityroom'];				
							$quantitybath = $dataDetail['quantitybath'];							
							$city = $dataDetail['City'];
							$pathVilla = $dataDetail['PathVilla'];
							$address = $dataDetail['Address'];
							$address2 = $dataDetail['Address2'];
							$country = $dataDetail['Country'];
							$regionState = $dataDetail['RegionState'];
							$province = $dataDetail['Province'];
							$zipCode = $dataDetail['ZipCode'];
							$swimming = $dataDetail['swimming'];							
							$activo = $dataDetail['status'];
							$_SESSION['pathVilla']=$pathVilla;  
							}		
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();		
	?>
    <?php				
		$queryDetail = ("SELECT * FROM settingprice WHERE VillaId='$villaId'");
		$resultadoDetail=mysql_query($queryDetail,$dbConn);				
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{								
							$season = $dataDetail['season'];
							$seasondatefrom = $dataDetail['seasondatefrom'];
							$seasondateto = $dataDetail['seasondateto'];
							$definedroom = $dataDetail['definedroom'];
							$price = $dataDetail['price'];
							$pricetype = $dataDetail['pricetype'];
							$minimument = $dataDetail['minimument'];	
							}									
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
	?>
  	<form class="form-vertical" id="formVilla" action="">    
		
        
  <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <legend>Villa Name:</legend>
                        </h3>
                        <div class="control-group-inline" style="padding-top: 10px;">	
                            <input type="hidden" name="villaId" id="villaId" value="<?php echo $villaId ?>">         			
                           <input name="villaName" type="text" class="span4 required" id="villaName"  maxlength="100" placeholder="villa Name" style="width: 97%;" value="<?php echo $villaName ?>">
                        </div>
                    </div>
                    <div class="panel-body">
                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>        
        
        
  <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
                    	<legend>Description:</legend>						
					</h3>
                    <div class="control-group" style="padding-top: 10px;">	 
                        <textarea name="description" type="text" class="span4 required" id="description"  maxlength="4000" placeholder="description" style="width: 97%;" cols="45" rows="5"><?php echo $description ?></textarea>
                    </div>
				</div>	
                <div class="panel-body">
					
				</div>			
				<div class="panel-heading">
                	<h3 class="panel-title">						
                        <legend>Polices:</legend>
					</h3>
					<div class="control-group" style="padding-top: 10px;">	 
                        <textarea name="polices" type="text" class="span4" id="polices"  maxlength="4000" placeholder="polices" style="width: 97%;" cols="45" rows="15"> <?php echo $polices ?></textarea>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>

     
        

<a name="MapAddress"></a>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<legend>Set Address:</legend>
					</h3>  
                    Address <input name="address" type="text" class="span4" id="address"  maxlength="60" placeholder="address" style="width: 20%;" value="<?php echo $address ?> &nbsp; <?php echo $address2 ?>">
                   		
                   &nbsp; &nbsp;
                    Location    
                     <?php if ($country == "Puerto Rico") {$PR="selected"; } ?>
                     <?php if ($country == "Dominican Republic") {$DR="selected"; }   ?>
                    
                    <select name="country" id="country">
                      <option value="Puerto Rico" <?php echo $PR ?>>Puerto Rico</option>
                      <option value="Dominican Republic" <?php echo $DR ?>>Dominican Republic</option>
                    </select>    
                                               
                    <!--input name="country" type="text" class="span4" id="country"  maxlength="50" placeholder="country" style="width: 10%;" value="<?php //echo $country ?>"!-->
                    
                    &nbsp; &nbsp;
                     Region / State <input name="regionState" type="text" class="span4" id="regionState"  maxlength="50" placeholder="region / state" style="width: 10%;" value="<?php echo $regionState ?>">
                     &nbsp; &nbsp;
                     City  <input name="city" type="text" class="span4" id="city"  maxlength="60" placeholder="city" style="width: 15%;" value="<?php echo $city ?>">
                    Zip code <input name="zipCode" type="text" class="span4" id="zipCode"  maxlength="5" placeholder="zip Code" style="width: 10%;" value="<?php echo $zipCode ?>">
				</div>
				<div class="panel-body">
					
				</div>
			</div>
		</div>
	</div>
</div>    

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('Cannot determine address at this location.');
    }
  });
}

function updateMarkerStatus(str) {
  document.getElementById('markerStatus').innerHTML = str;
}

function updateMarkerPosition(latLng) {                
  //document.getElementById('info').innerHTML = [
    //latLng.lat(),
    //latLng.lng()
  //].join(', '); 
  $('#latitud').val(latLng.lat());
  $('#longitud').val(latLng.lng());
  
  document.getElementById('longitud').innerHTML = [
    latLng.lng()
  ];
}

function updateMarkerAddress(str) {
  document.getElementById('address').innerHTML = str;
}

function initialize() {
  var latLng = new google.maps.LatLng(<?php echo $latitud ?>, <?php echo $longitud ?>);
  var map = new google.maps.Map(document.getElementById('mapCanvas'), {
    zoom: 14,
    center: latLng,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  var marker = new google.maps.Marker({
    position: latLng,
    title: 'Point A',
    map: map,
    draggable: true
  });

  // Update current position info.
  updateMarkerPosition(latLng);
  geocodePosition(latLng);

  // Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });

  google.maps.event.addListener(marker, 'drag', function() {
    updateMarkerStatus('Dragging...');
    updateMarkerPosition(marker.getPosition());
  });

  google.maps.event.addListener(marker, 'dragend', function() {
    updateMarkerStatus('Drag ended');	
    geocodePosition(marker.getPosition());
  });
}

// Onload handler to fire off the app.
google.maps.event.addDomListener(window, 'load', initialize);
</script>
<style>
  #mapCanvas {
    width: 500px;
    height: 400px;
    float: left;
  }
  #infoPanel {
    float: left;
    margin-left: 10px;
  }
  #infoPanel div {
    margin-bottom: 5px;
  }
  </style>
  <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">						
                         <legend>Map Address:</legend>
					</h3>
                     <div class="control-group-inline" style="padding-top: 10px;">	  
                       Latitude  
                        <input name="latitud" type="text"  class="span4" id="latitud"  value="<?php echo $latitud ?>"  style="width: 20%;" 
             placeholder="latitud" maxlength="20">
                        &nbsp; &nbsp;
		              Longitude 
                          <input name="longitud" type="text" class="span4" id="longitud" value="<?php echo $longitud ?>" style="width: 20%;" placeholder="longitud" maxlength="20"> 
                    </div>  
				</div>
                
       <?php if(!empty($latitud)) {?>         
	 <div class="panel-body">      				
     	<legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;"> Area Map</p></legend> 
  		<div id="mapCanvas"></div>
  		<div id="infoPanel">
            <!--b>Marker status:</b!-->
            <div id="markerStatus"><i>Click and drag the marker.</i></div>
            <!--b>Current position:</b!-->
            <div id="info"></div>    
            <div id="longitud"></div>    
    	</div>
	</div>
     <?php } ?>         
            
            
            
		</div>
	</div>
</div>    

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<legend>Rooms & Bathrooms:</legend>
					</h3>
                    <div class="control-group-inline" style="padding-top: 10px;">	 
	  		Quantity room <input name="quantityroom" type="text" class="span4 required" id="quantityroom"  maxlength="3" placeholder="quantityroom" style="width: 10%;" value="<?php echo $quantityroom ?>">
            &nbsp; &nbsp;
            Quantity bathroom <input name="quantitybath" type="text" class="span4 required" id="quantitybath"  maxlength="4" placeholder="quantitybath" style="width: 10%;" value="<?php echo $quantitybath ?>">                     
		</div>	
				</div>
				<div class="panel-body">
					
				</div>
				<div class="panel-heading">
					<h3 class="panel-title">	
                    	<legend>Price by Night:</legend>
                    </h3>
					<div class="control-group-inline" style="padding-top: 10px;">	 
                        Price from <input name="pricefrom" type="text" class="span4 required" id="pricefrom"  maxlength="5" placeholder="price from" style="width: 10%;" value="<?php echo $pricefrom ?>">
                        &nbsp; &nbsp;
                        Price to <input name="priceto" type="text" class="span4 required" id="priceto"  maxlength="5" placeholder="price to" style="width: 10%;" value="<?php echo $priceto ?>">        	
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
        
 <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">						
                        <legend>Others:</legend>
					</h3>
                    <div class="control-group-inline" style="padding-top: 10px;">		  		
                        Path villa <input name="pathVilla" type="text" class="span4" id="pathVilla"  maxlength="100" placeholder="pathVilla" style="width: 30%;" value="<?php echo $pathVilla ?>">            
                      	&nbsp;	&nbsp;
                         <?php
                   if ($popular == 0) {
                        $popularSi = checked;
                   }
                   if ($popular == 1) {
                        $popularNo = checked;
                   }		   
                   ?>
                <input type="radio" name="popular" id="popular" value="0" class="required" <?php echo $popularSi ?>>
                No feature inside
                 &nbsp; &nbsp;  
                <input type="radio" name="popular" id="popular" value="1" class="required" <?php echo $popularNo ?>>
                Feature inside
                        &nbsp; &nbsp;  
                         &nbsp; &nbsp;  
                                               
                        <?php if ($rating == "1") {$uno="selected"; } ?>
                        <?php if ($rating == "2") {$dos="selected"; } ?>
                        <?php if ($rating == "3") {$tres="selected"; } ?>
                        <?php if ($rating == "4") {$cuatro="selected"; } ?>
                        <?php if ($rating == "5") {$cinco="selected"; } ?>
                        Ratings 
                         <select name="rating" id="rating">                              
                              <option value="1" <?php echo $uno ?>>1</option>
                              <option value="2" <?php echo $dos ?>>2</option>
                              <option value="3" <?php echo $tres ?>>3</option>
                              <option value="4" <?php echo $cuatro ?>>4</option>
                              <option value="5" <?php echo $cinco ?>>5</option>
                         </select>
                    </div>
				</div>
				<div class="panel-body">
					
				</div>
				<div class="panel-heading">
					<div class="control-group-inline" style="padding-top: 10px;">	 
	  		Swimming Pool 
            <?php
			   if ($swimming == 1) {
					$swimmingSi = checked;
			   }
			   if ($swimming == 0) {
					$swimmingNo = checked;
			   }		   
			   ?>
		    <input type="radio" name="swimming" id="swimming" value="1" class="required" <?php echo $swimmingSi ?>>
            Yes
            <input type="radio" name="swimming" id="swimming" value="0" class="required" <?php echo $swimmingNo ?>>
            No
                            		  
            &nbsp; &nbsp;             
            <?php if ($type == "1") {$villa="selected"; } ?>
            <?php if ($type == "2") {$apartment="selected"; } ?>
            <?php if ($type == "3") {$house="selected"; } ?>
            <?php if ($type == "4") {$hotel="selected"; } ?>                      
            Type <select name="type" id="type">
                      <option value="1" <?php echo $villa ?>>Villa</option>
                      <option value="2" <?php echo $apartment ?>>Apartment</option>
                      <option value="3" <?php echo $house ?>>House</option>
                      <option value="4" <?php echo $hotel ?>>Hotel</option>
                 </select>  
            &nbsp; &nbsp;
            
            How Big  <input name="howBig" type="text" class="span4" id="howBig"  maxlength="10" placeholder="how big" style="width: 10%;" value="<?php echo $howBig ?>">
            &nbsp; &nbsp;
							
            Arrival Time 
            <?php if ($arrivalTime == "1:00 AM") {$am1="selected"; } ?>
            <?php if ($arrivalTime == "2:00 AM") {$am2="selected"; } ?>
            <?php if ($arrivalTime == "3:00 AM") {$am3="selected"; } ?>
            <?php if ($arrivalTime == "4:00 AM") {$am4="selected"; } ?>
            <?php if ($arrivalTime == "5:00 AM") {$am5="selected"; } ?>
            <?php if ($arrivalTime == "6:00 AM") {$am6="selected"; } ?>
            <?php if ($arrivalTime == "7:00 AM") {$am7="selected"; } ?>
            <?php if ($arrivalTime == "8:00 AM") {$am8="selected"; } ?>
            <?php if ($arrivalTime == "9:00 AM") {$am9="selected"; } ?>
            <?php if ($arrivalTime == "10:00 AM") {$am10="selected"; } ?>
            <?php if ($arrivalTime == "11:00 AM") {$am11="selected"; } ?>
            <?php if ($arrivalTime == "12:00 M") {$m12="selected"; } ?>
            <?php if ($arrivalTime == "1:00 PM") {$pm1="selected"; } ?>
            <?php if ($arrivalTime == "2:00 PM") {$pm2="selected"; } ?>
            <?php if ($arrivalTime == "3:00 PM") {$pm3="selected"; } ?>
            <?php if ($arrivalTime == "4:00 PM") {$pm4="selected"; } ?>
            <?php if ($arrivalTime == "5:00 PM") {$pm5="selected"; } ?>
            <?php if ($arrivalTime == "6:00 PM") {$pm6="selected"; } ?>
            <?php if ($arrivalTime == "7:00 PM") {$pm7="selected"; } ?>
            <?php if ($arrivalTime == "8:00 PM") {$pm8="selected"; } ?>
            <?php if ($arrivalTime == "9:00 PM") {$pm9="selected"; } ?>
            <?php if ($arrivalTime == "10:00 PM") {$pm10="selected"; } ?>
            <?php if ($arrivalTime == "11:00 PM") {$pm11="selected"; } ?>
            <?php if ($arrivalTime == "12:00 AM") {$am12="selected"; } ?>
            <select id="arrivalTime" name="arrivalTime">             
              <option value="1:00 AM" <?php echo $am1 ?>>1:00 AM</option>
              <option value="2:00 AM" <?php echo $am2 ?>>2:00 AM</option>
              <option value="3:00 AM" <?php echo $am3 ?>>3:00 AM</option>
              <option value="4:00 AM" <?php echo $am4 ?>>4:00 AM</option>
              <option value="5:00 AM" <?php echo $am5 ?>>5:00 AM</option>
              <option value="6:00 AM" <?php echo $am6 ?>>6:00 AM</option>
              <option value="7:00 AM" <?php echo $am7 ?>>7:00 AM</option>
              <option value="8:00 AM" <?php echo $am8 ?>>8:00 AM</option>
              <option value="9:00 AM" <?php echo $am9 ?>>9:00 AM</option>
              <option value="10:00 AM" <?php echo $am10 ?>>10:00 AM</option>
              <option value="11:00 AM" <?php echo $am11 ?>>11:00 AM</option>
              <option value="12:00 M" <?php echo $m12 ?>>12:00 M</option>
              <option value="1:00 PM" <?php echo $pm1 ?>>1:00 PM</option>
              <option value="2:00 PM" <?php echo $pm2 ?>>2:00 PM</option>
              <option value="3:00 PM" <?php echo $pm3 ?>>3:00 PM</option>
              <option value="4:00 PM" <?php echo $pm4 ?>>4:00 PM</option>
              <option value="5:00 PM" <?php echo $pm5 ?>>5:00 PM</option>
              <option value="6:00 PM" <?php echo $pm6 ?>>6:00 PM</option>
              <option value="7:00 PM" <?php echo $pm7 ?>>7:00 PM</option>
              <option value="8:00 PM" <?php echo $pm8 ?>>8:00 PM</option>
              <option value="9:00 PM" <?php echo $pm9 ?>>9:00 PM</option>
              <option value="10:00 PM" <?php echo $pm10 ?>>10:00 PM</option>
              <option value="11:00 PM" <?php echo $pm11 ?>>11:00 PM</option>
              <option value="12:00 AM" <?php echo $am12 ?>>12:00 AM</option>
            </select>
            
             &nbsp; &nbsp;
            Departure Time 
            <?php if ($departureTime == "1:00 AM") {$dam1="selected"; } ?>
            <?php if ($departureTime == "2:00 AM") {$dam2="selected"; } ?>
            <?php if ($departureTime == "3:00 AM") {$dam3="selected"; } ?>
            <?php if ($departureTime == "4:00 AM") {$dam4="selected"; } ?>
            <?php if ($departureTime == "5:00 AM") {$dam5="selected"; } ?>
            <?php if ($departureTime == "6:00 AM") {$dam6="selected"; } ?>
            <?php if ($departureTime == "7:00 AM") {$dam7="selected"; } ?>
            <?php if ($departureTime == "8:00 AM") {$dam8="selected"; } ?>
            <?php if ($departureTime == "9:00 AM") {$dam9="selected"; } ?>
            <?php if ($departureTime == "10:00 AM") {$dam10="selected"; } ?>
            <?php if ($departureTime == "11:00 AM") {$dam11="selected"; } ?>
            <?php if ($departureTime == "12:00 M") {$dm12="selected"; } ?>
            <?php if ($departureTime == "1:00 PM") {$dpm1="selected"; } ?>
            <?php if ($departureTime == "2:00 PM") {$dpm2="selected"; } ?>
            <?php if ($departureTime == "3:00 PM") {$dpm3="selected"; } ?>
            <?php if ($departureTime == "4:00 PM") {$dpm4="selected"; } ?>
            <?php if ($departureTime == "5:00 PM") {$dpm5="selected"; } ?>
            <?php if ($departureTime == "6:00 PM") {$dpm6="selected"; } ?>
            <?php if ($departureTime == "7:00 PM") {$dpm7="selected"; } ?>
            <?php if ($departureTime == "8:00 PM") {$dpm8="selected"; } ?>
            <?php if ($departureTime == "9:00 PM") {$dpm9="selected"; } ?>
            <?php if ($departureTime == "10:00 PM") {$dpm10="selected"; } ?>
            <?php if ($departureTime == "11:00 PM") {$dpm11="selected"; } ?>
            <?php if ($departureTime == "12:00 AM") {$dam12="selected"; } ?>
            <select id="departureTime" name="departureTime">             
              <option value="1:00 AM" <?php echo $dam1 ?>>1:00 AM</option>
              <option value="2:00 AM" <?php echo $dam2 ?>>2:00 AM</option>
              <option value="3:00 AM" <?php echo $dam3 ?>>3:00 AM</option>
              <option value="4:00 AM" <?php echo $dam4 ?>>4:00 AM</option>
              <option value="5:00 AM" <?php echo $dam5 ?>>5:00 AM</option>
              <option value="6:00 AM" <?php echo $dam6 ?>>6:00 AM</option>
              <option value="7:00 AM" <?php echo $dam7 ?>>7:00 AM</option>
              <option value="8:00 AM" <?php echo $dam8 ?>>8:00 AM</option>
              <option value="9:00 AM" <?php echo $dam9 ?>>9:00 AM</option>
              <option value="10:00 AM" <?php echo $dam10 ?>>10:00 AM</option>
              <option value="11:00 AM" <?php echo $dam11 ?>>11:00 AM</option>
              <option value="12:00 M" <?php echo $dm12 ?>>12:00 M</option>
              <option value="1:00 PM" <?php echo $dpm1 ?>>1:00 PM</option>
              <option value="2:00 PM" <?php echo $dpm2 ?>>2:00 PM</option>
              <option value="3:00 PM" <?php echo $dpm3 ?>>3:00 PM</option>
              <option value="4:00 PM" <?php echo $dpm4 ?>>4:00 PM</option>
              <option value="5:00 PM" <?php echo $dpm5 ?>>5:00 PM</option>
              <option value="6:00 PM" <?php echo $dpm6 ?>>6:00 PM</option>
              <option value="7:00 PM" <?php echo $dpm7 ?>>7:00 PM</option>
              <option value="8:00 PM" <?php echo $dpm8 ?>>8:00 PM</option>
              <option value="9:00 PM" <?php echo $dpm9 ?>>9:00 PM</option>
              <option value="10:00 PM" <?php echo $dpm10 ?>>10:00 PM</option>
              <option value="11:00 PM" <?php echo $dpm11 ?>>11:00 PM</option>
              <option value="12:00 AM" <?php echo $dam12 ?>>12:00 AM</option>
            </select>                
					</div>                    
				</div>
                <div class="panel-body">
					
				</div>
                <div class="panel-heading">
                
					Marketing Title   <input name="marketingText" type="text" class="span4" id="marketingText"  maxlength="150" placeholder="marketing text" style="width: 90%;" value="<?php echo $marketingText ?>">
                     &nbsp; &nbsp;<p></p>
                    URL   <input name="url" type="text" class="span4" id="url"  maxlength="150" placeholder="url" style="width: 90%;" value="<?php echo "http://www.luxuryrentalsinternational.com/go/villa.php?villaId=$villaId"//echo $url ?>">
				</div>
                <div class="panel-body">
					
				</div>
                <div class="panel-heading">
			Villa Video	<input name="video" type="text" class="span4" id="video"  maxlength="150" placeholder="(e.g youtube share embed url.)" style="width: 40%;" value="<?php echo $video ?>"> 
           <?php if (!empty($video)) { ?>
            <iframe width="560" height="315" src="<?php echo $video ?>?autoplay=1"  allowfullscreen></iframe>
		   <?php }   ?>           
           
          &nbsp; &nbsp; 

          <div class="control-group">
                 
                   <?php
                       if ($activo == 1) {
                            $activoSi = checked;
                       }
                       if ($activo == 0) {
                            $activoNo = checked;
                       }		   
                       ?>
                    <input type="radio" name="activo" id="activo" value="1" class="required" <?php echo $activoSi ?>>
                    Inactive
                     &nbsp; &nbsp;  
                    <input type="radio" name="activo" id="activo" value="0" class="required" <?php echo $activoNo ?>>
                    Active
               
               &nbsp; &nbsp; 
                &nbsp; &nbsp;  
                 &nbsp; &nbsp;  
               <?php
                   if ($featured == 1) {
                        $featuredSi = checked;
                   }
                   if ($featured == 0) {
                        $featuredNo = checked;
                   }		   
                   ?>
                <input type="radio" name="featured" id="featured" value="1" class="required" <?php echo $featuredSi ?>>
                No featured
                 &nbsp; &nbsp;  
                <input type="radio" name="featured" id="featured" value="0" class="required" <?php echo $featuredNo ?>>
                Featured
               
          </div> 
          
          &nbsp; &nbsp;  
           Also Like  
           <!-- ********************solo funciona porque tiene corchetes lstFruits[] *********************************** !-->
              <SELECT id="lstFruits" name="lstFruits[]" multiple="multiple" size="20">
                    <?php  //combobox
                    $queryAlsoLike="SELECT * FROM villa";  					
                    $resultadoAlsoLike=mysql_query($queryAlsoLike,$dbConn);
                    while($dataAlsoLike=mysql_fetch_array($resultadoAlsoLike))
                    {   
					$valor_array = explode(',',$alsoLike);      
					foreach($valor_array as $llave => $valores) 
					{ 						 
						if ($dataAlsoLike['VillaId']==$valores)
						{
							echo'<OPTION VALUE="'.$dataAlsoLike['VillaId'].'" selected>'.$dataAlsoLike['Name'].'</OPTION>';
						}
					}                     
                        echo'<OPTION VALUE="'.$dataAlsoLike['VillaId'].'">'.$dataAlsoLike['Name'].'</OPTION>';						
                    } 
                    ?>
              </SELECT> 
                    <input type="button" id="btnSelected" value="Get Selected" />                       
				</div>              
			</div>
		</div>
	</div>
</div>
     <!-- //*************************** Setting Prices: ******************************************** -->
  <div class="container-fluid" style="display:none">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<legend>Setting Prices:</legend>
					</h3>
                    <div align="right">
                        <a href="settinprice.php?villaId=4">                                
                            <button type="button" class="btn btn-default">
                            Add <i class="icon-shopping-cart"></i>
                            </button>
                        </a>
                   </div>
                    <div class="control-group-inline" style="padding-top: 10px;">	 	  		
                        Season <input name="season" type="text" class="span4" id="season"  maxlength="15" placeholder="season" style="width: 25%;" value="<?php echo $season ?>">
                        &nbsp; &nbsp;
                        Season date from <input name="seasondatefrom" type="text" class="span4" id="seasondatefrom"  maxlength="10" placeholder="season date from" style="width: 10%;" value="<?php echo $seasondatefrom ?>">
                        &nbsp; &nbsp;
                        Season date to <input name="seasondateto" type="text" class="span4" id="seasondateto"  maxlength="10" placeholder="season date to" style="width: 10%;" value="<?php echo $seasondateto ?>">            
                    </div>
				</div>
				<div class="panel-body">
					
				</div>
				<div class="panel-heading">
					<div class="control-group-inline" style="padding-top: 10px;">	 
                        Defined room <input name="definedroom" type="text" class="span4" id="definedroom"  maxlength="20" placeholder="definedroom" style="width: 20%;" value="<?php echo $definedroom ?>">
                        &nbsp; &nbsp;
                        Price <input name="price" type="text" class="span4" id="price"  maxlength="5" placeholder="price" style="width: 5%;" value="<?php echo $price ?>">
                        &nbsp; &nbsp;
                        Price type <select>
                          <option>Monthly</option>
                          <option>Weekly</option>
                          <option>Nightly</option>
                        </select>
                        &nbsp; &nbsp;
                        Minimun Nights <input name="minimument" type="text" class="span4" id="minimument"  maxlength="2" placeholder="minimument" style="width: 2%;" value="<?php echo $minimument ?>">            
                    </div>	
				</div>
			</div>
		</div>
	</div>
</div>  
        	
        
        
               
		<div class="control-group" style="padding-top: 10px;">	 
			<button class="btn btn-primary" type="submit" id="enviar">Save</button>
			<a href="propertylist.php">
            	<button type="button" class="btn btn-default" id="cancelar">Cancel</button>
            </a>
        </div>
        
  </form> <!--cierre del formulario !-->

	 <!-- ================= mensajes de EXITO o de ERROR===========================================================  !-->
     <div class="alert alert-success mensaje_form" style="display: none" id="exito1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MESSAGE!</strong> <span class="textmensaje">Record successfully</span>          
	 </div> 
     
     <div class="alert alert-success mensaje_form" style="display: none" id="exito2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MESSAGE!</strong> <span class="textmensaje">Upgrade successfully</span>          
	 </div>       	 
      
	 <div class="alert alert-danger mensaje_form" style="display: none" id="error1">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MESSAGE!</strong> <span class="textmensaje">You must be login</span>
	 </div>
     
     <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MESSAGE!</strong> <span class="textmensaje">This villa exist already</span>
	 </div>

     
</div><!--cierre de spam de formulario !-->
        </div>        
      </div>
    </div>
  </section>


<div class="modal" id="light" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                <h4 class="modal-title" id="myModalLabel">
                    ¡Record upgraded!
                </h4>
            </div>
            <div class="modal-body">
                The account has been upgraded successfully. <br>                
            </div>
            <div class="modal-footer">	            		
                    <a href = "editVilla.php?id=<?php echo $villaId ?>" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                   Ok
                </button> 
                    </a>					
            </div>
        </div>						
    </div>					
 </div>
 

    <!-- .................................... $footer .................................... -->
  <?php //include "headers/otrofooter.php"; ?>
  
  <footer class="smoke-bg">
    <div class="container-fluid">
        <div class="row text-center">
            <!-- Social networks -->
            <div class="navbar-text pull-left">                    
                <a href="https://www.facebook.com/Luxuryrentals1"><i class="fa fa-facebook-square fa-2x" style="padding-left: 30px;"></i></a>
                <a href="https://www.youtube.com/channel/UC0rWZaCtHNMYqrVLFiaFZBw"><i class="fa fa-youtube fa-2x"></i></a>
                <a href="https://plus.google.com/115170508852534381243"><i class="fa fa-google-plus fa-2x"></i></a>
            </div>		
            <!-- Footer menu -->						
            <div class="col-sm-8 text-center navbar-text pull-center align="center"">    
                <a href="http://www.luxuryrentalsinternational.com/go/index.php" style="padding-right: 10px;">Home</a>
                <a href="http://www.luxuryrentalsinternational.com/go/favorites.php" style="padding-right: 10px;">Favorites</a>
                <a href="http://www.luxuryrentalsinternational.com/go/vacation.php" style="padding-right: 10px;">Vacation Rentals</a>
                <a href="http://www.luxuryrentalsinternational.com/go/homeowners.php" style="padding-right: 10px;">Homeowners</a>
                <a href="http://www.luxuryrentalsinternational.com/go/about.php" style="padding-right: 10px;">About</a>	
                <br>
              <!-- Copyright -->		
                <font color="#FFFFFF" size="-1" style="font-size:0.7em">Copyright 2016 © LUXURY RENTALS INTERNATIONAL</font>
            </div>  
       </div>
    </div>
</footer>
<!-- Vendor scripts -->
<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>


<!-- App scripts -->
<script src="scripts/homer.js"></script>

<!-- Local script for menu handle -->
<!-- It can be also directive -->
<script>
    $(document).ready(function () {

        // Page scrolling feature
        $('a.page-scroll').bind('click', function(event) {
            var link = $(this);
            $('html, body').stop().animate({
                scrollTop: $(link.attr('href')).offset().top - 50
            }, 500);
            event.preventDefault();
        });

        $('body').scrollspy({
            target: '.navbar-fixed-top',
            offset: 80
        });

    });
</script>
</body>
</html>