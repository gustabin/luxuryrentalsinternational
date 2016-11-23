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
				  //window.location.href='enviarEmail.php?Page=homeowners&Id=<?php echo $_SESSION['Id']?>';
				}			    
			}
			});
		}
	});
</script>	
<body data-spy="scroll" data-target=".navbar" data-offset="61">
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<!-- Comernzar desde aqui -->
	<!-- Start Body -->
	<div class="container">
        <div class="row">
        	<div class="aboutus">
				<img src="img/homeowners.jpg" width="1200" height="364" alt=""/><br><br>
				
				<br>
				<legend><h3>Why list your rental with LRI</h3></legend>
							  <p>Luxury Rentals International LLC is the finest place to list your amazing property! Come and join the team and become part of the fascinating properties we offer. It is very easy and highly profitable for you as an owner. Partnership with us and you will never regret it!
				Luxury Rentals International, LLC is a property MANAGEMENT company and Vacation Rental Agency located in Dorado, Puerto Rico. It was founded in 2010 by entrepreneur Valeria Albino, and this company has proven to be the most successful rental agency in the Dorado area. Our vision is to expand our destinations so our clients can continue having luxurious experiences. Please contact us and submit the information of your property to start our partnership.</p>
				<p>We focus on the luxury hospitality market. Our professionalism and our commitment to provide an outstanding customer service let the clients feel a luxurious experience since the moment they submit the inquiry to the moment they return home. Throughout the entire reservation process our clients can expect constant communication and follow up as well as feel save with all our services.</p>
				<p>Luxury Rentals International LLC main objective is to generate as many bookings as possible and provide our customers with an exquisite experience in the comfort of a private luxurious home. We make sure that every booking is a high quality one by conducting background checks and making sure they are responsible tenants that understand the responsibility that entails staying at any of these luxurious properties. We want our clients to leave their destination with great memories of their vacation and with a deep desire to return. </p>
				<p>If you have a top of the line property that fits our standards and no time to manage it completely, please contact us as we would love to add your property to our list and manage it fully and properly. The return of investment would be very profitable for you and we grant you that you would never regret this experience and opportunity. Review below our company protocols and feel free to contact us for further assistance.
				</p><br>
							  
							  
				<legend><h3>Our Clientele</h3></legend>
							  <p>We focus on high-end clientele that is looking for a safe, beautiful, and relaxing place to spend their vacation. We know that our demanding clients expect a high level of privacy and cleanliness of the property, spacious rooms with modern furniture, impressive grounds, as well as great facilities. If you know your property provides this scenario, don’t hesitate to contact us! </p><br>
							  
							  
				<legend><h3>Marketing Strategy</h3></legend>
							  <p>At Luxury Rentals International we understand that driving quality customers to all of our properties is extremely important. In order to do this, we make considerable financial investments in our website, social networking campaigns, Google Ad Words, affiliations with travel agencies in the US, in addition to a vast variety of traditional and non-traditional marketing channels for vacation rental properties to drive traffic to our website. We believe that the professional quality photographs of our properties make it easy for our listings to stand out and immediately communicate a sense of quality and professionalism. </p><br>
							  
							  
				<legend><h3>Sales Strategy and Reservations</h3></legend>
							  <p>Luxury Rentals International’s sales department uses a successful process that will convert an inquiry to a booking 75% of the time. Our sales team is very professional and knowledgeable about our products, but most important of all, they provide an excellent customer service. We answer the phone personally and return email inquiries immediately. When an inquiry is received, our sales team makes sure they have all the information needed from the client in order to make any suggestions and/or answer any questions the client may have. Most of the times the inquiry does not provide enough information and this is the moment where our sales agent calls the client. We believe that interacting with our customer and giving constant follow up is key to convert an inquiry into a booking. Once a reservation is booked we make sure to send all documentation required and that the guest feels secure and comfortable since the moment of the reservation, during their stay, as well as when they return home.</p>
							  <br />
							  
				<legend><h3>List Your Rental</h3></legend>    
				<p style="text-align:center;">Convinced? We thought so! So tell us about your property and we will get in touch with you with more details.     
				</p>
    
    <style>
fieldset
{
     width: 94%;
    display: block;
    margin-left: 3%;
    margin-right: 3%;
    max-width: 100%;
    
    
}
	</style>
				<!--- Contacto ---->   
				<div class="col-md-12">                	
                    <section id="areaForm">			
                        <div class="container-fluid">
							<fieldset>
                            
								 <form data-toggle="validator" class="form-horizontal" role="form" id="formContacto"  enctype="multipart/form-data"  >
								   <font color="#000000">Who are you?</font><br>
									 <div class="form-group" style="margin-left:0px">			    						
										<input name="fullName" type="text" id="fullName" style="color:#000; padding:6px; width: 200px;" required placeholder="Full Name">
										<input name="phone" type="tel" id="phone" style="color:#000; padding:6px; width: 200px;" required placeholder="Phone No.">                                
									 </div>	 <br>
										  <input name="inputEmail" type="email" id="inputEmail" style="color:#000000; width:405px; padding:6px; margin-top: -10px;"  required placeholder="email" data-error="Invalid email format">    
									 <br><div style="height: 10px;"></div>
									 <font color="#000000">Where is your property located?</font><br>
									 <input type="type" name="destination" placeholder="City, Country" id="destination" style=" padding:6px; width: 405px;">

									  <br><div style="height: 10px;"></div>
									 <font color="#000000">What's your property like?</font><br>
									 <input type="number" name="size" placeholder="XXX, XXX" id="size" style=" padding:6px; width: 100px;"> sq. ft. &nbsp;
									 <input type="number" name="bedrooms" placeholder="X" id="bedrooms" style=" padding:6px; width: 40px;"> bedrooms &nbsp;
									 <input type="number" name="bathrooms" placeholder="X" id="bathrooms" style=" padding:6px; width: 40px;"> bathrooms<br>
									 <br>									 
									 <font color="#000000"; weight="600">Available Amenities</font><br>
									 <textarea rows="5" placeholder ="Enter your properties features such as: Swiming Pool, Beachfront, Laundry, Spectacular view Security cameras, Golf Carts, Sports Courts, Marble Floors, Remodeled Kitchen, Entertainment System, etc. " cols="47"  name="amenities" id="amenities" style=" padding:6px; color:#000000"></textarea>   
									 <br><div style="height: 10px;"></div>
									 <!--div id='preview-photo' style='width:197px'>
				<!--img width="180px" class='preview' alt="Picture" src="<?php //echo $url; ?>"!-->
			<!--/div>
				<label class="cabinet">Submit your pictures:  <input class="file file-photo" type="file" accept="image/*" name="photo"  /></label!-->
									 <div style="height: 10px;"></div>
									 <input type="radio" name="term" value="short term"> Short-term Rental &nbsp; &nbsp; &nbsp;
										<input type="radio" name="term" value="long term"> Long-term Rental<br>
									 <div style="margin-top: 30px; margin-bottom: 40px;">
									 <button type="submit"  style="background-color:#132b49; border-radius:3px; width: 200px; padding: 10px;" class="btn btn-default">Submit</button>                			
											&nbsp;
										  <button type="reset" class="btn btn-primary" style="background-color:#132b49; border-radius:3px; width: 190px; padding: 10px;">Reset</button>
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
   	  </div>
    </div>
                     
<!-- End Body -->
<!-- Terminar aqui -->

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