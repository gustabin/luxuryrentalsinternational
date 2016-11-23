<?php 
session_start(); 
require_once('tools/mypathdb.php');  
//include "tools/class.php"; 
error_reporting(0);
include "header.php"; 
?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<!--script src="js3/jquery.ui.datepicker.js"></script!-->
	
	<body data-spy="scroll" data-target=".navbar" data-offset="61">
	<!-- Start preloader -->
	<!-- End preloader -->
<!-- menu -->


	<!-- Start intro -->
<?php include "menuSite.php" ?>
<style>
.container {
    margin-top: 20px;
}

/* Carousel Styles */
.carousel-indicators .active {
    background-color: #2980b9;
}

.carousel-inner img {
    width: 1560px;
    max-height: 1040px;
}

.carousel-innerInicial img {	
	width: 100%;
    max-height: 600px;	
}

.carousel-control {
    width: 0;
}

.carousel-control.left,
.carousel-control.right {
	opacity: 1;
	filter: alpha(opacity=100);
	background-image: none;
	background-repeat: no-repeat;
	text-shadow: none;
}

.carousel-control.left span {
	padding: 15px;
}

.carousel-control.right span {
	padding: 15px;
}

.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right, 
.carousel-control .icon-prev, 
.carousel-control .icon-next {
	position: absolute;
	top: 45%;
	z-index: 5;
	display: inline-block;
}

.carousel-control .glyphicon-chevron-left,
.carousel-control .icon-prev {
	left: 0;
}

.carousel-control .glyphicon-chevron-right,
.carousel-control .icon-next {
	right: 0;
}

.carousel-control.left span,
.carousel-control.right span {
	background-color: #000;
}

.carousel-control.left span:hover,
.carousel-control.right span:hover {
	opacity: .7;
	filter: alpha(opacity=70);
}

/* Carousel Header Styles */
.header-text {
    position: absolute;
    top: 20%;
    left: 1.8%;
    right: auto;
    width: 96.66666666666666%;
    color: #fff;
}

.header-text h2 {
    font-size: 40px;
}

.header-text h2 span {
    background-color: #2980b9;
	padding: 10px;
}

.header-text h3 span {
	background-color: #000;
	padding: 15px;
}

.btn-min-block {
    min-width: 170px;
    line-height: 26px;
}

.btn-theme {
    color: #fff;
    background-color: transparent;
    border: 2px solid #fff;
    margin-right: 15px;
}

.btn-theme:hover {
    color: #000;
    background-color: #fff;
    border-color: #fff;
}
</style>
<body>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>

<!-- Comernzar desde aqui -->
<?php
		$villaId= $_GET["villaId"];
		$queryDetail = ("SELECT * FROM villa WHERE VillaId='$villaId'");			
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{
							$villaName = $dataDetail['Name'];
							$description = $dataDetail['Description'];
							$polices = $dataDetail['polices'];
							$longitud = $dataDetail['longitud'];
							$latitud = $dataDetail['latitud'];
							$pricefrom = $dataDetail['pricefrom'];
							$priceto = $dataDetail['priceto'];
							$villaId = $dataDetail['VillaId'];
							$city = $dataDetail['City'];
							$quantityroom = $dataDetail['quantityroom'];				
							$quantitybath = $dataDetail['quantitybath'];
							}		
		mysql_free_result($resultadoDetail); // Liberamos los registros							
		mysql_close(); //desconectar();
	?>

<!--carrusel fluido -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="carousel slide" id="carousel-239872">				
				<div class="carousel-innerInicial">
				<?php
							$queryImage = ("SELECT * FROM imagegallery WHERE VillaId= '$villaId'");
							$resultadoImage=mysql_query($queryImage,$dbConn);
							$dataImage=mysql_fetch_array($resultadoImage);
							$pathMain = $dataImage['Path'];
							?>
							
							<a href="javascript:window.showModalDialog('swipe2.php','','dialogHeight:900px;dialogWidth:1600px;center:yes');void 0"><img class="img-responsive" src="img/galleryimages/<?php echo $pathMain?>"></a><br />

					
				
												
					
				</div> 
				
			</div>
		</div>
	</div>
