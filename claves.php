<?php 
session_start(); 
error_reporting(0);
include "header.php"; 
//include "menuSite.php" 
include "menuSiteFavorites.php";

?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!--script src="js3/jquery.ui.datepicker.js"></script!-->

<script src="js/jquery.validate.js"></script>

<script language="JavaScript" type="text/JavaScript">		
   //Metodo para cargar el formulario 
    $("body").on('submit', '#formContacto', function(event) {
		event.preventDefault()
		if ($('#formContacto').valid()) {
			$.ajax({
			type: "POST",
			url: "clave_Procesar.php",
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
				  $('#mensaje').show();
				  setTimeout(function() {
				  $('#mensaje').hide();
				}, 3000);
				  /*window.location.href='emailContacto_Procesado.php';*/
				}			    
			}
	    });
	}
	});		
</script>	
<body data-spy="scroll" data-target=".navbar" data-offset="61">
<div>&nbsp;</div>
<div>&nbsp;</div>
<!-- Comernzar desde aqui -->
	<!-- Start Body -->
	<div class="container">
        <div class="row">
        	<div class="aboutus">
				<img src="img/keywords.jpg" width="1097" height="470" alt=""/><br><br>
				<br>
				<!--- Contacto ---->   
				<div class="col-md-12">                	
                    <section id="areaForm">			
                        <div class="container-fluid">
							<fieldset style="text-align:center">
                            
								 <form data-toggle="validator" class="form-horizontal" role="form" id="formContacto"  enctype="multipart/form-data"  >
								   <font color="#000000">Keyword</font><br>
									 <div class="form-group" style="margin-left:0px">			    						
										<input name="clave" type="text" id="clave" style="color:#000; padding:6px; width: 500px;" required placeholder="keyword">
									 </div>	
									 <br>									 
									 <div style="margin-top: 30px; margin-bottom: 40px;">
									 <button type="submit"  style="background-color:#132b49; border-radius:3px; width: 200px; padding: 10px;" class="btn btn-default">Submit</button>                			
											&nbsp;
										  <button type="reset" class="btn btn-primary" style="background-color:#132b49; border-radius:3px; width: 190px; padding: 10px;">Reset</button>
										  </div>
                                          <div class="alert alert-success mensaje_form" style="display: none" id="mensaje">
                                            <button data-dismiss="alert" class="close" type="button">x</button>
                                            <strong>ALERTA!</strong> <span class="textmensaje">Registro exitoso </span>
                                         </div>
								 </form>
                                 
							</fieldset>
						</div>
					</div>
				</section>
				
			</div>
   	  </div>
    </div>
                     
<!-- End Body -->
<!-- Terminar aqui -->
<?php include "footer.php"; ?>