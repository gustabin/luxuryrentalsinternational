<?php 
session_start();
error_reporting(0);
$_SESSION['valor'] = 5; //Activa la opcion del menu actual
require_once('tools/mypathdb.php');
$amenitieId=$_GET["id"];
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='amenitieslist';  
$_SESSION['amenitieId']=$amenitieId;  
include "header.php";
?> 
 

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
				url: "editAmenityProcesar.php",
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
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 150px; padding-bottom: 10px;">
    <div class="container">
      <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Amenity
        <small></small>                
      </h2>
      <a href='amenitieslist.php'>
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
    <?php
		//$villaId= $_GET["villaId"];
		$queryDetail = ("SELECT * FROM amenitie WHERE amenitieid='$amenitieId'");	
		
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
				{
				$description = $dataDetail['description'];	
				$category = $dataDetail['category'];						
				}		
		mysql_free_result($resultadoDetail); // Liberamos los registros							
		mysql_close(); //desconectar();
	?>
   
    <form class="form-vertical" id="formVilla" action="">    
	    
  <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" style="padding-top: 30px;">
                    <div class="panel panel-default" align="center">
                        <div class="panel-heading">                        
                            <h3 class="panel-title">
                                <legend></legend>
                            </h3>
                            <div class="control-group-inline" style="padding-top: 10px;">	
                            <input type="hidden" name="amenitieId" id="amenitieId" value="<?php echo $amenitieId ?>">
                               Description: <input name="description" type="text" class="span4 required" id="description"  maxlength="70" placeholder="description" style="width: 40%;" value="<?php echo $description ?>">
                               Category: <input name="category" type="text" class="span4 required" id="category"  maxlength="10" placeholder="category" style="width: 10%;" value="<?php echo $category ?>">
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
			<a href="amenitieslist.php">
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
                The amenity has been upgraded successfully. <br>                
            </div>
            <div class="modal-footer">			
                    <a href = "amenitieslist.php" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
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