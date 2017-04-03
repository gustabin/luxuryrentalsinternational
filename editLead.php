<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 10; //Activa la opcion del menu actual
$Id=$_GET["id"];
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='editLead';  
$_SESSION['villaId']=$villaId;  
include "header.php";
?> 
  <!--script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script!-->


<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Leads of Luxury Rentals International");
	});
</script>


<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formLeads', function(event) {
		event.preventDefault()
		if ($('#formLeads').valid()) {
			$.ajax({
				type: "POST",
				url: "editLeadProcesar.php",
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


<!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 75px; padding-bottom: 10px;">
    <div class="container">
      <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Leads
        <small>information</small>                
      </h2>
      <a href='leads.php'>
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
    <?php
		$queryDetail = ("SELECT * FROM tbl_lead WHERE Id='$Id'");			
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($data_his=mysql_fetch_array($resultadoDetail))
							{							
							$name = $data_his['fullName'];	
							$phone = $data_his['phone'];
							$email = $data_his['email'];
							$desde = $data_his['desde'];  
							$hasta = $data_his['hasta'];  
							$destination = $data_his['destination'];  
							$anythingelse = $data_his['anythingelse'];  
							$size = $data_his['size'];  
							$bedrooms = $data_his['bedrooms'];  
							$bathrooms = $data_his['bathrooms'];  
							$amenities = $data_his['amenities'];  
							$photo = $data_his['photo'];  
							$term = $data_his['term'];  
							$fecha = $data_his['fecha'];  
							$villaId = $data_his['villaId'];  	
							$tipo = $data_his['tipo']; 			
							}		
		mysql_free_result($resultadoDetail); // Liberamos los registros							
		mysql_close(); //desconectar();		
	?>
   <form class="form-vertical" id="formLeads" action="">    
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12" style="padding-top: 30px;">
			<div class="panel panel-default">
				<div class="panel-heading">	
                <input type="hidden" id="Id" name="Id" value="<?php echo $Id ?>">				 
                    Full name <input name="name" type="text" class="span4" id="address"  maxlength="60" placeholder="Full name" style="width: 20%;" value="<?php echo $name ?>">                   		
                   &nbsp; &nbsp;
                    Phone    <input name="phone" type="text" class="span4" id="phone"  maxlength="50" placeholder="phone" style="width: 10%;" value="<?php echo $phone ?>">
                     &nbsp; &nbsp;
                    Email  <input name="email" type="text" class="span4" id="email"  maxlength="80" placeholder="email" style="width: 25%;" value="<?php echo $email ?>">
                    &nbsp;	&nbsp;
                    Fecha <input name="fecha" type="text" class="span4" id="fecha"  maxlength="70" placeholder="fecha" style="width: 20%;" value="<?php echo $fecha ?>">  
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
                    <div class="control-group-inline" style="padding-top: 10px;">	 
                    Destination <input name="destination" type="text" class="span4" id="destination"  maxlength="40" placeholder="destination" style="width: 15%;" value="<?php echo $destination ?>">
                     &nbsp; &nbsp;
                    From <input name="desde" type="text" class="span4" id="desde"  maxlength="10" placeholder="From" style="width: 10%;" value="<?php echo $desde ?>">
                     &nbsp; &nbsp;
                    To <input name="hasta" type="text" class="span4" id="hasta"  maxlength="10" placeholder="To" style="width: 10%;" value="<?php echo $hasta ?>">
                    &nbsp; &nbsp;
                    Bedrooms <input name="bedrooms" type="text" class="span4" id="bedrooms"  maxlength="3" placeholder="bedrooms" style="width: 7%;" value="<?php echo $bedrooms ?>">
                    &nbsp; &nbsp;
                    Bathrooms <input name="bathrooms" type="text" class="span4" id="bathrooms"  maxlength="3" placeholder="bathrooms" style="width: 7%;" value="<?php echo $bathrooms ?>">                        
		</div>	
				</div>
				<div class="panel-body">
					
				</div>
				<div class="panel-heading">					
					<div class="control-group-inline" style="padding-top: 10px;">	 
                        Size <input name="size" type="text" class="span4" id="size"  maxlength="5" placeholder="size" style="width: 10%;" value="<?php echo $size ?>">
                        &nbsp; &nbsp;                        
                        Anything else <input name="anythingelse" type="text" class="span4" id="anythingelse"  maxlength="400" placeholder="anything else" style="width: 70%;" value="<?php echo $anythingelse ?>">     	
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
                    <div class="control-group-inline" style="padding-top: 10px;">		  		
                        Amenities <input name="amenities" type="text" class="span4" id="amenities"  maxlength="100" placeholder="amenities" style="width: 30%;" value="<?php echo $amenities ?>">            
                      	&nbsp;	&nbsp;
                        Term <input name="term" type="text" class="span4" id="term"  maxlength="50" placeholder="term" style="width: 15%;" value="<?php echo $term ?>">     
                      	&nbsp;	&nbsp;
                        VillaId <input name="villaId" type="text" class="span4" id="villaId"  maxlength="3" placeholder="villaId" style="width: 10%;" value="<?php echo $villaId ?>">           
                      	&nbsp;	&nbsp; 
                        Type Contact <input name="tipo" type="text" class="span4" id="tipo"  maxlength="10" placeholder="" style="width: 10%;" value="<?php echo $tipo ?>">           
                      	&nbsp;	&nbsp;                        
                    </div>
				</div>				
		</div>
	</div>
</div>

        <div class="control-group" style="padding-top: 10px;">	 
			<button class="btn btn-primary" type="submit" id="enviar">Save</button>
			<a href="leads.php">
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
		<strong>MESSAGE!</strong> <span class="textmensaje">This lead exist already</span>
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
                The lead has been upgraded successfully. <br>                
            </div>
            <div class="modal-footer">	            		
                    <a href = "editLead.php?id=<?php echo $Id ?>" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
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