<?php 
session_start();
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 5; //Activa la opcion del menu actual
include "header.php";
$villaId=$_GET["id"];
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='amenities';  
?>

<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Villas of Luxury Rentals International");
	});
</script>

<script type='text/javascript'>                             // tablesorter
    $(document).ready(function() {
        $("#sTable").tablesorter({
            headers: {
                3: {   
                    sorter: false
                }
            }
        });
    });
</script>

<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formAmenities', function(event) {
		event.preventDefault()
		if ($('#formAmenities').valid()) {
			$.ajax({
				type: "POST",
				url: "amenitiesProcesar.php",
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
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 75px; padding-bottom: 0px;">
    <div class="container">
 <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Ameninities
        <small>of <?php echo $_SESSION['villaName']; ?></small>
      </h2>
    </div>
  </section> 

<?php	//************** Busca en la tabla villaamenities donde VillaId='$villaId' ************
		//************** La finalidad es conseguir $alsoLike **********************************
/*		$amenitieId="";
		$i=0;
		$queryDetail = ("SELECT * FROM villaamenities WHERE VillaId='$villaId'");						
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		while($dataDetail=mysql_fetch_array($resultadoDetail))
			{		
		$i=$i+1;					
			$amenitiid = $dataDetail['amenitiid'];
			$queryAmenitie = ("SELECT * FROM amenitie WHERE amenitieid='$amenitiid'");							
			$resultadoAmenitie=mysql_query($queryAmenitie,$dbConn);
			
			while($dataAmenitie=mysql_fetch_array($resultadoAmenitie))
				{							
				$descriptionAmenitie = $dataAmenitie['description'];
				$amenitieId = $amenitieId . "," . $dataAmenitie['amenitieid'];
				$alsoLike = $amenitieId;														
				}															
			}		
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();*/
				
	// ===================== Buscar los datos en villadetail ==============================================
	$queryDetail = ("SELECT * FROM villadetail WHERE VillaId='$villaId'");	
	$resultadoDetail=mysql_query($queryDetail,$dbConn);
	while($dataDetail=mysql_fetch_array($resultadoDetail))
		{
			$alsoLike=$dataDetail['amenities'];			
		}		
	mysql_free_result($resultadoDetail); // Liberamos los registros		
	mysql_close();	//cerrar la conexion a la bd
?>				
<form class="form-vertical" id="formAmenities" action="">    
  <div class="container">
  		<div class="control-group" style="padding-top: 10px;">	 
			<button class="btn btn-primary" type="submit" id="enviar">Save</button>
			<a href="editVilla.php?id=<?php echo $villaId ?>">
            	<button type="button" class="btn btn-default" id="cancelar">Close</button>
            </a>            
        </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
        		  
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Amenities</div>            
                <!-- List group -->
            	<input type="hidden" id="villaId" name="villaId" value="<?php echo $villaId ?>">
                <ul>		
				<?php
					//*************** Realiza la busqueda en toda la tabla amenitie ********************
					//*************** con el foreach busca solo los valores dentro de $alsoLike ********
					$queryAlsoLike="SELECT * FROM amenitie ORDER BY category";  					
                    $resultadoAlsoLike=mysql_query($queryAlsoLike,$dbConn);
                    while($dataAlsoLike=mysql_fetch_array($resultadoAlsoLike))
                    {   
					$valor_array = explode(',',$alsoLike);      
					foreach($valor_array as $llave => $valores) 
					{ 						 
						if ($dataAlsoLike['amenitieid']==$valores)
						{
							echo'<input type="checkbox" name="lstFruits[]" id="'.$dataAlsoLike['amenitieid'].'" VALUE="'.$dataAlsoLike['amenitieid'].'" checked>'.$dataAlsoLike['description'].'<br>';
							$coinciden=1;
						}
					}         
						if ($coinciden==0){            
                        echo'<input type="checkbox" name="lstFruits[]" id="'.$dataAlsoLike['amenitieid'].'" VALUE="'.$dataAlsoLike['amenitieid'].'">'.$dataAlsoLike['description'].'<br>';		
						}	
						$coinciden=0;		
                    } 
                ?>			   
		   		</ul>
                
            </div>            
        </div>
    </div>
    	
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
     
     <div class="modal" id="light" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                <h4 class="modal-title" id="myModalLabel">
                    ¡Record upgraded!
                </h4>
            </div>
            <div class="modal-body">
                The amenity has been upgraded successfully. <br>                
            </div>
            <div class="modal-footer">			
                    <a href = "amenities.php?id=<?php echo $villaId ?>" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
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
<script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- App scripts -->
<script src="scripts/homer.js"></script>
</body>
</html>