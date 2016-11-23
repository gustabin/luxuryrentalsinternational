<?php 
session_start(); 
require_once('tools/mypathdb.php');  
include "tools/class.php"; 
error_reporting(0);
include "header.php"; 
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!--script src="js3/jquery.ui.datepicker.js"></script!-->

<script src="js/datepiker-es.js"></script>
<script src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jqombo.js"></script>

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
			  $('#bannerInferior').hide();
			  $('#bannerInferiorExitoso').show();			  			  			  
			  window.location.href='http://www.oikosplus.com/luxury/enviarEmail.php?Page=index&Id=<?php echo $_SESSION["Id"]?>';
			  //window.location.href='enviarEmail.php?Page=index&Id=<?php echo $_SESSION["Id"]?>';
		    }			    
		}
	    });
	}
	});
		
		});
</script>	
<script language="JavaScript" type="text/JavaScript">		
		$(document).ready(function() {			
		    //Metodo para cargar el formulario 
    $("body").on('submit', '#formSearch', function(event) {
	event.preventDefault()
	if ($('#formSearch').valid()) {
	    $.ajax({
		type: "POST",
		url: "formSearch_Process.php",
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
			 // $('#bannerInferior').hide();
			 // $('#bannerInferiorExitoso').show();			  			  
			  window.location.href='vacation.php';
		    }			    
		}
	    });
	}
	});
		
		});
</script>	
	
	<style>
	/*VALIDACIONES*/
input.error {
    background-color: #EAF3F8;
    border: 1px solid #ED4747;
}

td.field input.error, td.field select.error, tr.errorRow td.field input, tr.errorRow td.field select, td.field textarea.error {
    background-color: #EAF3F8;
    border: 1px solid #ED4747;
    color: red;
    margin: 0;
}
.tdtextarea.error{
    background-color: #EAF3F8;
    border: 1px solid #ED4747;
    color: red;
    margin: 0;
}

.span_required{
    font-size: 20px;
    color: red;
    font: bold;
}
text-align: -moz-center;
text-align: -webkit-center;
	</style>
<style>
/* Custom, iPhone Retina */ 
@media(max-width:320px){
    
}
@media only screen and (min-width : 320px) {
    
}
/* Extra Small Devices, Phones */ 
@media only screen and (min-width : 480px) {
   .nav a {
		color: white;
	}
	.navbar-default {
		background-color: white;
	}
}


/* Small Devices, Tablets */
@media only screen and (min-width : 917px) {   
	
}
</style>    
	<body data-spy="scroll" data-target=".navbar" data-offset="61">
	<!-- Start preloader -->
		<div class="preloader">
			<div class="spinner">
				<div class="bounce1"></div>
				<div class="bounce2"></div>
				<div class="bounce3"></div>
			</div>
		</div>
	<!-- End preloader -->
<!-- menu -->
<?php  include "menu.php"; ?>
<!-- End menu -->

	<!-- Start intro -->
		<section id="intro" class="parallax" data-start="background-position: 50% -10px;" data-100p="background-position: 50% 60px;">
			<div class="section-overlay">
				<div class="float-content">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div id="carousel-intro" class="carousel">
									<div class="text-center">
										<div class="active item">
											<h4 class="smoke">Select a Destination</h4>
											<h2 class="text-uppercase light">Where will you go next?</h2>                                            	
                                            <div class="caption">
                            				<a href="#vacation">	<button type="submit" class="btn btn-default" style="width:150px; height:40px">Get started</button>		</a>
                        					</div>									
										</div>
										<div class="item">
											<h4 class="smoke">Concierge service for special requests and desires</h4>
											<h2 class="text-uppercase light">What's your Dream Vacation?</h2>
											<div class="caption">
                            					<a href="#vacation"><button type="submit" class="btn btn-default" style="width:150px; height:40px">Get started</button>		</a>
                        					</div>	
										</div>
										<div class="item">
											<h4 class="smoke">All our villas need to pass a rigorous inspection</h4>
											<h2 class="text-uppercase light"> No unwanted surprises!</h2>
											<div class="caption">
                            				<a href="#vacation"><button type="submit" class="btn btn-default" style="width:150px; height:40px">Get started</button>		</a>
                        					</div>	
										</div>
										<div class="item">
											<h4 class="smoke">Our Partner: Luxury Estates</h4>
											<h2 class="text-uppercase light">Looking for longterm rentals and real estate?</h2>
											<div class="caption">
                            					<a href="http://www.luxuryestatespr.com"><button type="submit" class="btn btn-default" style="width:150px; height:40px">Take me there</button></a>		
                        					</div>	
										</div>
										<div class="item">
											<h4 class="smoke">Don't feel like browsing?</h4>
											<h2 class="text-uppercase light">Tell us what you need and we'll do it for you!</h2>
											<div class="caption">
                            					<a href="#bannerInferior"><button type="submit" class="btn btn-default" style="width:150px; height:40px">Contact Us</button>		</a>
                        					</div>	                                    
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<!-- End intro -->

	<style>
