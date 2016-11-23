<?php 
session_start(); 
require_once('tools/mypathdb.php');  
//include "tools/class.php"; 
error_reporting(0);
include "header.php"; 
$villaId=$_GET["villaId"];
$Id=$_SESSION['Id'];
?>
<link href="demo.css" rel="stylesheet">	

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>

<script src="js/datepiker-es.js"></script>
<script src="js/jquery.validate.js"></script>

<script language="JavaScript" type="text/JavaScript">	
		$(document).ready(function() {			
		var today = new Date();
		var diadelasemana= today.getDay();
		
			$("#desde").datepicker({
				//changeYear: true,
				minDate: new Date(new Date().getTime() + (1 * 24 * 3600 * 1000)),
				//maxDate: 60,
				dateFormat: 'yy-mm-dd',
				//maxDate: 90,
				//changeMonth: true,
				onClose: function(selectedDate) {
					var maxDate = new Date(new Date(selectedDate).getTime() + (60 * 24 * 3600 * 1000));
					$("#hasta").datepicker("option", "minDate", selectedDate);
					$("#hasta").datepicker("option", "maxDate", maxDate);						
				}
			});
			
			$("#hasta").datepicker({
			//changeYear: true,
			minDate: new Date(new Date().getTime() + (1 * 24 * 3600 * 1000)),
			dateFormat: 'yy-mm-dd',	
			maxDate: 90,
			//changeMonth: true,
			onClose: function(selectedDate) {
				$("#desde").datepicker("option", "maxDate", selectedDate);
			}
			});	
		
		function numeroDeDias() {
			var start = $("#avisoCrear input[name='desde']").datepicker('getDate');
			var end = $("#avisoCrear input[name='hasta']").datepicker('getDate');
			
			if(!start || !end)
			return;					
		}
			
	//Metodo para cargar el formulario 
    $("body").on('submit', '#formContacto', function(event) {
	event.preventDefault()
	if ($('#formContacto').valid()) {
	    $.ajax({
		type: "POST",
		url: "registrar_Procesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {
		    if (respuesta.error == 1) {
			  $('#error').show();
			setTimeout(function() {
			  $('#error1').hide();
			}, 3000);
		    }
			 
			if (respuesta.exito == 1) {
			  $('#areaForm').hide();
			  $('#formEnviado').show();			  			  			  
			 window.location.href='http://www.oikosplus.com/luxury/enviarEmail.php?Page=index&Id=<?php echo $_SESSION["Id"]?>';
			 //window.location.href='enviarEmail.php?Page=villa&Id=<?php echo $Id?>&villaId=<?php echo $villaId ?>';		
			 }			    
		}
	    });
	}
	});
		
		});
</script>	
<!--script src="js3/jquery.ui.datepicker.js"></script!-->
	
	<body data-spy="scroll" data-target=".navbar" data-offset="61">
	<!-- Start preloader -->
	<!-- End preloader -->
<!-- menu -->


	<!-- Start intro -->
<?php //include "menuSite.php" ?>
<?php include "menuSiteFavorites.php";?>
<style>
.container {
    margin-top: 20px;
}

/* Carousel Styles */
.carousel-indicators .active {
    background-color: #2980b9;
}

.carousel-inner img {
    width: 1560px;
    max-height: 100%;
}

.carousel-innerInicial img {	
	width: 100%;
    max-height: 800px;	
}

.carousel-control {
    width: 0;
}

.carousel-control.left,
.carousel-control.right {
	opacity: 1;
	filter: alpha(opacity=100);
	background-image: none;
	background-repeat: no-repeat;
	text-shadow: none;
}

.carousel-control.left span {
	padding: 15px;
}

.carousel-control.right span {
	padding: 15px;
}

.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right, 
.carousel-control .icon-prev, 
.carousel-control .icon-next {
	position: absolute;
	top: 25%;
	z-index: 5;
	display: inline-block;
}

.carousel-control .glyphicon-chevron-left,
.carousel-control .icon-prev {
	left: 0;
}

.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-next {
	right: 0;
}

.carousel-control.left span,
.carousel-control.right span {
	background-color: #000;
}

.carousel-control.left span:hover,
.carousel-control.right span:hover {
	opacity: .7;
	filter: alpha(opacity=70);
}

