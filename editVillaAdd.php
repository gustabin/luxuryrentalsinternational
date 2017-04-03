<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
//$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "header.php";
?> 
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
				url: "editVillaProcesar.php",
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
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 150px; padding-bottom: 10px;">
    <div class="container">
      <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Villa
        <small>Features</small>                
      </h2>
      <a href='propertylist.php'>
      	<button type="button" class="btn-main"><i class="fa fa-reply" aria-hidden="true"></i> Back to list </button>
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
  	<form class="form-vertical" id="formVilla" action="">    
		<div class="control-group-inline" style="padding-top: 10px;">	        	   			
		  Villa Name <input name="villaName" type="text" class="span4 required" id="villaName"  maxlength="100" placeholder="villa Name" style="width: 97%;" >
        </div>
        <div class="control-group" style="padding-top: 10px;">	 
          Description  <textarea name="description" type="text" class="span4 required" id="description"  maxlength="4000" placeholder="description" style="width: 97%;" cols="45" rows="5"></textarea>
        </div>
        <div class="control-group" style="padding-top: 10px;">	 
          Polices  <textarea name="polices" type="text" class="span4" id="polices"  maxlength="4000" placeholder="polices" style="width: 97%;" cols="45" rows="15"></textarea>
        </div>
        <div class="control-group-inline" style="padding-top: 10px;">	  
            Longitud <input name="longitud" type="text" class="span4" id="longitud" style="width: 30%;" placeholder="longitud" maxlength="20">
			Latitud  <input name="latitud"  type="text" class="span4" id="latitud"  style="width: 30%;" 
 placeholder="latitud" maxlength="20">
        </div>   
        <div class="control-group-inline" style="padding-top: 10px;">	 
            Price from <input name="pricefrom" type="text" class="span4 required" id="pricefrom"  maxlength="5" placeholder="price from" style="width: 10%;">
            Price to <input name="priceto" type="text" class="span4 required" id="priceto"  maxlength="5" placeholder="price to" style="width: 10%;">        	
        </div>
        <div class="control-group-inline" style="padding-top: 10px;">            
        	City <input name="city" type="text" class="span4" id="city"  maxlength="60" placeholder="city" style="width: 30%;">
        </div>
        <div class="control-group-inline" style="padding-top: 10px;">	 
	  		Quantity room <input name="quantityroom" type="text" class="span4 required" id="quantityroom"  maxlength="3" placeholder="quantityroom" style="width: 10%;">
            Quantity bathroom <input name="quantitybath" type="text" class="span4 required" id="quantitybath"  maxlength="3" placeholder="quantitybath" style="width: 10%;">                     
		</div>	
        <div class="control-group-inline" style="padding-top: 10px;">		  		
            Path villa <input name="pathVilla" type="text" class="span4" id="pathVilla"  maxlength="100" placeholder="pathVilla" style="width: 97%;">            
		</div>	
        <div class="control-group-inline" style="padding-top: 10px;">	 
	  		Swimming Pool <input name="swimmingPool" type="text" class="span4" id="swimmingPool"  maxlength="20" placeholder="swimming Pool" style="width: 10%;">                     
		</div>
        <div class="control-group-inline" style="padding-top: 10px;">	 	  		
            Season <input name="season" type="text" class="span4" id="season"  maxlength="15" placeholder="season" style="width: 25%;">
            Season date from <input name="seasondatefrom" type="text" class="span4" id="seasondatefrom"  maxlength="10" placeholder="season date from" style="width: 10%;">
            Season date to <input name="seasondateto" type="text" class="span4" id="seasondateto"  maxlength="10" placeholder="season date to" style="width: 10%;">            
		</div>
        <div class="control-group-inline" style="padding-top: 10px;">	 
	  		Defined room <input name="definedroom" type="text" class="span4" id="definedroom"  maxlength="20" placeholder="definedroom" style="width: 20%;">
            Price <input name="price" type="text" class="span4" id="price"  maxlength="5" placeholder="price" style="width: 5%;">
            Price type <input name="pricetype" type="text" class="span4" id="pricetype"  maxlength="20" placeholder="pricetype" style="width: 20%;">
            Minimum ent <input name="minimument" type="text" class="span4" id="minimument"  maxlength="2" placeholder="minimument" style="width: 10%;">            
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
                    ¡Record added!
                </h4>
            </div>
            <div class="modal-body">
                The villa has been recorded successfully. <br>                
            </div>
            <div class="modal-footer">			
                    <a href = "propertylist.php" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
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