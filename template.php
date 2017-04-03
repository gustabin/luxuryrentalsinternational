<?php 
session_start();
require_once('tools/mypathdb.php');
error_reporting(0);
//include "header.php";
$villaId=$_GET["id"];
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
    <!-- Page title -->
    <title>Back end | Luxury Rentals International</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="styles/style.css">
  
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="css/jquery.ui.datepicker.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.ui.core.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.ui.theme.css" rel="stylesheet" media="screen" />
  

  <!-- .................................... $scripts .................................... -->
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>
 
  <script src="js/jquery.min.js"></script>
  <script src="js/modernizr.min.js"></script>

  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.hoverdir.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.masonry.min.js"></script>
  <script src="js/jquery.fitvids.min.js"></script>
  <script src="js/jquery.flexslider.min.js"></script>
  <!--script src="<?php// echo INCLUDES ?>js/script.js"></script!--> 

  <script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.ui.datepicker.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.ui.core.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.ui.widget.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/datepiker_lenguaje.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.maskedinput.js"></script>	
    
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
  <script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script> 
  
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />



<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Villas of Luxury Rentals International");
	});
</script>
<script language="JavaScript" type="text/JavaScript">
	$(document).ready(function() {

    //Metodo para cargar los datos personales
    $("body").on('submit', '#formVilla', function(event) {
		event.preventDefault()
		if ($('#formVilla').valid()) {
			$.ajax({
				type: "POST",
				url: "historia_procesar_parte1.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 1000);
					}
					if (respuesta.error == 2) {
						$('#error2').show();
						setTimeout(function() {
						$('#error2').hide();
						}, 1000);
					}
					if (respuesta.exito == 1) {
						$('#exito1').show();
						setTimeout(function() {
						$('#exito1').hide();
						window.location.href='historiaParte2.php?id=<?php echo $us_id?>'; 
					  }, 1000);
					}
					
					if (respuesta.exito == 2) {
						$('#exito2').show();
						setTimeout(function() {
						$('#exito2').hide();
						window.location.href='historiaParte2.php?id=<?php echo $us_id?>'; 
					  }, 1000);
					}
					
				}
			});
		}
	});	
</script>     
</head>
<body class="landing-page">
  <!-- .................................... $header .................................... -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://www.luxuryrentalsinternational.com" class="navbar-brand">LRI</a>
            <div class="brand-desc">
                Back end desktop for LRI
            </div>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a class="page-scroll" href="index.php">Home</a></li>
                <li><a class="page-scroll" page-scroll href="propertylist.php">Property list</a></li>
                <li><a class="page-scroll" page-scroll href="#features">Property Editor</a></li>
                <li><a class="page-scroll" page-scroll href="#team">Map Address</a></li>
                <li><a class="page-scroll" page-scroll href="#pricing">Amenities </a></li>
                <li><a class="page-scroll" page-scroll href="#clients">Setting room / bathroom</a></li>
                <li><a class="page-scroll" page-scroll href="#contact">Upload images</a></li>
                <li><a class="page-scroll" page-scroll href="#contact">Gallery</a></li>
                <li><a class="page-scroll" page-scroll href="#contact">Review</a></li>
            </ul>
        </div>
    </div>
</nav>




