<?php
session_start();
require_once('tools/mypathdb.php');  
include "header.php";
$villaId=$_GET["id"];
$_SESSION['villaId']=$villaId;
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='imagesOrder';  
?>
 <script language="JavaScript" type="text/JavaScript">	                       
    //Metodo para cargar el formulario **************** AQUI USO ALGO DIFERENTE PARA PODER LEER EL id DEL DIV ******
    $("body").on('submit', '#formOrder', function(event) {
	event.preventDefault()
	if ($('#formOrder').valid()) {
	    $.ajax({
		type: "POST",
		url: "imagesOrderProcesar.php",
		dataType: "json",
		data: {
        "Order": $("#output").text()
    },
		success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 1000);
						window.location.href='login.php'; 
					}
										
					if (respuesta.exito == 1) {
						document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block';						
					}						
				}
			});
		}
	});	

    function Salir() {
		window.location.href="editVilla.php?id=<?php echo $villaId ?>";
	}    
</script>
    <!-- Bootstrap -->
    <!--link href="css/bootstrap.css" rel="stylesheet"!-->
    <link rel="stylesheet" href="css/imagesOrder.css" />

  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 75px; padding-bottom: 5px;">
    <div class="container">
      <h2 class="section-title">
        Set order images
        <small>for <?php echo $_SESSION['villaName']; ?></small>            
      </h2>
      <a href='editVilla.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-reply" aria-hidden="true"></i> Back to feature </button>
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
            $queryImage = ("SELECT * FROM imagegallery WHERE VillaId= '$villaId' ORDER BY DisplayOrder");
            $resultadoImage=mysql_query($queryImage,$dbConn);
            $dataImage=mysql_fetch_array($resultadoImage);	    
            $fullpath = $pathVilla . "/thumbnail.jpg" ;		
    ?>

    <div class="container">
        <div class="row">
        <form class="form-vertical" id="formOrder">
        	<input type="hidden" id="villaId" name="villaId" value="<?php echo $villaId ?>">
            <div class="col-md-12" style="padding-top:10px";>
            <h5>Drag and drop images...</h5>
            <div class="drag">
            <img rel="1" src="<?php echo $fullpath ?>" class="img-thumbnail" style="width:200px; height:200px">                        
                    <?php		
                        // --- Buscar en la tabla imagegallery ------------------
                        $queryImage = ("SELECT * FROM imagegallery WHERE VillaId='$villaId' ORDER BY DisplayOrder");									
                        $resultadoImage=mysql_query($queryImage,$dbConn);
                        //$i = 1;
						//$i = "hola";
                        while($dataImage=mysql_fetch_array($resultadoImage))
                            {							
                            $path = $dataImage['Path'];
							$ImageGalleryId = $dataImage['ImageGalleryId'];
                            $descriptionImage = $dataImage['Description'];
                            $fullpath = $pathVilla . "/" . $path;
                            //$i = $i+1; 
							$i = $ImageGalleryId;
                            ?>			
                                <img rel="<?php echo $i?>" src="<?php echo $fullpath?>" class="img-thumbnail" style="width:200px; height:200px">
                             
                            <?php											
                            }		
                        mysql_free_result($resultadoImage); // Liberamos los registros																
                    ?>
			</div>
       		  <div id="output" style="display: none;">	<?php echo $i?> images</div>  
            </div>
           
             <div class="control-group">         
                <button class="btn btn-danger" type="submit"><i class="fa fa-hand-pointer-o" aria-hidden="true"></i>Save</button>
    
                <button class="btn btn-default" type="button" onclick="Salir()">Cancel</button>
                </div>
              </form>
        </div>
    </div>
    
  <div class="modal" id="light" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                <h4 class="modal-title" id="myModalLabel">
                    ¡Images Order upgraded!
                </h4>
            </div>
            <div class="modal-body">
                The images order has been upgraded successfully. <br>                
            </div>
            <div class="modal-footer">			
                    <a href = "editVilla.php?id=<?php echo $villaId ?>" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                   Ok
                </button> 
                    </a>					
            </div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!--// es obligatorio para el formulario !-->
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script><!--es obligatorio   !-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!--script src="js/bootstrap.min.js"></script>
    <!-- App scripts -->
    <script src="js/imagesOrder.js"></script>



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
