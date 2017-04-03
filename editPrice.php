<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 2; //Activa la opcion del menu actual
//$villaId=$_GET["id"];
$Id=$_GET["id"];
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='price';  
//$_SESSION['villaId']=$villaId;  
include "header.php";
?> 
  <!--script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script!-->



<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Villas of Luxury Rentals International");
	});
</script>

      
<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formVilla', function(event) {
		event.preventDefault()
		if ($('#formVilla').valid()) {
			$.ajax({
				type: "POST",
				url: "editPriceProcesar.php",
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

 <?php				
		$queryDetail = ("SELECT * FROM settingprice WHERE settingpriceid='$Id'");		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);				
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{		
							$seasonName 	= $dataDetail['season'];
							$dateFrom 		= $dataDetail['seasondatefrom'];	
							$dateTo 		= $dataDetail['seasondateto'];
							$quantityRoom 	= $dataDetail['definedroom'];		
							$price 			= $dataDetail['price'];
							$type 			= $dataDetail['pricetype'];
							$minNights 		= $dataDetail['minimument'];
							$villaId 		= $dataDetail['villaid'];
							//$Id 			= $dataDetail['settingpriceid'];					
							}									
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
	?>
<!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 150px; padding-bottom: 10px;">
    <div class="container">
      <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Edit Season Price   
         <small> of <?php echo $_SESSION['villaName']; ?></small>              
      </h2>
      <a href='price.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-reply" aria-hidden="true"></i> Back to list </button>
      </a>   
       
    </div>
  </section>


 <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter" style="padding-top: 0px; background:#f5f5f5">
    <div class="container">
      <div class="row">
        <div id="contenido">  
       <div class="col-md-12">
    	<form class="form-vertical" id="formVilla" action="">    
          <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12" style="padding-top: 30px;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <legend>Set Up Prices:</legend>                            
                                </h3>
                               
                                <div class="control-group-inline" style="padding-top: 10px;">	
                                    <input type="hidden" name="id" id="id" value="<?php echo $Id ?>">         			
                                    Season <input name="season" type="text" class="span4 required" id="season"  maxlength="50" placeholder="Season" style="width: 50%;" value="<?php echo $seasonName ?>"> 
                                    Date From <input name="dateFrom" type="text" class="span4 required" id="dateFrom"  maxlength="10" placeholder="Date From" style="width: 15%;" value="<?php echo $dateFrom ?>">
                                    Date To <input name="dateTo" type="text" class="span4 required" id="dateTo"  maxlength="10" placeholder="Date To" style="width: 15%;" value="<?php echo $dateTo ?>">
                                </div>
                                <div class="control-group-inline" style="padding-top: 10px;">	
                                    Quantity Room <input name="quantityRoom" type="text" class="span4" id="quantityRoom"  maxlength="10" placeholder="Quantity Room" style="width: 15%;" value="<?php echo $quantityRoom ?>">
									Type <input name="type" type="text" class="span4" id="type"  maxlength="10" placeholder="Type" style="width: 15%;" value="<?php echo $type ?>">
									Price <input name="price" type="text" class="span4 required" id="price"  maxlength="13" placeholder="price" style="width: 15%;" value="<?php echo $price ?>">
									minNights <input name="minNights" type="text" class="span4" id="minNights"  maxlength="10" placeholder="Minimun Nights" style="width: 15%;" value="<?php echo $minNights ?>">
                                </div>
                            </div>
                            <div class="panel-body">
                                
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>     
               
		<div class="control-group" style="padding-top: 10px;">	 
			<button class="btn btn-primary" type="submit" id="enviar">Save</button>
			<a href="price.php?id=<?php echo $villaId;?>">
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
		<strong>MESSAGE!</strong> <span class="textmensaje">This season exist already</span>
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
                The setting price has been upgraded successfully. <br>                
            </div>
            <div class="modal-footer">			
                    <a href = "price.php?id=<?php echo $villaId?>" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                   Ok
                </button> 
                    </a>					
            </div>
        </div>						
    </div>					
 </div>
 

    <!-- .................................... $footer .................................... -->
  <?php   //include "headers/otrofooter.php"; ?>
  
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