<!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 150px; padding-bottom: 0px;">
    <div class="container">
      <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Villa
        <small>Features</small>
      </h2>
      <ul class="breadcrumb">
        <li><span id="titulo"></span></li>
      </ul>
    </div>
  </section>


 <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter" style="padding-top: 0px;">
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
							$pathVilla = $dataDetail['PathVilla'];
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
		<div class="control-group-inline">	 
        	<input name="us_id" type="hidden" value="<?php echo $us_id ?>" /> 		
		  Villa Name <input name="villaName" type="text" class="span4 required" id="villaName"  maxlength="30" placeholder="villa Name" style="width: 50%;" value="<?php echo $villaName ?>">
        </div>
        <div class="control-group">	 
          Description  <textarea name="description" type="text" class="span4 required" id="description"  maxlength="30" placeholder="description" style="width: 97%;" cols="45" rows="5"><?php echo $description ?></textarea>
        </div>
        <div class="control-group">
          Polices  <textarea name="polices" type="text" class="span4" id="polices"  maxlength="1000" placeholder="polices" style="width: 97%;" cols="45" rows="15"> <?php echo $polices ?></textarea>
        </div>
        <div class="control-group-inline">	 
            Longitud <input name="longitud" type="text" class="span4" id="longitud" value="<?php echo $longitud ?>" style="width: 40%;" placeholder="longitud" maxlength="15">
			Latitud  <input name="latitud"  type="text" class="span4" id="latitud"  value="<?php echo $latitud ?>"  style="width: 40%;" 
 placeholder="latitud" maxlength="15">
        </div>   
        <div class="control-group-inline">
            Price from <input name="pricefrom" type="text" class="span4 required" id="pricefrom"  maxlength="5" placeholder="price from" style="width: 5%;" value="<?php echo $pricefrom ?>">
            Price to <input name="priceto" type="text" class="span4 required" id="priceto"  maxlength="5" placeholder="price to" style="width: 5%;" value="<?php echo $priceto ?>">
        	City <input name="city" type="text" class="span4" id="city"  maxlength="60" placeholder="city" style="width: 50%;" value="<?php echo $city ?>">
        </div>
        <div class="control-group-inline">
	  		Quantity room <input name="quantityroom" type="text" class="span4 required" id="quantityroom"  maxlength="2" placeholder="quantityroom" style="width: 5%;" value="<?php echo $quantityroom ?>">
            Quantity bathroom <input name="quantitybath" type="text" class="span4 required" id="quantitybath"  maxlength="2" placeholder="quantitybath" style="width: 5%;" value="<?php echo $quantitybath ?>">
            Path villa <input name="pathVilla" type="text" class="span4" id="pathVilla"  maxlength="2" placeholder="pathVilla" style="width: 50%;" value="<?php echo $pathVilla ?>">            
		</div>	
        <div class="control-group-inline">
	  		Swimming Pool <input name="swimmingPool" type="text" class="span4" id="swimmingPool"  maxlength="2" placeholder="swimming Pool" style="width: 5%;" value="<?php echo $swimmingPool ?>">
            Season <input name="season" type="text" class="span4" id="season"  maxlength="15" placeholder="season" style="width: 25%;" value="<?php echo $season ?>">
            Season date from <input name="seasondatefrom" type="text" class="span4" id="seasondatefrom"  maxlength="10" placeholder="season date from" style="width: 10%;" value="<?php echo $seasondatefrom ?>">
            Season date to <input name="seasondateto" type="text" class="span4" id="seasondateto"  maxlength="10" placeholder="season date to" style="width: 10%;" value="<?php echo $seasondateto ?>">            
		</div>
        <div class="control-group-inline">
	  		Defined room <input name="definedroom" type="text" class="span4" id="definedroom"  maxlength="20" placeholder="definedroom" style="width: 20%;" value="<?php echo $definedroom ?>">
            Price <input name="price" type="text" class="span4" id="price"  maxlength="5" placeholder="price" style="width: 5%;" value="<?php echo $price ?>">
            Price type <input name="pricetype" type="text" class="span4" id="pricetype"  maxlength="20" placeholder="pricetype" style="width: 20%;" value="<?php echo $pricetype ?>">
            Minimum ent <input name="minimument" type="text" class="span4" id="minimument"  maxlength="2" placeholder="minimument" style="width: 5%;" value="<?php echo $minimument ?>">            
		</div>		
        
		<div class="control-group">         
			<button class="btn btn-primary" type="submit" id="enviar">Save</button>
			<button class="btn btn-default" type="reset" id="cancelar">Cancel</button>
            <a href="historiaPDF.php"></a> </div>
        
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
		<strong>MESSAGE!</strong> <span class="textmensaje">You must choose a villa registered</span>
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