.form-vertical select {padding:12px; width:200px; text-align:center; }

.form-vertical input, .form-vertical textarea, .form-vertical select  { 
	/*color:#d45252; */
	color:#000; 
    border:1px solid #aaa;
    box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
    border-radius:5px;
}
</style>
  		<section id="vacation" class="orange-bg">
			<div class="container">
				<div class="row divide-md2">
					<div class="col-sm-12 divide-md3 text-center">						
						<div class="panel2" style="border-color:#ED8000">
                              <div class="panel-heading" style="background-color:#ED8000; border-color:#ED8000;">
                                <h2 style="color:#FFF">Find your luxury villa</h2>
                              </div>
                              <div class="panel-body" style="background-color:#ED8000; margin-bottom:-30px;">
                                 <!-- ajax Location !-->                                                        
                                    <form class="form-vertical" id="formSearch">	
                                        <div class="control-group">
                                            <?php 
                                            if (!empty($_SESSION['id'])){
                                            ?>	
                                                <?php  JCombo::estado_seleccionado(); ?>                                                                       
                                                <input name="ciudadSeleccionada" type="text" id="ciudadSeleccionada" disabled="disabled" value="<?php echo $ciudad; ?>" style="width: 190px;">        
                                            <?php
                                            } else {
                                            ?>
                                                <?php JCombo::ver_estados(); ?>
                                                <span id="ciudadesCombo"> </span>                                                
                                            <?php    
                                            }											
                                            ?>          
                                            <select name="bedrooms" id="bedrooms" style="width: 135px;">
                                              <option value="">Bedrooms</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4+</option>
                                            </select>
                                            <select name="bathrooms" id="bathrooms" style="width: 135px;">
                                              <option value="">Bathrooms</option>
                                              <option value="1">1</option>
                                              <option value="2">2</option>
                                              <option value="3">3</option>
                                              <option value="4">4+</option>
                                            </select>
                                             <span class="caption">                                      
                                        	<button type="submit" class="btn btn-default">&nbsp; Search</button>
                                        </span>  
                                          </div>
                                                 
                                     </form> <!--cierre del formulario !-->
                				 <!-- fin ajax Location !-->                                 
                              </div>
                        </div>
					</div>
				</div>
			</div>
		</section>




<style>
/* unvisited link */
.thumbnail a:link {
    color: black;
}

/* visited link */
.thumbnail a:visited {
    color: #252525;
}

/* mouse over link */
.thumbnail a:hover {
    color: #214B7F;
}