/* Carousel Header Styles */
.header-text {
    position: absolute;
    top: 20%;
    left: 1.8%;
    right: auto;
    width: 96.66666666666666%;
    color: #fff;
}

.header-text h2 {
    font-size: 40px;
}

.header-text h2 span {
    background-color: #2980b9;
	padding: 10px;
}

.header-text h3 span {
	background-color: #000;
	padding: 15px;
}

.btn-min-block {
    min-width: 170px;
    line-height: 26px;
}

.btn-theme {
    color: #fff;
    background-color: transparent;
    border: 2px solid #fff;
    margin-right: 15px;
}

.btn-theme:hover {
    color: #000;
    background-color: #fff;
    border-color: #fff;
}
</style>
<style>
/* Custom, iPhone Retina */ 

@media only screen and (min-width : 300px) {
    #carousel-intro {	
	background-size: 100% auto;
	max-height: 100px;	
	
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	
	min-height: 300px;
	background-size: 100% 300px;
	}
	#viewmore1 {
    display:none;
  	}	
}
/* Extra Small Devices, Phones */ 
@media only screen and (min-width : 480px) {
    #carousel-intro {
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	background-size: cover;
	min-height: 350px;
	background-size: 100% 350px;
	}	
}
@media (min-width: 300px) and (max-width: 500px) {
  
}
/* Small Devices, Tablets */
@media only screen and (min-width : 768px) {    
  .modal-dialog {
    width: 780px;
    margin: 10px auto;
  }
  .img-rounded {    
    margin-top: 0px;
    margin-bottom: 10px;
    margin-right: 10px;
    margin-left: 10px;
  }  
  .carousel-indicators {
	padding-bottom: 30px;
  }
  #carousel-intro {
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	background-size: cover;
	min-height: 400px;
	background-size: 100% 400px;
	}
}

@media only screen and (min-width : 844px) {    
  .modal-dialog {
    width: 800px;
    margin: 10px auto;
  }
  .img-rounded {    
    margin-top: 0px;
    margin-bottom: 10px;
    margin-right: 10px;
    margin-left: 10px;
  }
  .carousel-indicators {
	padding-bottom: 30px;
  }
  #carousel-intro {
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	background-size: cover;
	min-height: 450px;
	background-size: 100% 450px;
	}
	#viewmore2 {
    display:none;
  	}	
	#viewmore1 {
    display:Block;
  	}	
}

@media only screen and (min-width : 900px) {    
  .modal-dialog {
    width: 900px;
    margin: 10px auto;
  }
  .img-rounded {    
    margin-top: 0px;
    margin-bottom: 10px;
    margin-right: 10px;
    margin-left: 10px;
  }
  .carousel-indicators {
	padding-bottom: 30px;
  }
  #carousel-intro {
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	background-size: cover;
	min-height: 500px;
	background-size: 100% 500px;
	}	
}
/* Medium Devices, Desktops */
@media only screen and (min-width : 992px) {
    .modal-dialog {
    width: 980px;
    margin: 10px auto;
  }
  .img-rounded {    
    margin-top: 0px;
    margin-bottom: 10px;
    margin-right: 10px;
    margin-left: 10px;
  }
  .carousel-indicators {
	padding-bottom: 30px;
  }
  #carousel-intro {
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	background-size: cover;
	min-height: 600px;
	background-size: 100% 600px;
	}		
}


/* Large Devices, Wide Screens */
@media only screen and (min-width : 1200px) {
     .modal-dialog {
    width: 1180px;
    margin: 20px auto;
  }
  .img-rounded {    
    margin-top: 10px;
    margin-bottom: 10px;
    margin-right: 10px;
    margin-left: 10px;
  }
  .carousel-indicators {
	padding-bottom: 30px;
  }
  #carousel-intro {
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	background-size: cover;
	min-height: 700px;
	background-size: 100% 700px;
	}
}
/* Large Devices, Wide Screens */
@media only screen and (min-width : 1300px) {
     .modal-dialog {
    width: 1280px;
    margin: 30px auto;
  }  
  .img-rounded {    
    margin-top: 10px;
    margin-bottom: 10px;
    margin-right: 10px;
    margin-left: 10px;
  }
  .carousel-indicators {
	padding-bottom: 30px;
  }
  #carousel-intro {
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	background-size: cover;
	min-height: 800px;
	background-size: 100% 800px;
}
}
</style>
<body>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<!-- Comernzar desde aqui -->
<?php	
//************ Buscar $pathVilla **********************
		$villaId= $_GET["villaId"];	
		$queryDetail = ("SELECT * FROM villadetail WHERE VillaId='$villaId'");			
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{							
							$quantityroom = $dataDetail['quantityroom'];				
							$quantitybath = $dataDetail['quantitybath'];
							$pathVilla = $dataDetail['PathVilla'];
							}							
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
		
