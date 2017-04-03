<?php 
session_start();
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 5; //Activa la opcion del menu actual
include "header.php";
//$villaId=$_GET["id"];
$Id=$_GET["id"];
// ********** ubicacion de pagina para el login *****
$_SESSION['pagina']='price';  
?>
 <?php				
		$queryDetail = ("SELECT * FROM settingprice WHERE id='$Id'");
		$resultadoDetail=mysql_query($queryDetail,$dbConn);				
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{															
							$seasonName 	= $dataDetail['season'];
							$dateFrom 		= $dataDetail['datefrom'];	
							$dateTo 		= $dataDetail['dateto'];
							$quantityRoom 	= $dataDetail['quantityroom'];
							$type 			= $dataDetail['type'];
							$price 			= $dataDetail['price'];
							$minNights 		= $dataDetail['minnights'];
							$Id 			= $dataDetail['id'];						
							}									
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();
	?>

<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Villas of Luxury Rentals International");
	});
</script>



<script language="JavaScript" type="text/JavaScript">	 
    //Metodo para cargar los datos personales
    $("body").on('submit', '#formRoom', function(event) {
		event.preventDefault()
		if ($('#formRoom').valid()) {
			$.ajax({
				type: "POST",
				url: "bedsProcesar.php",
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
					if (respuesta.exito == 2) {
						document.getElementById('light2').style.display='block';document.getElementById('fade').style.display='block';						
					}					
				}
			});
		}
	});	
</script>

  
   
  <!-- .................................... $breadcrumb .................................... -->
  <section class="section-breadcrumb section-color-graylighter" style="padding-top: 150px; padding-bottom: 0px;">
    <div class="container">
 <!-- .................................... $Titulo .................................... -->
      <h2 class="section-title">
        Beds
        <small>of <?php echo $_SESSION['villaName']; ?></small>
      </h2>
    </div>
  </section> 

<?php				
	// ===================== Buscar los datos en settinbedroom ==============================================
	$queryDetail = ("SELECT * FROM settinbedroom WHERE settingroomId='$Id'");	
	//var_dump($queryDetail);	
	$resultadoDetail=mysql_query($queryDetail,$dbConn);
	while($dataDetail=mysql_fetch_array($resultadoDetail))
		{
			//$type=$dataDetail['type'];
			//$quantity=$dataDetail['quantity'];		
			$king=$dataDetail['king'];
			$queen=$dataDetail['queen'];	
			$twin=$dataDetail['twin'];
			$full=$dataDetail['full'];
			$rollaways=$dataDetail['rollaways'];	
			$bunk=$dataDetail['bunk'];
			$daybed=$dataDetail['daybed'];
			$trundles=$dataDetail['trundles'];
			$pull=$dataDetail['pull'];
		}		
	mysql_free_result($resultadoDetail); // Liberamos los registros		
	mysql_close();	//cerrar la conexion a la bd
?>				

 <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter" style="padding-top: 0px; background:#f5f5f5">
    <div class="container">
      <div class="row">
        <div id="contenido">  
       	   <div class="col-md-12" style="padding-top: 30px;">
  		      <form class="form-vertical" id="formRoom" action="">    
  				<div class="container-fluid">
        			<div class="row">
            			<div class="col-md-12">
                			<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <legend>Setting Room:</legend>                            
                                    </h3>                       
                                    <div class="control-group-inline" style="padding-top: 10px;">	
                                        <input type="hidden" name="id" id="id" value="<?php echo $Id ?>">         			
                                         <?php echo $name ?> &nbsp;
                                         <?php echo $description ?>
                                    </div>
                                    <div class="control-group-inline" style="padding-top: 10px;" align="center">	
                                        King <input name="king" type="text" class="span4" id="king"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $king ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                        Queen <input name="queen" type="text" class="span4" id="queen"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $queen ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                        Twin <input name="twin" type="text" class="span4" id="twin"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $twin ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                        Full <input name="full" type="text" class="span4" id="full"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $full ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                        Rollaways <input name="rollaways" type="text" class="span4" id="rollaways"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $rollaways ?>">
                                    </div>
                                    <div class="control-group-inline" style="padding-top: 10px;" align="center">	
                                        Bunk <input name="bunk" type="text" class="span4" id="bunk"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $bunk ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                        Daybed <input name="daybed" type="text" class="span4" id="daybed"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $daybed ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                        Trundles <input name="trundles" type="text" class="span4" id="trundles"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $trundles ?>">&nbsp;&nbsp;&nbsp;&nbsp;
                                        Pull out sofa <input name="pull" type="text" class="span4" id="pull"  maxlength="2" placeholder="0" style="width: 4%;" value="<?php echo $pull ?>">
                                    </div>
                    		   </div>
                               

                               <div class="panel-body">
                                
                               </div>                    
                          </div>
                      </div>
                  </div>
              </div>        
              <div class="control-group" style="padding-top: 10px;">	 
                <button class="btn btn-primary" type="submit" id="enviar">Save</button>
                <a href="editRoom.php?id=<?php echo $Id;?>">
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
		<strong>MESSAGE!</strong> <span class="textmensaje">This room exist already</span>
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
                    ¡Record upgraded!
                </h4>
            </div>
            <div class="modal-body">
                The room has been upgraded successfully. <br>                
            </div>
            <div class="modal-footer">			
                    <a href = "editRoom.php?id=<?php echo $Id?>" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                   Ok
                </button> 
                    </a>					
            </div>
        </div>						
    </div>					
 </div>
 
 <div class="modal" id="light2" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <a href = "editRoom.php?id=<?php echo $Id?>" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"> 
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