/* selected link */
.thumbnail a:active {
    color: #ED8000;
}
</style>

    <!-- Featured Villas -->
        
      <div class="container-fluid" id="tourpackages-carousel">    
          <div class="col-sm-12 divide-md4 text-center">	<br><br><br>					
                        <h2 style="color:#132b49; font-weight:lighter; margin-top:30px;">Featured villas</h2>
          </div>
        
      <div class="row">    
          <div class="col-md-1">
             &nbsp; 
          </div>
         <div class="col-xs-18 col-sm-6 col-md-5">
          <div class="thumbnail">
            <a href="villa.php?villaId=4"><img class="img-responsive" src="img/aqualina.jpg" alt="">
              <div class="caption">
                  <div class="row">
                        <div style="margin-left: 15px; margin-top: 15px;">						
							<h3>Villa Aqualina at Dorado Beach Resort</a></h3>                             
                            </div> <div class="col-md-6">
                            <p>Dorado , Puerto Rico<br>
                            Starting at $600</p>                        
                    	</div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="villa.php?villaId=4"><button type="submit" class="btn btn-default">View Villa</button></a>
                            <a href="goFavorites.php?VillaId=4">
                                <?php
    //*********************Buscar si ya existe esa villa en la tabla temporal ***************************
	$email = $_SESSION['email'];
	$query =  mysql_query("SELECT * FROM tbl_temporal WHERE email='".$email."' AND VillaId = 4");	
	$dataTemporal = mysql_fetch_array($query);		
	
	
		if(!empty($dataTemporal)) {
	?>
			<button type="submit" class="btn btn-default" style="background-color:#ED8000">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
    	} else {
	?>
			<button type="submit" class="btn btn-default">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
		}
		mysql_free_result($dataTemporal); // Liberamos los registros
	?>
                            </a>
                        </div>
            		</div>
          		</div>
        	</div>
           </div>
         
          <div class="col-xs-18 col-sm-6 col-md-5">
          <div class="thumbnail">
            <a href="villa.php?villaId=7"><img class="img-responsive" src="img/clara.jpg" alt="">
              <div class="caption">
                  <div class="row">
                        <div style="margin-left: 15px; margin-top: 15px;">
						  <h3>Villa Clara at the Dorado Beach Resort</a></h3>                            
                          </div><div class="col-md-6">
                           <p>Dorado , Puerto Rico<br>
                           Starting at $450</p>                        
                    	</div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="villa.php?villaId=7"><button type="submit" class="btn btn-default">View Villa</button></a>
                            <a href="goFavorites.php?VillaId=7">
                                <?php
    //*********************Buscar si ya existe esa villa en la tabla temporal ***************************
	$email = $_SESSION['email'];
	$query =  mysql_query("SELECT * FROM tbl_temporal WHERE email='".$email."' AND VillaId = 7");	
	$dataTemporal = mysql_fetch_array($query);		
	
	
		if(!empty($dataTemporal)) {
	?>
			<button type="submit" class="btn btn-default" style="background-color:#ED8000">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
    	} else {
	?>
			<button type="submit" class="btn btn-default">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
		}
		mysql_free_result($dataTemporal); // Liberamos los registros
	?>
                            </a>
                        </div>
            		</div>
          		</div>
        	</div>
           </div>
            <div class="col-md-1">
             &nbsp; 
          </div>

      </div><!-- End row -->
    </div><!-- End container -->
    
    
    <div class="container-fluid" id="tourpackages-carousel">      
      <div class="row">
       <div class="col-md-1">
             &nbsp; 
       </div>
       <div class="col-xs-18 col-sm-6 col-md-5">
          <div class="thumbnail">
            <a href="villa.php?villaId=8"><img class="img-responsive" src="img/encanto.jpg" alt="">
              <div class="caption">
                  <div class="row">
                        <div style="margin-left: 15px; margin-top: 15px;">
                           <h3>Villa Encanto at the Dorado Beach Resort</a></h3>
                           </div><div class="col-md-6">
                            <p>Dorado , Puerto Rico<br>
                            Starting at $600</p>                        
                    	</div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="villa.php?villaId=8"><button type="submit" class="btn btn-default">View Villa</button></a>
                            <a href="goFavorites.php?VillaId=8">
                               <?php
    //*********************Buscar si ya existe esa villa en la tabla temporal ***************************
	$email = $_SESSION['email'];
	$query =  mysql_query("SELECT * FROM tbl_temporal WHERE email='".$email."' AND VillaId = 8");	
	$dataTemporal = mysql_fetch_array($query);		
	
	
		if(!empty($dataTemporal)) {
	?>
			<button type="submit" class="btn btn-default" style="background-color:#ED8000">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
    	} else {
	?>
			<button type="submit" class="btn btn-default">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
		}
		mysql_free_result($dataTemporal); // Liberamos los registros
	?>
                            </a>
                        </div>
            		</div>
          		</div>
        	</div>
           </div>
           
           <div class="col-xs-18 col-sm-6 col-md-5">
          <div class="thumbnail">
            <a href="villa.php?villaId=13"><img class="img-responsive" src="img/allande.jpg" alt="">
              <div class="caption">
                  <div class="row">
                         <div style="margin-left: 15px; margin-top: 15px;">
                        	<h3>Villa Allande at the Dorado Beach Resort</a></h3>
                              </div><div class="col-md-6">
                            <p>Dorado , Puerto Rico<br>
                            Starting at $900</p>                        
                    	</div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="villa.php?villaId=13"><button type="submit" class="btn btn-default">View Villa</button></a>
                            <a href="goFavorites.php?VillaId=13">
                                <?php
    //*********************Buscar si ya existe esa villa en la tabla temporal ***************************
	$email = $_SESSION['email'];
	$query =  mysql_query("SELECT * FROM tbl_temporal WHERE email='".$email."' AND VillaId = 13");	
	$dataTemporal = mysql_fetch_array($query);		
	
	
		if(!empty($dataTemporal)) {
	?>
			<button type="submit" class="btn btn-default" style="background-color:#ED8000">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
    	} else {
	?>
			<button type="submit" class="btn btn-default">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
		}
		mysql_free_result($dataTemporal); // Liberamos los registros
	?>
                            </a>
                        </div>
            		</div>
          		</div>
        	</div>
           </div>
          <div class="col-md-1">
             &nbsp; 
          </div>         
      </div><!-- End row -->      
    </div><!-- End container -->
    
     <div class="container-fluid" id="tourpackages-carousel">      
      <div class="row">
       <div class="col-md-1">
             &nbsp; 
       </div>
       <div class="col-xs-18 col-sm-6 col-md-5">
          <div class="thumbnail">
            <a href="villa.php?villaId=11"><img class="img-responsive" src="img/olas.jpg" alt="">
              <div class="caption">
                  <div class="row">
                        <div style="margin-left: 15px; margin-top: 15px;">
                           <h3>Las Olas Villa - Breñas Estates, Dorado</a></h3>
                           </div><div class="col-md-6">
                            <p>Dorado , Puerto Rico<br>
                            Starting at $725</p>                        
                    	</div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="villa.php?villaId=11"><button type="submit" class="btn btn-default">View Villa</button></a>
                            <a href="goFavorites.php?VillaId=11>">
                                <?php
    //*********************Buscar si ya existe esa villa en la tabla temporal ***************************
	$email = $_SESSION['email'];
	$query =  mysql_query("SELECT * FROM tbl_temporal WHERE email='".$email."' AND VillaId = 11");	
	$dataTemporal = mysql_fetch_array($query);		
	
	
		if(!empty($dataTemporal)) {
	?>
			<button type="submit" class="btn btn-default" style="background-color:#ED8000">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
    	} else {
	?>
			<button type="submit" class="btn btn-default">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
		}
		mysql_free_result($dataTemporal); // Liberamos los registros
	?>
                            </a>
                        </div>
            		</div>
          		</div>
        	</div>
           </div>
           
           <div class="col-xs-18 col-sm-6 col-md-5">
          <div class="thumbnail">
            <a href="villa.php?villaId=239"><img class="img-responsive" src="img/serena.jpg" alt="">
              <div class="caption">
                  <div class="row">
                         <div style="margin-left: 15px; margin-top: 15px;">
                        	<h3>Villa Serena at the Dorado Beach Resort</a></h3>
                              </div><div class="col-md-6">
                            <p>Dorado , Puerto Rico<br>
                            Starting at $600</p>                        
                    	</div>
                        <div class="col-md-6" style="text-align: right;">
                            <a href="villa.php?villaId=239"><button type="submit" class="btn btn-default">View Villa</button></a>
                            <a href="goFavorites.php?VillaId=239">
                                <?php
    //*********************Buscar si ya existe esa villa en la tabla temporal ***************************
	$email = $_SESSION['email'];
	$query =  mysql_query("SELECT * FROM tbl_temporal WHERE email='".$email."' AND VillaId = 239");	
	$dataTemporal = mysql_fetch_array($query);		
	
	
		if(!empty($dataTemporal)) {
	?>
			<button type="submit" class="btn btn-default" style="background-color:#ED8000">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
    	} else {
	?>
			<button type="submit" class="btn btn-default">
				<i class="fa fa-heart fa-lg" aria-hidden="true"></i>
			</button>
	<?php
		} 
		mysql_free_result($dataTemporal); // Liberamos los registros
	?>
                            </a>
                        </div>
            		</div>
          		</div>
        	</div>
           </div>
          <div class="col-md-1">
             &nbsp; 
          </div>         
      </div><!-- End row -->      
    </div><!-- End container -->
    <!-- Fin Featured Villas -->
    
    <style>
	.alinearImagenCentral {  
  padding-right:50px;
  padding-left:50px;
  position: relative;
}
	</style>
	<!-- Banner central -->
		<section id="bannerCentral">
			<div class="container-fluid alinearImagenCentral" style="background-image:url(img/bannerCentral.jpg); background-size: cover; ">
                <br>&nbsp <br>
                <br>&nbsp <br>
                <img class="img-responsive" src="img/TEXTluxuryisnot.png" width="495" height="57" align="right"><br>&nbsp <br>
			    <br>&nbsp <br>
                <br>&nbsp <br>
                <br>&nbsp <br>
                <br>&nbsp <br>
                <br>&nbsp <br>
                <br>&nbsp <br>
                <br>&nbsp <br>                
			</div>
		</section>
	<!-- End Banner central -->  
    <br>
    
	<!-- Banner inferior -->
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
					 <button class="btn btn-default" type="submit" style="padding: 7px; width: 198px; height: 35px; background-color: #FF9400; font-family: sans-serif; color: #FFFFFF;">Submit</button>                			
							&nbsp;
						  <button class="btn btn-default" type="reset" style="padding: 7px; width: 198px; height: 35px; background-color: #FF9400; font-family: sans-serif; color: #FFFFFF;">Reset</button>
				 </form>
				</fieldset>
 			</div>
        </div>
        
        
       <!-- Begin MailChimp Signup Form -->
<!--div id="mc_embed_signup">
<form action="//tabin.us11.list-manage.com/subscribe/post?u=f77cd32d57441fecff2cf0a2d&amp;id=a0743da5cb" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h2>Subscribe to our mailing list</h2>
<div class="mc-field-group">
	<label for="mce-EMAIL">Email Address </label>
	<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <!--div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_f77cd32d57441fecff2cf0a2d_a0743da5cb" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->
        
    </section>
	<!-- End Banner inferior -->
    
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