</div>



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">		
	<a data-dismiss="modal" class="close"><i class="fa fa-times fa-2x" aria-hidden="true" style="color: #fff";></i></a>        		
	  <div class="modal-dialog modal-lg">
			<div class="modal-content">
			    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">  
				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
						<div class="item active">							  
							  <img class="img-responsive" src="img/galleryimages/<?php echo $pathMain?>">								  
						</div>
						<?php		
						// --- Buscar en la tabla imagegallery ------------------
						$queryImage = ("SELECT * FROM imagegallery WHERE VillaId='$villaId'");			
						$resultadoImage=mysql_query($queryImage,$dbConn);
						while($dataImage=mysql_fetch_array($resultadoImage))
							{							
							$path = $dataImage['Path'];
							$descriptionImage = $dataImage['Description'];
							?>						
								<div class="item">			    	
									<!--img src="img/galleryimages/<?php echo $path ?>"!-->	
									<img src="img/Puerto Rico/Dorado/serena/<?php echo $path ?>">	
									
								</div>
							<?php											
							}		
						mysql_free_result($resultadoImage); // Liberamos los registros												
						mysql_close(); //desconectar();
						?>			
				  </div>
					 
				</div>
				
			</div>
			 
	  </div>
	  <!-- Controls -->
			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<i class="fa fa-chevron-right fa-2x" aria-hidden="true"></i>
			  </a>
</div>

<?php		
		$queryDetail = ("SELECT * FROM villadetail WHERE VillaId='$villaId'");			
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{							
							$quantityroom = $dataDetail['quantityroom'];				
							$quantitybath = $dataDetail['quantitybath'];
							$swimmingPool = $dataDetail['swimmingpool'];
							}		
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
	?>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
				<P><?php echo $_SESSION['country']?> > <?php echo $_SESSION['city']?> </P>
                <h1 style="font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; color:#132b49;"><?php echo $villaName; ?></h1>
                <h3 style="margin-top: -15px; font-family: 'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; color: #878585">Starting $<?php echo $pricefrom ?> per night</h3>                               
                <legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;">Summary</p></legend>
				<!-- Start Panels Start Panels --->                
                <div class="container">
					<div class="row" style="margin-bottom: 20px; padding: 10px;">
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="box">
								<div class="box-icon" style="text-align: center;">
								<img src="img/amenities/bed.png" width="80" height="80" alt="" /><br>									
								</div>
								<div class="info">
									<h4 class="text-center">Bedrooms</h4>
									<p align="center"><?php echo $quantityroom ?> bedrooms </p>
								</div>
							</div>
						</div>
					
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="box">
								<div class="box-icon" style="text-align: center;">
								<img src="img/amenities/bath.png" width="80" height="80" alt=""/> <br>
									
								</div>
								<div class="info">
									<h4 class="text-center">Bathrooms</h4>
									<p align="center"> <?php echo $quantitybath ?> bathrooms</p>
								</div>
							</div>
						</div>
						<?php if ($swimmingPool==1) {?>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
									<div class="box">
										<div class="box-icon" style="text-align: center;">
										<img src="img/amenities/pool.png" width="80" height="80" alt=""/> <br>
										</div>
										<div class="info">
											<h4 class="text-center">Swimming Pool</h4>
											<p align="center">Private in property</p>
										</div>
									</div>
								</div>
						<?php }?>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<div class="box">
								<div class="box-icon" style="text-align: center;">
									<img src="img/amenities/wifi.png" width="80" height="80" alt=""/><br>
								</div>
								<div class="info">
									<h4 class="text-center">WIFI</h4>
									<p align="center">Full House Coverage</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>       
	</div>
       
    <!--end panels panels end -->
    <!--start tab panels -->
    
    <div class="container">
	<div class="row">
		                                <div class="col-md-9">
                                    <!-- Nav tabs --><div class="card" style="background-color: #C5C5C5; border-radius: 4px;">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Overview</a></li>
                                        <li role="presentation"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a></li>
                                        <li role="presentation"><a href="#rates" aria-controls="rates" role="tab" data-toggle="tab">Rates</a></li>
                                        <li role="presentation"><a href="#policies" aria-controls="policies" role="tab" data-toggle="tab">Policies</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content" style="background-color: #E7E7E7; border-radius: 4px;">
                                        <div role="tabpanel" class="tab-pane active" id="home" style="color: #132B49; padding: 30px; text-align: justify; text-indent: 40px;">
                                        
                                        <p>Stunning beach front mansion at Breñas Estates, Dorado. Breñas Estates is a small, gated, beach community. Each