//************ Fin Buscar $pathVilla **********************		
	?>
<style>
#carousel-intro {
	background-image: url("<?php echo $pathVilla ?>/banner.jpg");
	-webkit-background-size: cover;
	background-size: cover;
	/*min-height: 800px;
	background-size: 100% 800px;*/
}
</style>
	
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<?php
               // $queryImage = ("SELECT * FROM imagegallery WHERE VillaId= '$villaId'");
               // $resultadoImage=mysql_query($queryImage,$dbConn);
               // $dataImage=mysql_fetch_array($resultadoImage);
               // $pathMain = $dataImage['Path'];
            ?>
            <div id="viewmore1" class="item active" data-toggle="modal" data-target="#modal-gallery" align="center">							
                <div id="carousel-intro" class="carousel">
                    <div class="carousel-inner text-center">
                        <div class="active item">				
                            <div class="caption">										
                                <button type="submit" class="btn btn-default" style="margin-top:100px">View more photos</button>		
                            </div>									
                        </div>																		
                    </div>
                </div>						
            </div>
            <div id="viewmore2" class="item active" data-toggle="modal" data-target="#modal-gallery" align="center">							
                <div id="carousel-intro" class="carousel">
                    <div class="carousel-inner text-center">
                        <div class="active item">				
                            <div class="caption">										
                                <button type="submit" class="btn btn-default" style="margin-top:250px">View more photos</button>		
                            </div>									
                        </div>																		
                    </div>
                </div>						
            </div>
			<?php	
              //  mysql_free_result($resultadoImage); // Liberamos los registros												
              //  mysql_close(); //desconectar();					
            ?>		
		</div>
	</div>
</div>


    	        
<!-- Comenzar desde aqui -->
<?php	
//************ Buscar $pathVilla **********************
		$villaId= $_GET["villaId"];	
		$queryDetail = ("SELECT * FROM villadetail WHERE VillaId='$villaId'");			
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{							
							$quantityroom = $dataDetail['quantityroom'];				
							$quantitybath = $dataDetail['quantitybath'];
							$pathVilla = $dataDetail['PathVilla'];
							}							
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
		
//************ Fin Buscar $pathVilla **********************		
	?>
			<div class="modal" id="modal-gallery" role="dialog">
				<div class="modal-dialog">
					<div class="modal-content col-sm-12 divide-md3">
					  <div class="modal-header">
						  <button class="close" type="button" data-dismiss="modal">X</button>
                          
                          <h3 class="modal-title"></h3>
					  </div>
					  <div class="modal-body">
							<div id="myCarousel" class="carousel slide" style="margin: auto;">
                            <?php		
							// --- Buscar en la tabla imagegallery ------------------
							//---------- contar imagenes-----------------
							$queryImage = ("SELECT * FROM imagegallery WHERE VillaId='$villaId'");									
							$resultadoImage=mysql_query($queryImage,$dbConn);
							$numeroColumnas = mysql_num_rows($resultadoImage);
							mysql_free_result($resultadoImage); // Liberamos los registros												
							//---------- fin contar imagenes-----------------
							?>
                            	                            	
								<ol class="carousel-indicators hidden-xs hidden-sm" style="padding-bottom: 10px;">
									<li data-target="#carcousel-example-generic" data-slide-to="0" class="active"></li>
									<?php
                                    $i = 1;
                                    do {
									?>
                                        <li data-target="#carcousel-example-generic" data-slide-to="<?php echo $i ?>"></li>
                                    <?php
									$i++;
                                    } while ($i <= $numeroColumnas);
                                    ?>
								</ol>
                                
								<div class="carousel-inner">
									<div class="active item" align="center">
                                    <img src="<?php echo $pathVilla ?>/banner.jpg" class="img-rounded" style="height:80%">
                                    </div>
                                    <?php		
							// --- Buscar en la tabla imagegallery ------------------
							$queryImage = ("SELECT * FROM imagegallery WHERE VillaId='$villaId'");									
							$resultadoImage=mysql_query($queryImage,$dbConn);
							while($dataImage=mysql_fetch_array($resultadoImage))
								{							
								$path = $dataImage['Path'];
								$descriptionImage = $dataImage['Description'];
								$fullpath = $pathVilla . "/" . $path;
								?>																
										
                                    <div class="item" align="center">
                                    	<img src="<?php echo $fullpath?>" class="img-rounded" style="height:80%">
									</div>											
								<?php											
								}		
							mysql_free_result($resultadoImage); // Liberamos los registros												
							mysql_close(); //desconectar();
							?>
									
								</div>
                                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
							</div>
                            
						</div>
                        
					</div>
                    
				</div>
				
			</div>
            
            
            
            
