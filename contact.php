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
			  $('#areaForm').hide();
			  $('#formEnviado').show();			  			  			  
			  window.location.href='http://www.oikosplus.com/luxury/enviarEmail.php?Page=index&Id=<?php echo $_SESSION["Id"]?>';
			  //window.location.href='enviarEmail.php?Page=contact&Id=<?php echo $_SESSION["Id"]?>';
		    }			    
		}
	    });
	}
	});
		
		});
</script>	
<?php //include "menuSite.php" ?>
<?php include "menuSiteFavorites.php"; ?>
<body data-spy="scroll" data-target=".navbar" data-offset="61">
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
	<!-- Start Body -->
    <div class="container-fluid">
	<div class="row">
    <div class="aboutus" style="margin-top: -30px;">
            <img src="img/contact.jpg" width="1200" height="364" alt=""/><br><br><br>
		<div class="col-md-6">
			
                                    <h3 style="text-align: left;">                                            
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        Address
                                    </h3><div style="margin-top: -10px;">
                                    875 Carr 693, Suite 104 <br />
                                    Dorado,  Puerto Rico <br />
                                    00646 USA <br />
                                    <br></div>
                                    <h3 style="text-align: left;"><i class="fa fa-clock-o" aria-hidden="true"></i> Hours of Operation</h3>
                                    <div style="margin-top: -10px;">Monday through Friday<br>9am - 6pm (UTC -4)</div>
                             
                       <br>
                                    <h3 style="text-align: left;">
                                        <i class="fa fa-envelope" aria-hidden="true"></i> 
                                        Email
                                    </h3>
                                   <div style="margin-top: -10px;"> info@luxuryrentalsinternational.com <br /><br></div>
                                    <h3 style="text-align: left;">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
									Phone    </h3>                            
                                  <div style="margin-top: -10px;">  +1.305.390.2636 <br /></div>
                                    
                                </div>                                             
                  
				<div class="col-md-6">                	
                    <section id="areaForm">			
                        <div class="container-fluid">			
                          
                            <fieldset><legend><font color="#000000">Contact Us</font></legend>
                             <form data-toggle="validator" class="form-horizontal" role="form" id="formContacto">
                               <font color="#000000">Who are you?</font><br>
                                 <div class="form-group" style="margin-left:0px">			    						
                                    <input name="fullName" type="text" id="fullName" style="color:#000" required placeholder="Full Name">
                                    <input name="phone" type="tel" id="phone" style="color:#000"  width="60" required placeholder="Phone No.">                                
                                 </div>	 
                                      <input name="inputEmail" type="email" id="inputEmail" style="color:#000000; width:343px;"  required placeholder="email" data-error="Invalid email format">    
                                 <br><div style="height: 10px;"></div>
                                 <font color="#000000">When are you traveling?</font><br>
                                 <input type="text" name="desde" placeholder="Arriving" id="desde">
                                 <input type="text" name="hasta" placeholder="Departing" id="hasta">
                                 
                                 <br><div style="height: 10px;"></div>
                                 <font color="#000000"> Where do you want to go?</font><br>
                                 
                                 <input type="text" name="destination" placeholder ="" value="" id="destination" style="color:#000000; width:343px;">
                                 <br><div style="height: 10px;"></div>
                                 
                                 <font color="#000000"; weight="600">Anything else?</font><br>
                                 <textarea rows="3.5" placeholder ="What are you looking for?" cols="40"  name="anythingelse" id="anythingelse"></textarea>   
                                 <div style="margin-top: 10px; margin-bottom: 40px;">
                                 <button type="submit"  style="background-color:#132b49; border-radius:3px; width: 140px; padding: 10px;" class="btn btn-default">Submit</button>                			
                                        &nbsp;
                                      <button type="reset" class="btn btn-primary" style="background-color:#132b49; border-radius:3px; width: 140px; padding: 10px;">Reset</button>
                                      </div>
                             </form>
                            </fieldset>
                            </div>
                        </div>
                    </section>                                  
                    
                    
                    <section id="formEnviado" style="display: none;">			
                        <div class="container-fluid" style="background-image:url(img/bannerInferior.jpg); background-size: cover; background-position: right;">			
                            <div class= "halfsearch">
                                <div id="Confirm"><br><br>
                                    
                                    <br><br>
                                    <br><br>                       
                                    <h3>Thank you for submitting your request.</h3><br>
                                        <h5><font color="#FFFFFF">A sales agent will be in touch soon!<br> If you would like to talk to us now, give us a call! </font></h5>
                                        <p><b>Our Office Hours are:</b><br>Monday thru Saturday<br>9am - 6pm &nbsp;<font size="-1">(UTC -4)</font>
                                    <h3><font color="#FFFFFF">305.390.2636 ext.3</font></h3>
                                    <br><br>
                                    <br><br>
                                    <br><br>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                    
			   </div>		
               <div class="col-md-2">
					
				</div>		
			</div>
		</div>
	</div>
</div>
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
<!-- End Body -->
<?php include "footer.php"; ?>