house is a custom built home. This is one of a kind beachfront home on one of the most pristine beaches in Puerto
Rico. Two levels with amazing views! Nothing like it in Puerto Rico. With a private pool and a great terrace you will
be able to enjoy every minute you spend in this beautiful house. This spacious residence features: - 4 bedrooms -
4.5 bathrooms - spacious kitchen - great terrace with a private pool and access to a private beach - Gas Grill. This
property is located outside the Resort in a community with no access to the Resort amenities.</p>

<p>This property is within 5 minutes of the reknowned world class Dorado Beach golf courses. Great restaurants
nearby. The beautiful town of Dorado is a beautiful beach town that has everything you may need. From restaurants
(local and franchises), to movie theater, big grocery stores (one opens 24 hrs.), to specialty deli stores and more.
There's also a Premium Outlet not far from Dorado (about 20 minutes away in the town of Barceloneta) and San
Juan is not far either if you want to plan a day trip to Old San Juan or Condado. San Juan is just 30 minutes away from
Dorado and the highway is brand new and comfortable to drive. The beach is one of the best surfing spots in the
island.</p>
</div>
                                        <div role="tabpanel" class="tab-pane" id="overview" style="color: #132B49; padding: 30px; text-align: justify; text-indent: 40px;">
                                        <p>Stunning beach front mansion at Breñas Estates, Dorado. Breñas Estates is a small, gated, beach community. Each
house is a custom built home. This is one of a kind beachfront home on one of the most pristine beaches in Puerto
Rico. Two levels with amazing views! Nothing like it in Puerto Rico. With a private pool and a great terrace you will
be able to enjoy every minute you spend in this beautiful house. This spacious residence features: - 4 bedrooms -
4.5 bathrooms - spacious kitchen - great terrace with a private pool and access to a private beach - Gas Grill. This
property is located outside the Resort in a community with no access to the Resort amenities.</p>

<p>This property is within 5 minutes of the reknowned world class Dorado Beach golf courses. Great restaurants
nearby. The beautiful town of Dorado is a beautiful beach town that has everything you may need. From restaurants
(local and franchises), to movie theater, big grocery stores (one opens 24 hrs.), to specialty deli stores and more.
There's also a Premium Outlet not far from Dorado (about 20 minutes away in the town of Barceloneta) and San
Juan is not far either if you want to plan a day trip to Old San Juan or Condado. San Juan is just 30 minutes away from
Dorado and the highway is brand new and comfortable to drive. The beach is one of the best surfing spots in the
island.</p>
                                        
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="rates" style="color: #132B49; padding: 30px; text-align: justify; text-indent: 40px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
                                        <div role="tabpanel" class="tab-pane" id="policies" style="color: #132B49; padding: 30px; text-align: justify; text-indent: 40px;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passage..</div>
                                    </div>
</div>
                                </div>
                                
                                <div class="col-md-3">
                                <div class="caption">
                                  <button type="submit" class="btn btn-default">Inquire Now</button>
                                  <button type="submit" class="btn btn-default">Book Now</button>
                                  <button type="submit" class="btn btn-default">Check Availability</button>
                                </div>
                                </div>
	</div>
    <br><br><br>
    
    <!---START START START PROPERTY DETAILS -->
     <legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;">Property Details</p></legend>
    
    <div class="col-md-4" style="padding: 30px;">
    <center><img src="img/amenities/bed.png" width="80" height="80" alt=""/><br><br></center>
    <ul>
    <li>Master Bedroom - King Size bed</li>
    <li>Room #2 - Queen Bed</li>
    <li>Room #3 - 2 twin beds</li>
   </ul>
    </div>
    
    <div class="col-md-4" style="padding: 30px;">
    <center><img src="img/amenities/laundry.png" width="80" height="80" alt=""/><br><br></center>
    <ul>
    <li>Washer and Dryer</li>
    <li>Flat iron and Table</li>
    <li>Hanging Area</li>
    </ul>
    </div>
    
    <div class="col-md-4" style="padding: 30px;">
    <center><img src="img/amenities/kitchen.png" width="80" height="80" alt=""/><br><br></center>
    <ul>
    <li>Dishwasher</li>
    <li>Double Sink</li>
    <li>Ice-making Refrigerator</li>
    <li>Toaster Oven</li>
    <li>Toaster</li>
    <li>Oven</li>
    </ul>
    
    </div>
    <hr>
    <div class="col-md-4" style="padding: 30px;">
    <center><img src="img/amenities/livingroom.png" width="80" height="80" alt=""/><br><br></center>
    3 other living areas including 1 entertainment and theater room
    </div>
    
    <div class="col-md-4" style="padding: 30px;">
    <center><img src="img/amenities/outdoor.png" width="80" height="80" alt=""/><br><br></center>
    <ul>
    <li>Swimming Pool</li>
    <li>Poolside Kitchenette</li>
    <li>3-car garage</li>
    <li>Golf carts available</li>
    </ul></div>