<?php
		$villaId= $_GET["villaId"];
		$queryDetail = ("SELECT * FROM villa WHERE VillaId='$villaId'");	
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{
							$villaName = $dataDetail['Name'];
							$description = $dataDetail['Description'];
							$polices = $dataDetail['polices'];
							$longitud = $dataDetail['longitud'];
							$latitud = $dataDetail['latitud'];
							$pricefrom = $dataDetail['pricefrom'];
							$priceto = $dataDetail['priceto'];
							$villaId = $dataDetail['VillaId'];
							$city = $dataDetail['City'];
							$quantityroom = $dataDetail['quantityroom'];				
							$quantitybath = $dataDetail['quantitybath'];
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
							$swimmingPool = $dataDetail['swimmingpool'];
							}		
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
	?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
			
	
			<div class="col-lg-12" style="color: #132B49;">
				<p></p>
				<?php echo $_SESSION['country']?>  <?php echo $_SESSION['city']?>
               <h1 class="manipulacion" style="margin-top: 20px; margin-bottom: 50px; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; color:#132b49;">
			   <?php echo $villaName; ?></h1>
               <h3 style="margin-top: -50px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; color: #878585">Starting $<?php echo $pricefrom ?> per night</h3>                               
                <legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;">Summary</p></legend>
				<!-- Start Panels Start Panels --->          
                <div class="container">				
					<div class="row" style="margin-bottom: 20px; padding: 10px;">
						 
						<div class="col-md-3">
							<div class="box">
								<div class="box-icon" style="text-align: center;">
								<img src="img/amenities/bed.png" width="80" height="80" alt="" /><br>
									
								</div>
								<div class="info" style="color: #132B49;">
									<h4 class="text-center">Bedrooms</h4>
									<p align="center"><?php echo $quantityroom ?> bedrooms </p>
								</div>
							</div>
						</div>        
						<div class="col-md-3">
							<div class="box">
								<div class="box-icon" style="text-align: center;">
								<img src="img/amenities/bath.png" width="80" height="80" alt=""/> <br>
									
								</div>
								<div class="info" style="color: #132B49;">
									<h4 class="text-center">Bathrooms</h4>
									<p align="center"> <?php echo $quantitybath ?> bathrooms</p>
								</div>
							</div>
						</div>	
						<?php if ($swimmingPool==1) {?>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="box">
										<div class="box-icon" style="text-align: center;">
										<img src="img/amenities/pool.png" width="80" height="80" alt=""/> <br>
										</div>
										<div class="info" style="color: #132B49;">
											<h4 class="text-center">Swimming Pool</h4>
											<p align="center">Private in property</p>
										</div>
									</div>
								</div>
						<?php }?>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="box">
								<div class="box-icon" style="text-align: center;">
									<img src="img/amenities/wifi.png" width="80" height="80" alt=""/><br>
								</div>
								<div class="info" style="color: #132B49;">
									<h4 class="text-center">WIFI</h4>
									<p align="center">Full House Coverage</p>
								</div>
							</div>
						</div>
												
					</div>
				</div>
			</div>
		</div>
    </div>    

	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<!-- Nav tabs -->
				<div class="card" style="background-color: #C5C5C5; border-radius: 4px;">
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
						<li role="presentation"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a></li>
						<li role="presentation"><a href="#rates" aria-controls="rates" role="tab" data-toggle="tab">Rates</a></li>
						<li role="presentation"><a href="#policies" aria-controls="policies" role="tab" data-toggle="tab">Policies</a></li>
					</ul>
					<!-- Tab panes -->
					
					<?php				
					$queryDetail = ("SELECT * FROM settingprice WHERE VillaId='$villaId'");
					$resultadoDetail=mysql_query($queryDetail,$dbConn);				
					?>
					<div class="tab-content" style="background-color: #E7E7E7; border-radius: 4px;">                                     
						<div role="tabpanel" class="tab-pane active" id="home" style="color: #132B49; padding: 30px; text-align: justify; text-indent: 40px;">  		
								<?php echo $description ?>
						</div>
						<div role="tabpanel" class="tab-pane" id="overview" style="color: #132B49; padding: 30px; text-align: justify; text-indent: 40px;">
								<?php echo $description ?>	
						</div>
						<div role="tabpanel" class="tab-pane" id="rates" style="color: #132B49; padding: 30px; text-align: justify; text-indent: 40px;">
								  <table class="table">
									<thead>
									  <tr>
										<th>Dates</th>
										<th>Season</th>
										<th>Type</th>
										<th>Price</th>
										<th>Min. Nights</th>
									  </tr>
									</thead>
									<tbody>
									
									<?php
									while($dataDetail=mysql_fetch_array($resultadoDetail))
										{								
										$season = $dataDetail['season'];
										$seasondatefrom = $dataDetail['seasondatefrom'];
										$seasondateto = $dataDetail['seasondateto'];
										$definedroom = $dataDetail['definedroom'];
										$price = $dataDetail['price'];
										$pricetype = $dataDetail['pricetype'];
										$minimument = $dataDetail['minimument'];	
									?>
									  <tr class="warning">
										<td><?php echo $season ?></td>
										<td><?php echo $seasondatefrom ?> - <?php echo $seasondateto ?></td>
										<td><?php echo $pricetype ?></td>
										<td><?php echo $price ?></td>
										<td><?php echo $minimument ?></td>
									  </tr>
									  
									<?php  
										}									
										mysql_free_result($resultadoDetail); // Liberamos los registros												
										mysql_close(); //desconectar();
									?>
									</tbody>
								  </table>
								
						</div>
						<div role="tabpanel" class="tab-pane" id="policies" style="color: #132B49; padding: 30px; text-align: justify; ">
								<?php echo $polices ?>
						</div>
					</div>
				</div>
			</div>  
			<div class="col-md-3">
			<br>
				<div class="caption">
				  <a href="#formBelow"><button type="submit" class="btn btn-default">Inquire Now</button><p>&nbsp;</p>
				  <button type="submit" class="btn btn-default">Book Now</button><p>&nbsp;</p>
				  <button type="submit" class="btn btn-default">Check Availability</button></a><p>&nbsp;</p>
				</div>
			</div>
		</div>
		<br><br><br>
		
		
		<!---START START START PROPERTY DETAILS -->
		<legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;">Property Details</p></legend>
		<div class="col-md-4" style="padding: 30px; color: #132B49;">
			<center><img src="img/amenities/bed.png" width="80" height="80" alt=""/><br><br></center>
			<ul>
			<?php		
				$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
				$resultadoDetail=mysql_query($queryDetail,$dbConn);
				while($dataDetail=mysql_fetch_array($resultadoDetail))
									{							
									$amenitiid = $dataDetail['amenitiid'];
									$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=1");			
									$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
									while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
														{							
														$descriptionAmenitie = $dataAmenitie['description'];
														?>
															<li><?php echo $descriptionAmenitie ?></li>
														<?php											
														}		
									mysql_free_result($resultadoAmenitie); // Liberamos los registros												
									mysql_close(); //desconectar();
									}		
				mysql_free_result($resultadoDetail); // Liberamos los registros												
				mysql_close(); //desconectar();
			?>   
		   </ul>
		</div>
		
		<div class="col-md-4" style="padding: 30px; color: #132B49;">
			<center><img src="img/amenities/laundry.png" width="80" height="80" alt=""/><br><br></center>
			<ul>
			<?php		
				$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
				$resultadoDetail=mysql_query($queryDetail,$dbConn);
				while($dataDetail=mysql_fetch_array($resultadoDetail))
									{							
									$amenitiid = $dataDetail['amenitiid'];
									$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=2");			
									$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
									while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
														{							
														$descriptionAmenitie = $dataAmenitie['description'];
														?>
															<li><?php echo $descriptionAmenitie ?></li>
														<?php											
														}		
									mysql_free_result($resultadoAmenitie); // Liberamos los registros												
									mysql_close(); //desconectar();
									}		
				mysql_free_result($resultadoDetail); // Liberamos los registros												
				mysql_close(); //desconectar();
			?>   
			</ul>
		</div>
		
		<div class="col-md-4" style="padding: 30px; color: #132B49;">
			<center><img src="img/amenities/kitchen.png" width="80" height="80" alt=""/><br><br></center>
			<ul>
			<?php		
				$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
				$resultadoDetail=mysql_query($queryDetail,$dbConn);
				while($dataDetail=mysql_fetch_array($resultadoDetail))
									{							
									$amenitiid = $dataDetail['amenitiid'];
									$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=3");			
									$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
									while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
														{							
														$descriptionAmenitie = $dataAmenitie['description'];
														?>
															<li><?php echo $descriptionAmenitie ?></li>
														<?php											
														}		
									mysql_free_result($resultadoAmenitie); // Liberamos los registros												
									mysql_close(); //desconectar();
									}		
				mysql_free_result($resultadoDetail); // Liberamos los registros												
				mysql_close(); //desconectar();
			?>   
			</ul>    
		</div>
		<hr>
		
		<div class="col-md-4" style="padding: 30px; color: #132B49;">
			<center><img src="img/amenities/livingroom.png" width="80" height="80" alt=""/><br><br></center>
			<ul>
			<?php		
				$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
				$resultadoDetail=mysql_query($queryDetail,$dbConn);
				while($dataDetail=mysql_fetch_array($resultadoDetail))
									{							
									$amenitiid = $dataDetail['amenitiid'];
									$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=4");			
									$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
									while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
														{							
														$descriptionAmenitie = $dataAmenitie['description'];
														?>
															<li><?php echo $descriptionAmenitie ?></li>
														<?php											
														}		
									mysql_free_result($resultadoAmenitie); // Liberamos los registros												
									mysql_close(); //desconectar();
									}		
				mysql_free_result($resultadoDetail); // Liberamos los registros												
				mysql_close(); //desconectar();
			?>   
			</ul>
		</div>
		
		<div class="col-md-4" style="padding: 30px; color: #132B49;">
			<center><img src="img/amenities/outdoor.png" width="80" height="80" alt=""/><br><br></center>
			<ul>
			<?php		
				$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
				$resultadoDetail=mysql_query($queryDetail,$dbConn);
				while($dataDetail=mysql_fetch_array($resultadoDetail))
									{							
									$amenitiid = $dataDetail['amenitiid'];
									$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=5");			
									$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
									while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
														{							
														$descriptionAmenitie = $dataAmenitie['description'];
														?>
															<li><?php echo $descriptionAmenitie ?></li>
														<?php											
														}		
									mysql_free_result($resultadoAmenitie); // Liberamos los registros												
									mysql_close(); //desconectar();
									}		
				mysql_free_result($resultadoDetail); // Liberamos los registros												
				mysql_close(); //desconectar();
			?>   
			</ul>
		</div>

		<div class="row">
			<div class="col-md-4" style="padding: 30px; color: #132B49;">
			<center><img src="img/amenities/beach.png" width="80" height="80" alt=""/><br><br></center>
			<ul>
			<?php		
					$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
					$resultadoDetail=mysql_query($queryDetail,$dbConn);
					while($dataDetail=mysql_fetch_array($resultadoDetail))
										{							
										$amenitiid = $dataDetail['amenitiid'];
										$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=6");			
										$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
										while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
															{							
															$descriptionAmenitie = $dataAmenitie['description'];
															?>
																<li><?php echo $descriptionAmenitie ?></li>
															<?php											
															}		
										mysql_free_result($resultadoAmenitie); // Liberamos los registros												
										mysql_close(); //desconectar();
										}		
					mysql_free_result($resultadoDetail); // Liberamos los registros												
					mysql_close(); //desconectar();
				?>   
			</ul>
			</div>
		</div>        
	  <br><br>
	  
	  <legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;"> Features and Amenities</p></legend> 
			<div class="row">
				<div class="col-md-4" style="padding: 30px; color: #132B49;">
					<h3 style="text-align: center;">In <?php echo $villaName ?></h3>
					<div style=" -webkit-column-count: 2; /* Chrome, Safari, Opera */	-moz-column-count: 2; /* Firefox */	column-count: 2;">
					   <ul>
					   <?php		
							$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
							$resultadoDetail=mysql_query($queryDetail,$dbConn);
							while($dataDetail=mysql_fetch_array($resultadoDetail))
												{							
												$amenitiid = $dataDetail['amenitiid'];
												$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=7");			
												$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
												while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
																	{							
																	$descriptionAmenitie = $dataAmenitie['description'];
																	?>
																		<li><?php echo $descriptionAmenitie ?></li>
																	<?php											
																	}		
												mysql_free_result($resultadoAmenitie); // Liberamos los registros												
												mysql_close(); //desconectar();
												}		
							mysql_free_result($resultadoDetail); // Liberamos los registros												
							mysql_close(); //desconectar();
						?>   
						</ul>
					</div>
				</div>
				<div class="col-md-4" style="padding: 30px 50px 30px 50px; color: #132B49;">
					<h3 style="text-align: center;">Around <?php echo $villaName ?></h3>
					<ul>
					<?php		
							$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
							$resultadoDetail=mysql_query($queryDetail,$dbConn);
							while($dataDetail=mysql_fetch_array($resultadoDetail))
												{							
												$amenitiid = $dataDetail['amenitiid'];
												$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=8");			
												$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
												while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
																	{							
																	$descriptionAmenitie = $dataAmenitie['description'];
																	?>
																		<li><?php echo $descriptionAmenitie ?></li>
																	<?php											
																	}		
												mysql_free_result($resultadoAmenitie); // Liberamos los registros												
												mysql_close(); //desconectar();
												}		
							mysql_free_result($resultadoDetail); // Liberamos los registros												
							mysql_close(); //desconectar();
						?>   
					</ul>
				</div>
				<div class="col-md-4" style="padding: 30px 50px 30px 50px; color: #132B49;">
					<h3 style="text-align: center;">Attractions</h3>
					<ul>
					<?php		
							$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");			
							$resultadoDetail=mysql_query($queryDetail,$dbConn);
							while($dataDetail=mysql_fetch_array($resultadoDetail))
												{							
												$amenitiid = $dataDetail['amenitiid'];
												$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid' AND category=9");			
												$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
												while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
																	{							
																	$descriptionAmenitie = $dataAmenitie['description'];
																	?>
																		<li><?php echo $descriptionAmenitie ?></li>
																	<?php											
																	}		
												mysql_free_result($resultadoAmenitie); // Liberamos los registros												
												mysql_close(); //desconectar();
												}		
							mysql_free_result($resultadoDetail); // Liberamos los registros												
							mysql_close(); //desconectar();
						?>   
					</ul>
				</div>	
			</div>	<p style="font-size:14px; text-align:right">*At an additional cost.</p>
		<!-- END END END END PROPERTY DETAILS -->
	</div>
	<!--div container-->

    <legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;"> Area Map</p></legend>   
      <section id="gmap-holder">			
			<div class="container-fluid" style="margin:30px 5% 30px 5%;">
			 <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"; pointer-events:none src="mapa.php?latitud=<?php echo $latitud?>&longitud=<?php echo $longitud?>">    
    </iframe>
			</div>
		</section>
  
	<!-- Banner inferior -->
	<a name="formBelow"></a>
	<section id="bannerInferior">			
		<div class="container-fluid" style="background-image:url(img/bannerInferior.jpg); background-size: cover; background-position: right;">			
			<div class= "darksearch">
				<div id="Confirm" style="display: none;"><br><br>
					<h2>Thank you for submitting your request.</h2><br>
					<p>A sales agent will be in touch soon!<br> If you would like to talk to us now, give us a call! </p><br>
					<p><b>Our Office Hours are:</b><br>Monday thru Saturday<br>9am - 6pm &nbsp;<font size="-1">(UTC -4)</font>
					<h3>305.390.2636 ext.3</h3>
				</div>
				<legend><font color="#FFFFFF">Not sure where to start?</font></legend>
				<p>Our knowledgeable specialists are eager to assist you in finding the right vacation home for you. It doesn't matter if you are a party of one or a big family group... our team is prepared to accomodate all your needs and special requests. So tell us your desire and let's start planning your next <i>luxurious</i> trip!</p>
				<fieldset><legend><font color="#FFFFFF">Let <i>US</i> do it for you!</font></legend>
				 <form data-toggle="validator" class="form-horizontal" role="form" id="formContacto">
				   <font color="#FFFFFF">Who are you?</font><br>
					 <div class="form-group" style="margin-left:0px">			    						
						<input name="fullName" type="text" id="fullName" style="color:#000" required placeholder="Full Name">
						<input name="phone" type="tel" id="phone" style="color:#000"  width="60" required placeholder="Phone No.">                                
					 </div>	 
						  <input name="inputEmail" type="email" id="inputEmail" style="color:#000"  required placeholder="email" data-error="Invalid email format">    
					 <br><div style="height: 10px;"></div>
					 <font color="#FFFFFF">When are you traveling?</font><br>
					 <input type="text" name="desde" placeholder="Arriving" id="desde">
					 <input type="text" name="hasta" placeholder="Departing" id="hasta">
					 
					 <br><div style="height: 10px;"></div>
					 <font color="#FFFFFF"> Where do you want to go?</font><br>
					 
					 <input type="text" name="destination" placeholder ="" value="" id="destination" style="color:#000" class="where">
					 <br><div style="height: 10px;"></div>
					 
					 <font color="#FFFFFF"; weight="600">Anything else?</font><br>
					 <textarea rows="3.5" placeholder ="What are you looking for?" cols="60"  name="anythingelse" id="anythingelse"></textarea> 
                     <input type="hidden" name="villaId" id="villaId" value="<?php echo $villaId ?>">  
					<button class="btn btn-default" type="submit" style="padding: 7px; width: 198px; height: 35px; background-color: #FF9400; font-family: sans-serif; color: #FFFFFF;">Submit</button>                			
							&nbsp;
						  <button class="btn btn-default" type="reset" style="padding: 7px; width: 198px; height: 35px; background-color: #FF9400; font-family: sans-serif; color: #FFFFFF;">Reset</button>						  
				 </form>
				</fieldset>
			</div>
		</div>
    </section>
    <!-- Banner inferior exitoso -->	
	<section id="bannerInferiorExitoso" style="display: none;">			
		<div class="container-fluid" style="background-image:url(img/bannerInferior.jpg); background-size: cover; background-position: right;">			
			<div class= "halfsearch">
				<div id="Confirm"><br><br>
					<br><br>
					<br><br>
					<br><br>
					<br><br>                       
					<h3>Thank you for submitting your request.</h3><br>
					<h5><font color="#FFFFFF">A sales agent will be in touch soon!<br> If you would like to talk to us now, give us a call! </font></h5>
					<p><b>Our Office Hours are:</b><br>Monday thru Saturday<br>9am - 6pm &nbsp;<font size="-1">(UTC -4)</font>
					<h3><font color="#FFFFFF">305.390.2636 ext.3</font></h3>
					<br><br>
					<br><br>
					<br><br>
					<br><br>
				</div>
			</div>
		</div>
	</section>
	
	<!-- End Banner inferior exitoso -->
<!-- End Body -->
<!-- Terminar aqui -->

	 
	
    <script src="js/owl.carousel.js"></script>


    <!-- Demo -->

    <style>
    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 1200px;
        height: 800px;
    }
    </style>


    <script>
    $(document).ready(function() {

      $("#owl-demo").owlCarousel({
        items : 1,
        lazyLoad : true,		
        navigation : true
      });

    });
    </script>


    <script src="js/bootstrap-collapse.js"></script>
    <script src="js/bootstrap-transition.js"></script>
    <script src="js/bootstrap-tab.js"></script>

    <script src="js/prettify.js"></script>
	  <script src="js/application.js"></script>	 
      <!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 5249191;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->

<?php include "footer.php"; ?>
