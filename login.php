<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 11; //Activa la opcion del menu actual
include "header.php";
?> 
<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Villas of Luxury Rentals International");
	});
</script>
  
<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formLogin', function(event) {
		event.preventDefault()
		if ($('#formLogin').valid()) {
			$.ajax({
				type: "POST",
				url: "loginProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						document.getElementById('hard').style.display='block';document.getElementById('fade').style.display='block';						
					}
									
					if (respuesta.exito == 1) {										
						window.location.href='index.php'; 							
					}	
					if (respuesta.exito == 2) {
						window.location.href='editvilla.php?id=<?php echo $_SESSION['villaId']?>';
					}
					if (respuesta.exito == 3) {
						window.location.href='villaAdd.php'; 
					}	
					if (respuesta.exito == 4) {
						window.location.href='amenities.php'; 
					}	
					if (respuesta.exito == 5) {
						window.location.href='room.php?id=<?php echo $_SESSION['villaId']?>';
					}
					if (respuesta.exito == 6) {
						window.location.href='imagesOrder.php?id=<?php echo $_SESSION['villaId']?>';
					}	
					if (respuesta.exito == 7) {
						window.location.href='leads.php';
					}	
					if (respuesta.exito == 8) {
						window.location.href='comment.php';
					}
					if (respuesta.exito == 9) {
						window.location.href='price.php?id=<?php echo $_SESSION['villaId']?>';
					}	
					if (respuesta.exito == 10) {
						window.location.href='customers.php';
					}	
				}
			});
		}
	});	

//Metodo para cargar los datos personales
    $("body").on('submit', '#registrarOperador', function(event) {
		event.preventDefault()
		if ($('#registrarOperador').valid()) {
			$.ajax({
				type: "POST",
				url: "registrarProcesar.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';						
					}					
					if (respuesta.error == 2) {
						document.getElementById('light2').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 3) {
						document.getElementById('light3').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 4) {
						document.getElementById('light4').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 5) {
						document.getElementById('light5').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 6) {
						document.getElementById('light6').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 7) {
						document.getElementById('light7').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 8) {
						document.getElementById('light8').style.display='block';document.getElementById('fade').style.display='block';						
					}
					if (respuesta.error == 9) {
						document.getElementById('light9').style.display='block';document.getElementById('fade').style.display='block';						
					}
					
					//if (respuesta.exito == 1) {					  
					  //window.location.href='enviarEmailRegistro.php?email=<?php echo $_SESSION['email']?>'; 
					//}									
				}
			});
		}
	});		    
	
	 $("body").on('submit', '#formRecuperar', function(event) {
	event.preventDefault()
	if ($('#formRecuperar').valid()) {
	    $.ajax({
		type: "POST",
		url: "recuperarProcesar.php",
		dataType: "json",
		data: $(this).serialize(),
		success: function(respuesta) {		    
			if (respuesta.error == 1) {
						document.getElementById('claveRecuperar').style.display='block';document.getElementById('fade').style.display='block';						
			}
			
			  
			  if (respuesta.exito == 1) {
			  $('#claveRecuperar2').show();
			  setTimeout(function() {
			  $('#claveRecuperar2').hide();
			  window.location.href="loginForm.php";
			}, 3000);			  
		    }		    
		}
	    });
	}
	});	 