<div class="row">
<div class="col-md-4" style="padding: 30px;">
<center><img src="img/amenities/beach.png" width="80" height="80" alt=""/><br><br></center>
Beach access</div></div>
    
    <!-- END END END END PROPERTY DETAILS -->
  <br>
<br>
  <legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;"> Features and Amenities</p></legend> <div class="row">
        <div class="col-md-4" style="padding: 30px;">
    <h3 style="text-align: center;">In Villa {NAME}</h3>
    <div style=" -webkit-column-count: 2; /* Chrome, Safari, Opera */
    -moz-column-count: 2; /* Firefox */
    column-count: 2;">
   <ul>
   <li>Dining Area</li>
<li>Hair Dryer</li>
<li>Microwave</li>
<li>Bed Linens</li>
<li>Cable Television</li>
<li>Dishwasher</li>
<li>Kitchen</li>
<li>Shower</li>
<li>Washing Machine</li>
<li>Internet - Wireless</li>
<li>Towels</li>
<li>Oven</li>
<li>Coffee Maker</li>
<li>TV</li>
<li>Living Room</li>
<li>Garden</li>
<li>Gas Grill</li>
<li>Ocean View</li>
<li>Private Pool</li>
<li>Theme Family</li>
<li>Cookware</li>
<li>Central A/C</li>
<li>Parking</li>
<li>Clothes Dryer</li>
<li>Surfing</li>
<li>Theme Luxury</li>
<li>Golf Optional</li>
<li>Cooking Utensils</li>
<li>Walking</li>
<li>Swimming</li>
<li>Groceries</li>
</ul>
</div>
</div>
   <div class="col-md-4" style="padding: 30px 50px 30px 50px;">
    <h3 style="text-align: center;">Around Villa {NAME}</h3>
    <ul>
<li>Beachfront</li>
<li>Hospital</li>
<li>Oceanfront</li>
<li>Golfing</li>
<li>Restaurant</li>
<li>Living Room</li>
<li>Ocean View</li>
<li>ATM/Bank</li>
<li>Churches</li>
<li>Surfing</li>
<li>Theme Luxury</li>
<li>Golf</li>
<li>Beach</li>
<li>Cooking Utensils</li>
<li>Groceries</li>
<li>Walking</li>
<li>Swimming</li>
</ul>
</div>

   <div class="col-md-4" style="padding: 30px 50px 30px 50px;">
    <h3 style="text-align: center;">Attractions</h3>
    <ul>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
<li>Attraction</li>
</ul>
</div>
</div>
</div>
<script>
$(function() {
    $('#gmap-holder').click(function(e) {
        $(this).find('iframe').css('pointer-events', 'all');
    }).mouseleave(function(e) {
        $(this).find('iframe').css('pointer-events', 'none');
    });
})
</script>
    <legend><p style="text-align: center; font-family:'Gill Sans', 'Gill Sans MT', 'Myriad Pro', 'DejaVu Sans Condensed', Helvetica, Arial, sans-serif; font-size:25pt;"> Area Map</p></legend> 
   
    <section id="gmap-holder">			
			<div class="container-fluid" style="margin:30px 5% 30px 5%;">	            		
           <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheigh
    t="0" marginwidth="0"; pointer-events:none src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3784.4186367703337!2d-66.283464685205!3d18.464687075700375!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c0314871d7e9737%3A0x6e96b49e49b758c!2sLuxury+Estates+Puerto+Rico!5e0!3m2!1sen!2sve!4v1470689140783">    
    </iframe>		
			</div>
		</section>
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
					 <button type="submit" class="btn btn-default">Submit</button>                			
							&nbsp;
						  <button type="reset" class="btn btn-primary">Reset</button>
				 </form>
				</fieldset>
 			</div>
        </div>
    </section>
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
	<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="swipe2.php"></iframe>
</div>
<?php include "footerVilla.php"; ?>