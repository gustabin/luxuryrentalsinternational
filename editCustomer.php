<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 3; //Activa la opcion del menu actual
//$villaId=$_GET["id"];
$Id=$_GET["id"];
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='editCustomer';  
include "header.php";
?> 
  <!--script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script!-->



<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Customers of Luxury Rentals International");
	});
</script>

      
<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formVilla', function(event) {
		event.preventDefault()
		if ($('#formVilla').valid()) {			
			$.ajax({
				type: "POST",
				url: "editCustomerProcesar.php",
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

 <?php	//console.log("llega");			
		$queryDetail = ("SELECT * FROM staff WHERE staffid='$Id'");
		$resultadoDetail=mysql_query($queryDetail,$dbConn);				
		while($data_cust=mysql_fetch_array($resultadoDetail))
				{								
				$name = $data_cust['name'];
				$lastname = $data_cust['lastname'];
				$username = $data_cust['username'];  
				$email = strtolower($data_cust['email']);		
				$phone = $data_cust['phone'];  
				$address = $data_cust['address'];  
				$city = $data_cust['city'];  
				$state = $data_cust['state'];  
				$country = $data_cust['country'];   
				$clave = $data_cust['clave'];  
				$usuario = $data_cust['usuario'];  
				$fecha = $data_cust['fecha'];  
				$adult = $data_cust['adult'];  
				$children = $data_cust['children']; 
				$age1 = $data_cust['age1']; 
				$age2 = $data_cust['age2']; 
				$age3 = $data_cust['age3']; 
				$age4 = $data_cust['age4']; 	
				}									
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
	?>
<!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 150px; padding-bottom: 10px;">
    <div class="container">
      <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Edit        
         <small>customer</small>              
      </h2>
      <a href='customers.php'>
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
                            <legend>Customer:</legend>                            
                        </h3>
                       
                        <div class="control-group-inline" style="padding-top: 10px;">	
                            <input type="hidden" name="id" id="id" value="<?php echo $Id ?>">         			
                            Name <input name="name" type="text" class="span4 required" id="name"  maxlength="50" placeholder="name" style="width: 30%;" value="<?php echo $name ?>"> &nbsp;                           
                            Lastname    <input name="lastname" type="text" class="span4 required" id="lastname"  maxlength="50" placeholder="lastname" style="width: 30%;" value="<?php echo $lastname ?>">                   
                   <br><br>  
                   
                   
                   Username  <input name="username" type="text" class="span4 required" id="username"  maxlength="80" placeholder="username" style="width: 15%;" value="<?php echo $username ?>">
                    &nbsp;	&nbsp;
                    
                   Email <input name="email" type="text" class="span4 required" id="email"  maxlength="70" placeholder="email" style="width: 25%;" value="<?php echo $email ?>">  
                   &nbsp;	&nbsp;
                   
                   Phone <input name="phone" type="text" class="span4 required" id="phone"  maxlength="70" placeholder="phone" style="width: 15%;" value="<?php echo $phone ?>">  
                   <br><br>
                   
                   
                   
                   Address <input name="address" type="text" class="span4 required" id="address"  maxlength="70" placeholder="address" style="width: 38%;" value="<?php echo $address ?>">  
                   &nbsp;	&nbsp;
                   City <input name="city" type="text" class="span4 required" id="city"  maxlength="70" placeholder="city" style="width: 15%;" value="<?php echo $city ?>">  
                   &nbsp;	&nbsp;
                   State <input name="state" type="text" class="span4 required" id="state"  maxlength="70" placeholder="state" style="width: 5%;" value="<?php echo $state ?>">  
                   &nbsp;	&nbsp;
                   Country <input name="country" type="text" class="span4 required" id="country"  maxlength="70" placeholder="country" style="width: 20%;" value="<?php echo $country ?>">                     
                   <br><br>
                   
                  
                   Fecha <input disabled name="fecha" type="text" class="span4" id="fecha"  maxlength="70" placeholder="fecha" style="width: 15%;" value="<?php echo $fecha ?>">  
                   &nbsp;	&nbsp;
                   Adult <input name="adult" type="text" class="span4 required" id="adult"  maxlength="70" placeholder="adult" style="width: 2%;" value="<?php echo $adult ?>">  
                   &nbsp;	&nbsp;
                   Children <input name="children" type="text" class="span4" id="children"  maxlength="70" placeholder="children" style="width: 2%;" value="<?php echo $children ?>">  
                   &nbsp;	&nbsp;
                   Age #1 <input name="age1" type="text" class="span4" id="age1"  maxlength="70" placeholder="age1" style="width: 2%;" value="<?php echo $age1 ?>">  
                   &nbsp;	&nbsp;
                   Age #2 <input name="age2" type="text" class="span4" id="age2"  maxlength="70" placeholder="age2" style="width: 2%;" value="<?php echo $age2 ?>">  
                   &nbsp;	&nbsp;
                   Age #3 <input name="age3" type="text" class="span4" id="age3"  maxlength="70" placeholder="age3" style="width: 2%;" value="<?php echo $age3 ?>">  
                   &nbsp;	&nbsp;
                   Age #4 <input name="age4" type="text" class="span4" id="age4"  maxlength="70" placeholder="age4" style="width: 2%;" value="<?php echo $age4 ?>">  
                   
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
			<a href="customers.php?id=<?php echo $villaId;?>">
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
		<strong>MESSAGE!</strong> <span class="textmensaje">We have a problem saving data</span>
	 </div>
     
     <div class="alert alert-danger mensaje_form" style="display: none" id="error2">
		<button data-dismiss="alert" class="close" type="button">x</button>
		<strong>MESSAGE!</strong> <span class="textmensaje">This customer exist already</span>
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
                The customer has been upgraded successfully. <br>                
            </div>
            <div class="modal-footer">			
                    <a href = "customers.php" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
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