</script>





 <!-- .................................... $Contenido .................................... -->
 <!-- .................................... $Contact .................................... -->
 
  <section class="section-content section-contact section-color-graylighter">
    <div class="container">
        <div id="loginbox" style="margin-top:100px; margin-left:35%; margin-bottom:auto"  class="mainbox col-md-4 col-md-offset-3 col-sm-8 col-sm-offset-2">     
            <div class="panel panel-info" >
                    <div class="panel-heading" style="background-color: #62cb31; color:white;">
                        <div  align="center" style="font-size: 25px; font-family:Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif " >Login</div>                        
                    </div>     

              <div style="padding-top:30px" class="panel-body" >
                   <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    <form class="form-vertical" id="formLogin">
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input required id="username" type="text" class="form-control" name="username" placeholder="Username"> 
                          </div>
                          <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input required id="password" type="password" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="input-group">
                            <div class="checkbox">
                                <label style="font-size: 90%;">
                                    <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                          </div>
                          <div style="float:right; font-size: 80%; position: relative; top:-10px">
                                <a href="recuperar.php" href="" style="color:#62CB31">
                                    ¿Forgot Password?
                                </a>
                          </div>
                          <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                                <div class="col-sm-12 controls" align="center">
                                  <!--a id="btn-fblogin" href="#" class="btn btn-primary">Iniciar Sesión</a!-->
                                  <button class="btn btn-primary" type="submit" style="margin-bottom: 10px;">Start</button>
                                </div>
                          </div>
                          <div class="form-group">
                                <div class="col-md-12 control">
                                    <div style="border-top: 1px solid#888; padding-top:15px; font-size:14px;" align="center" >
                                        ¿Do you have account? 
                                    <a href="#" onClick="$('#loginbox').hide(); $('#dataOperador').show()" style="color:#62CB31">
                                        Sign in
                                    </a>
                                    </div>
                                </div>
                          </div>                             
                    </form> 
                     <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
                        <button data-dismiss="alert" class="close" type="button">x</button>
                        <strong></strong> <span class="textmensaje">Bienvenido!...</span>
                     </div>
                     <div class="modal" id="hard" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                                    <h4 class="modal-title" id="myModalLabel">
                                        ¡An error has occured!
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    User or password Wrong
                                </div>
                                <div class="modal-footer">			
                                        <a href = "javascript:void(0)" onclick = "document.getElementById('hard').style.display='none';document.getElementById('fade').style.display='none'"> 
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                                       Close
                                    </button> 
                                        </a>					
                                </div>
                            </div>						
                        </div>					
                     </div>
                     
                     

                     
                    
             		<div style="display:none" id="barra"><img src="img/barra.gif" alt="Cargando..."/><br>Processing....</div>	
             </div>                     
          </div>  
        </div>
        
