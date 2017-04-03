<?php
session_start();
require_once('tools/mypathdb.php');  
$_SESSION['valor'] = 1; //Activa la opcion del menu actual
include "header.php";
$villaId=$_GET["id"];
?>


<link rel="stylesheet" href="css/imagesOrder.css" />
   <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 70px; padding-bottom: 10px;">
    <div class="container">
      <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Set Order images
        <small>for <?php echo $_SESSION['villaName']; ?></small>            
      </h2>
      <a href='propertylist.php'>
      	<button type="button" class="btn-main"><i class="fa fa-reply" aria-hidden="true"></i> Back to list </button>
      </a>      
    </div>
  </section>
	<?php	
		//************ Buscar $pathVilla **********************
		$queryDetail = ("SELECT * FROM villadetail WHERE VillaId='$villaId'");			
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
				{							
				$pathVilla = "http://www.luxuryrentalsinternational.com/go/" .$dataDetail['PathVilla'];							
				}							
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();		
		//************ Fin Buscar $pathVilla **********************		
	?>
	<?php
		    // --- Buscar en la tabla imagegallery ------------------
            $queryImage = ("SELECT * FROM imagegallery WHERE VillaId= '$villaId'");
            $resultadoImage=mysql_query($queryImage,$dbConn);
            $dataImage=mysql_fetch_array($resultadoImage);	    
            $fullpath = $pathVilla . "/thumbnail.jpg" ;		
    ?>

    <div class="container" style="padding:0px">
        <div class="row">
          <div class="col-md-12">
            <h5>Drag images...</h5>
            <div class="drag">
                
                    <img rel="1" src="<?php echo $fullpath ?>" class="img-thumbnail" style="width:200px; height:200px">            
                    <?php		
                        // --- Buscar en la tabla imagegallery ------------------
                        $queryImage = ("SELECT * FROM imagegallery WHERE VillaId='$villaId'");									
                        $resultadoImage=mysql_query($queryImage,$dbConn);
                        $i = 1;
                        while($dataImage=mysql_fetch_array($resultadoImage))
                            {							
                            $path = $dataImage['Path'];
                            $descriptionImage = $dataImage['Description'];
                            $fullpath = $pathVilla . "/" . $path;
                            $i = $i+1;
                            ?>			
                                <img rel="<?php echo $i?>" src="<?php echo $fullpath?>" class="img-thumbnail" style="width:200px; height:200px">										
                            <?php											
                            }		
                        mysql_free_result($resultadoImage); // Liberamos los registros																
                    ?>
                   
               
			</div>
        	<p id="output"><?php echo $i?> images</p>
        </div>
            
        </div>
    </div>
    


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