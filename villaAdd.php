<?php 
session_start();
error_reporting(0);
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 3; //Activa la opcion del menu actual
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='villaAdd';  
include "header.php";
?> 
<style>
.material-switch > input[type="checkbox"] {
    display: none;   
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative; 
    width: 40px;  
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}
</style>
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
				url: "villaAddProcesar.php",
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
      <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <legend>Villa Name:</legend>
                            </h3>
                            <div class="control-group-inline" style="padding-top: 10px;">	                                         			
                               * <input name="villaName" type="text" class="span4 required" id="villaName"  maxlength="100" placeholder="villa Name" style="width: 97%;">
                            </div>
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
                            <h3 class="panel-title">
                                <legend>Description:</legend>						
                            </h3>
                            <div class="control-group" style="padding-top: 10px;">	 
                                <textarea name="description" type="text" class="span4 required" id="description"  maxlength="4000" placeholder="description" style="width: 97%;" cols="45" rows="5"></textarea>
                            </div>
                        </div>	
                        <div class="panel-body">
                            
                        </div>			
                        <div class="panel-heading">
                            <h3 class="panel-title">						
                                <legend>Polices:</legend>
                            </h3>
                            <div class="control-group" style="padding-top: 10px;">	 
                                <textarea name="polices" type="text" class="span4" id="polices"  maxlength="4000" placeholder="polices" style="width: 97%;" cols="45" rows="15"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