<section id="dataOperador" style="display:none">
        <div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" style="margin-top: 70px;" >
                    <div style="font-size:20px; text-align:center;">Sign in</div>
                    <div class="panel panel-info">                                            
                        <div class="panel-heading" style="background-color:#99CA3D; color:white;">
                            		<div class="panel-title">Access information:</div>                          
                        </div> 
                            <div class="panel-body" >
                                <form class="form-vertical" id="registrarOperador">
                                    <div id="signupalert" style="display:none" class="alert alert-danger">
                                        <p>Error:</p>
                                        <span></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="usuario" class="col-md-3 control-label"><strong>Username:</strong></label>
                                        <div class="col-md-12">
                                            <input required type="text" class="form-control" name="username" placeholder="Username">
                                        </div>
                                    </div>
                                        
                                    <div class="form-group">
                                        <label for="clave" class="col-md-3 control-label"><strong>Password:</strong></label>
                                        <div class="col-md-12">
                                            <input required type="password" class="form-control" name="clave" placeholder="Password">
                                        </div>
                                    
                                        <label for="clave2" class="col-md-6 control-label"><strong>Password confirmation:</strong></label>
                                        <div class="col-md-12">
                                            <input required type="password" class="form-control" name="clave2" placeholder="Password confirmation">
                                        </div>
                                    </div>
                             </div>
                                <div class="panel-heading" style="background-color:#99CA3D; color:white;">
                            		<div class="panel-title">Contact data:</div>                            
                        		</div> 
                             <div class="panel-body" >                                
                                <div class="form-group">
                                    <label for="Nombres" class="col-md-3 control-label">Name:</label>
                                    <div class="col-md-12">
                                        <input required  type="text" class="form-control" name="Nombres" placeholder="Name">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="Apellidos" class="col-md-3 control-label">Last Name:</label>
                                    <div class="col-md-12">
                                        <input required  type="text" class="form-control" name="Apellidos" placeholder="Last Name">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Email" class="col-md-3 control-label">Email:</label>
                                    <div class="col-md-12">
                                        <input required type="email" class="form-control" name="Email" placeholder="Email">
                                    </div>
                                
                                    <label for="Email2" class="col-md-6 control-label">Email Confirmation:</label>
                                    <div class="col-md-12">
                                        <input required type="email" class="form-control" name="Email2" placeholder="Email Confirmation">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-12" align="center">                              
                                        <button onclick="$('#dataOperador').hide(); $('#loginbox').show()" type="button" class="btn btn-default" style="background-color:#99CA3D; color:white; margin:6px;">
                                            Cancel
                                        </button> 
                                        <button type="submit" class="btn btn-primary" style="margin:6px;">
                                            Ok 
                                        </button>  

                                    </div>
                                </div>                     	
                            </form>
              <div class="alert alert-success mensaje_form" style="display: none" id="mensaje22">
                <button data-dismiss="alert" class="close" type="button">x</button>
                <strong></strong> <span class="textmensaje">Generating record!...</span>
			 </div>
			 
                
              <div class="modal" id="light2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                            <h4 class="modal-title" id="myModalLabel">
                                ¡An error has occured!
                            </h4>
                        </div>
                        <div class="modal-body">
                            Passwords must be the same.
                        </div>
                        <div class="modal-footer">			
                                <a href = "javascript:void(0)" onclick = "document.getElementById('light2').style.display='none';document.getElementById('fade').style.display='none'"> 
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                               Close
                            </button> 
                                </a>					
                        </div>
                    </div>						
                </div>					
             </div>
             
             <div class="modal" id="light3" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                            <h4 class="modal-title" id="myModalLabel">
                                ¡An error has occured!
                            </h4>
                        </div>
                        <div class="modal-body">
                            Passwords must have more than 6 characters
                        </div>
                        <div class="modal-footer">			
                                <a href = "javascript:void(0)" onclick = "document.getElementById('light3').style.display='none';document.getElementById('fade').style.display='none'"> 
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                               Close
                            </button> 
                                </a>					
                        </div>
                    </div>						
                </div>					
             </div>
             
             <div class="modal" id="light4" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                            <h4 class="modal-title" id="myModalLabel">
                                ¡An error has occured!
                            </h4>
                        </div>
                        <div class="modal-body">
                            Email must be the same.
                        </div>
                        <div class="modal-footer">			
                                <a href = "javascript:void(0)" onclick = "document.getElementById('light4').style.display='none';document.getElementById('fade').style.display='none'"> 
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                               Close
                            </button> 
                                </a>					
                        </div>
                    </div>						
                </div>					
             </div>	
                 
             <div class="modal" id="light6" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                            <h4 class="modal-title" id="myModalLabel">
                                ¡An error has occured!
                            </h4>
                        </div>
                        <div class="modal-body">
                        	User or email is already registered
                        </div>
                        <div class="modal-footer">			
                                <a href = "javascript:void(0)" onclick = "document.getElementById('light6').style.display='none';document.getElementById('fade').style.display='none'"> 
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                               Close
                            </button> 
                                </a>					
                        </div>
                    </div>						
                </div>					
             </div>	
             
                          
				<div class="modal" id="light7" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style="background-color:#99CA3D; color:black;">	
								<h4 class="modal-title" id="myModalLabel">
									¡Update Completed!
								</h4>
							</div>
							<div class="modal-body">
								You have successfully edit a lead. <br>                               
							</div>
							<div class="modal-footer">			
                                    <a href = "login.php" onclick = "document.getElementById('light7').style.display='none';document.getElementById('fade').style.display='none'"> 
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                   Ok
								</button> 
									</a>					
							</div>
						</div>						
					</div>					
				 </div>
                 
                 <div class="modal" id="light8" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style="background-color:#99CA3D; color:black;">	
								<h4 class="modal-title" id="myModalLabel">
									¡Update Completed!
								</h4>
							</div>
							<div class="modal-body">
								You have successfully edit a comment. <br>                               
							</div>
							<div class="modal-footer">			
                                    <a href = "login.php" onclick = "document.getElementById('light7').style.display='none';document.getElementById('fade').style.display='none'"> 
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                   Ok
								</button> 
									</a>					
							</div>
						</div>						
					</div>					
				 </div>
                 
                 <div class="modal" id="light9" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style="background-color:#99CA3D; color:black;">	
								<h4 class="modal-title" id="myModalLabel">
									¡Update Completed!
								</h4>
							</div>
							<div class="modal-body">
								You have successfully edit a price. <br>                               
							</div>
							<div class="modal-footer">			
                                    <a href = "login.php" onclick = "document.getElementById('light7').style.display='none';document.getElementById('fade').style.display='none'"> 
                                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                                   Ok
								</button> 
									</a>					
							</div>
						</div>						
					</div>					
				 </div>
                
             <div style="float:left; display:none" id="barra"><img src="img/barra.gif" alt="Cargando..."/><br>Processing....</div>
          </div>
        </div>         	
      </div> 
      </section>

    </div>
  </section>

    <!-- .................................... $footer .................................... -->
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