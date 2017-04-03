<?php
session_start();
$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "header.php";
?>

<header id="page-top">
    <div class="container">
        <div class="heading">
            <h1>               
				Inventory management properties
            </h1>
            <span>Centralized management of villas<br/> easy and friendly.</span>
            <p class="small">
                All modules in one place in an organized manner. 
            </p>
            <!--a href="#" class="btn btn-success btn-sm">Learn more</a!-->
        </div>
        <div class="heading-image animate-panel" data-child="img-animate" data-effect="fadeInRight">
            <p class="small">Just choose the module you want to work with.</p>
            <a href="propertylist.php"><img class="img-animate" src="images/landing/propertylist.gif"></a>
            <a href="#"><img class="img-animate" src="images/landing/propertyeditor.gif"></a>            
            <a href="#"><img class="img-animate" src="images/landing/gallery.gif"></a>
            <a href="#"><img class="img-animate" src="images/landing/amenities.gif"></a>           
            <br/>
            <a href="#"><img class="img-animate" src="images/landing/settingroom.gif"></a>
            <a href="#"><img class="img-animate" src="images/landing/images.gif"></a>
            <a href="#"><img class="img-animate" src="images/landing/mapaddress.gif"></a>            
            <a href="#"><img class="img-animate" src="images/landing/reviews.gif"></a>            
        </div>
    </div>
</header>


<section id="features2" class="bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2><span class="text-success">Easy access  </span>to modules</h2>
                <p>Configure each option in a few steps. </p>
            </div>
        </div>
        <div class="row text-center">
            <a href="#">
                <div class="col-md-3">
                    <h4 class="m-t-lg"><i class="pe-7s-home text-success icon-big"></i></h4>
                    <strong>Property list</strong>
                    <p>It is the main screen where shown in a pager each villa, has the functionality that allows you to search by name, edit, delete, move the previous, next, first and last list. In addition to establish last minute deals.</p>
                </div>
            </a>
            <a href="#">
                <div class="col-md-3">
                    <h4 class="m-t-lg"><i class="pe-7s-pen text-success icon-big"></i></h4>
                    <strong>Property Editor</strong>
                    <p>Allows you to modify each of the fields belonging to the villas, such as: name, feature, Most popular, ratings, price, location, type, also like, how big, title marketing, video villa description, policies.</p>
                </div>
            </a>
            <a href="#">
                <div class="col-md-3">
                    <h4 class="m-t-lg"><i class="pe-7s-camera text-success icon-big"></i></h4>
                    <strong>Gallery</strong>
                    <p>From this part will be shown all the pictures of a villa in particular, has the set a profile functionality, add description, delete picture, and drag picture order apply.</p>
                </div>
            </a>
            <a href="#">
                <div class="col-md-3">
                    <h4 class="m-t-lg"><i class="pe-7s-display2 text-success icon-big"></i></h4>
                    <strong>Amenities</strong>
                    <p>From here you can enable or disable the comforts of properties. Even create a new one.</p>
                </div>
            </a>
        </div>
        <div class="row text-center">
            <a href="#">
                <div class="col-md-3">
                    <h4 class="m-t-lg"><i class="pe-7s-note text-success icon-big"></i></h4>
                    <strong>Setting room / bathroom</strong>
                    <p>This section naming and describing the rooms / bathrooms property.</p>
                </div>
            </a>
            <a href="#">
                <div class="col-md-3">
                    <h4 class="m-t-lg"><i class="pe-7s-cloud-upload text-success icon-big"></i></h4>
                    <strong>Images</strong>
                    <p>This is where you can choose and upload photos of the villas.</p>
                </div>
            </a>
            <a href="#">
                <div class="col-md-3">
                    <h4 class="m-t-lg"><i class="pe-7s-display1 text-success icon-big"></i></h4>
                    <strong>Map Address</strong>
                    <p>Set the exact point of the geographical location of the property through google map.</p>
                </div>
            </a>
            <a href="#">
                <div class="col-md-3">
                    <h4 class="m-t-lg"><i class="pe-7s-users text-success icon-big"></i></h4>
                    <strong>Review</strong>
                    <p>This photo customer rose, name, preview and review date.</p>
                </div>
            </a>
        </div>
    </div>
</section>

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
<script src="vendor/jquery/dist/jquery.min.js"></script>
<script src="vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="vendor/metisMenu/dist/metisMenu.min.js"></script>
<script src="vendor/iCheck/icheck.min.js"></script>
<script src="vendor/sparkline/index.js"></script>

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