<a name="MapAddress"></a>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<legend>Set Address:</legend>
					</h3>  
                    Address <input name="address" type="text" class="span4" id="address"  maxlength="60" placeholder="address" style="width: 20%;">                   		
                   &nbsp; &nbsp;
                    * Location  
                    <select name="country" id="country">
                      <option value="Puerto Rico">Puerto Rico</option>
                      <option value="RepDom">Dominican Republic</option>
                    </select>    
                                        
                    &nbsp; &nbsp;
                     Region / State <input name="regionState" type="text" class="span4" id="regionState"  maxlength="50" placeholder="region / state" style="width: 10%;">
                     &nbsp; &nbsp;
                     * City  <input name="city" type="text" class="span4 required" id="city"  maxlength="60" placeholder="city" style="width: 15%;">
                    Zip code <input name="zipCode" type="text" class="span4" id="zipCode"  maxlength="5" placeholder="zip Code" style="width: 10%;">
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
					<h3 class="panel-title">						
                         <legend>Map Address:</legend>
					</h3>
                     <div class="control-group-inline" style="padding-top: 10px;">	  
                        Latitude  
                        <input name="latitud"  type="text" class="span4" id="latitud" 
             placeholder="latitud"  style="width: 20%;" maxlength="20">
                        &nbsp; &nbsp;
             			Longitude 
                          <input name="longitud" type="text" class="span4" id="longitud" style="width: 20%;" placeholder="longitud" maxlength="20">
                    </div>  
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
					<h3 class="panel-title">
						<legend>Rooms & Bathrooms:</legend>
					</h3>
                    <div class="control-group-inline" style="padding-top: 10px;">	 
	  		Quantity room <input name="quantityroom" type="text" class="span4 required" id="quantityroom"  maxlength="3" placeholder="quantityroom" style="width: 10%;">
            &nbsp; &nbsp;
            Quantity bathroom <input name="quantitybath" type="text" class="span4 required" id="quantitybath"  maxlength="3" placeholder="quantitybath" style="width: 10%;">                     
		</div>	
				</div>
				<div class="panel-body">
					
				</div>
				<div class="panel-heading">
					<h3 class="panel-title">	
                    	<legend>Price by Night:</legend>
                    </h3>
					<div class="control-group-inline" style="padding-top: 10px;">	 
                        Price from <input name="pricefrom" type="text" class="span4 required" id="pricefrom"  maxlength="5" placeholder="price from" style="width: 10%;">
                        &nbsp; &nbsp;
                        Price to <input name="priceto" type="text" class="span4 required" id="priceto"  maxlength="5" placeholder="price to" style="width: 10%;">        	
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
					<h3 class="panel-title">						
                        <legend>Others:</legend>
					</h3>
                    <div class="control-group-inline" style="padding-top: 10px;">		  		
                        Path villa <input name="pathVilla" type="text" class="span4" id="pathVilla" placeholder="pathVilla" style="width: 30%;"  maxlength="100">            
                      	&nbsp;	&nbsp;                        
                        <!--Feature <input name="feature" type="checkbox" id="feature" value="1" /> 
                        &nbsp; &nbsp;!-->
                        *Most popular  <input name="popular" type="checkbox" id="popular" value="1" > 
                        &nbsp; &nbsp;                         
                        Ratings 
                         <select name="rating" id="rating">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                         </select> 
                    </div>
				</div>
				<div class="panel-body">
					
				</div>
				<div class="panel-heading">
					<div class="control-group-inline" style="padding-top: 10px;">	 
	  		Swimming Pool            
		    <input name="swimming" type="radio" class="required" id="swimming" value="1" checked="checked">
            Yes
            <input type="radio" name="swimming" id="swimming" value="0" class="required">
            No
                            		  
            &nbsp; &nbsp;             
                               
            Type <select name="type" id="type">
                      <option value="1">Villa</option>
                      <option value="2">Apartment</option>
                      <option value="3">House</option>
                      <option value="4">Hotel</option>
                 </select>  
            &nbsp; &nbsp;
            
            How Big  <input name="howBig" type="text" class="span4" id="howBig"  maxlength="10" placeholder="how big" style="width: 10%;">
            &nbsp; &nbsp;
							
            Arrival Time             
            <select id="arrivalTime" name="arrivalTime">             
              <option value="1:00 AM" >1:00 AM</option>
              <option value="2:00 AM" >2:00 AM</option>
              <option value="3:00 AM" >3:00 AM</option>
              <option value="4:00 AM" >4:00 AM</option>
              <option value="5:00 AM" >5:00 AM</option>
              <option value="6:00 AM" >6:00 AM</option>
              <option value="7:00 AM" >7:00 AM</option>
              <option value="8:00 AM" >8:00 AM</option>
              <option value="9:00 AM" >9:00 AM</option>
              <option value="10:00 AM" >10:00 AM</option>
              <option value="11:00 AM" >11:00 AM</option>
              <option value="12:00 M" >12:00 M</option>
              <option value="1:00 PM" >1:00 PM</option>
              <option value="2:00 PM" >2:00 PM</option>
              <option value="3:00 PM" >3:00 PM</option>
              <option value="4:00 PM" >4:00 PM</option>
              <option value="5:00 PM" >5:00 PM</option>
              <option value="6:00 PM" >6:00 PM</option>
              <option value="7:00 PM" >7:00 PM</option>
              <option value="8:00 PM" >8:00 PM</option>
              <option value="9:00 PM" >9:00 PM</option>
              <option value="10:00 PM" >10:00 PM</option>
              <option value="11:00 PM" >11:00 PM</option>
              <option value="12:00 AM" >12:00 AM</option>
            </select>
            
             &nbsp; &nbsp;
            Departure Time 
            
            <select id="departureTime" name="departureTime">             
              <option value="1:00 AM" >1:00 AM</option>
              <option value="2:00 AM" >2:00 AM</option>
              <option value="3:00 AM" >3:00 AM</option>
              <option value="4:00 AM" >4:00 AM</option>
              <option value="5:00 AM" >5:00 AM</option>
              <option value="6:00 AM" >6:00 AM</option>
              <option value="7:00 AM" >7:00 AM</option>
              <option value="8:00 AM" >8:00 AM</option>
              <option value="9:00 AM" >9:00 AM</option>
              <option value="10:00 AM" >10:00 AM</option>
              <option value="11:00 AM" >11:00 AM</option>
              <option value="12:00 M" >12:00 M</option>
              <option value="1:00 PM" >1:00 PM</option>
              <option value="2:00 PM" >2:00 PM</option>
              <option value="3:00 PM" >3:00 PM</option>
              <option value="4:00 PM" >4:00 PM</option>
              <option value="5:00 PM" >5:00 PM</option>
              <option value="6:00 PM" >6:00 PM</option>
              <option value="7:00 PM" >7:00 PM</option>
              <option value="8:00 PM" >8:00 PM</option>
              <option value="9:00 PM" >9:00 PM</option>
              <option value="10:00 PM" >10:00 PM</option>
              <option value="11:00 PM" >11:00 PM</option>
              <option value="12:00 AM" >12:00 AM</option>
            </select>                
					</div>                    
				</div>
                <div class="panel-body">
					
				</div>
                <div class="panel-heading">
                
					Marketing Title   <input name="marketingText" type="text" class="span4" id="marketingText"  maxlength="150" placeholder="marketing text" style="width: 90%;" value="">
                     &nbsp; &nbsp;<p></p>
                    URL   <input name="url" type="text" class="span4" id="url"  maxlength="150" placeholder="url" style="width: 90%;">
				</div>
                <div class="panel-body">
					
				</div>
                <div class="panel-heading">
			Villa Video	<input name="video" type="text" class="span4" id="video"  maxlength="150" placeholder="(e.g youtube share embed url.)" style="width: 40%;"> 
             &nbsp; &nbsp; 
          <div class="material-switch pull-right">
			  <?php
              if ($status==0) {?>
                  <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox"  value="1"/>
              <?php }
              if ($status==1) {?>			  
                  <input id="someSwitchOptionDefault" name="someSwitchOption001" type="checkbox" checked="checked" value="0"/>
              <?php }
              ?>          
              &nbsp; &nbsp; 
              Active On  &nbsp;<label for="someSwitchOptionDefault" class="label-default"></label>&nbsp;  Off
          </div>
          &nbsp; &nbsp;  
          <div class="material-switch pull-right">
			  <?php
              if ($featured==0) {?>
                  <input id="featured" name="featured" type="checkbox"  value="1"/>
              <?php }
              if ($featured==1) {?>			  
                  <input id="featured" name="featured" type="checkbox" checked="checked" value="0"/>
              <?php }
              ?>              
              &nbsp; &nbsp;           
              Featured On  &nbsp;<label for="featured" class="label-default"></label>&nbsp;  Off
          </div>
          &nbsp; &nbsp;
           Also Like  
           <!-- ********************solo funciona porque tiene corchetes lstFruits[] *********************************** !-->
              <SELECT id="lstFruits" name="lstFruits[]" multiple="multiple" size="20">
                    <?php  //combobox
                    $queryAlsoLike="SELECT * FROM villa";  					
                    $resultadoAlsoLike=mysql_query($queryAlsoLike,$dbConn);
                    while($dataAlsoLike=mysql_fetch_array($resultadoAlsoLike))
                    {   
					$valor_array = explode(',',$alsoLike);      
					foreach($valor_array as $llave => $valores) 
					{ 						 
						if ($dataAlsoLike['VillaId']==$valores)
						{
							echo'<OPTION VALUE="'.$dataAlsoLike['VillaId'].'" selected>'.$dataAlsoLike['Name'].'</OPTION>';
						}
					}                     
                        echo'<OPTION VALUE="'.$dataAlsoLike['VillaId'].'">'.$dataAlsoLike['Name'].'</OPTION>';						
                    } 
                    ?>
              </SELECT> 
                    <input type="button" id="btnSelected" value="Get Selected" />     
				</div>
			</div>
		</div>
	</div>
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
                    ¡Record successfully saved!
                </h4>
            </div>
            <div class="modal-body">
                The information was successfully recorded. <br>                
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