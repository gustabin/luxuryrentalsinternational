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

<script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script> 
 
<script type="text/javascript" src="js2/jquery.tablesorter.js"></script> 
<script type="text/javascript" src="js2/jquery.tablesorter.pager.js"></script> 

<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>

<!-- menu -->
<?php include "menuSite.php" ?>
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
			  window.location.href='tablesorter.php';
		    }			    
		}
	    });
	}
	});
		
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
<script type = "text/javascript">                            // tablesorter pagination
$(document).ready(function() {
    $('#sTable').tablesorter().tablesorterPager({container: $("#pager")}); 
}); 
</script>


  <!-- .................................... $breadcrumb .................................... -->
  <style type="text/css">
.section-content.section-contact.section-color-graylighter .container #sresults #sTable #contenido tr td .col-md-4 .thumb-info-type {	color: #F00;}
  </style>


  		<section id="vacation" class="white-bg">
			<div class="container">
				<div class="row divide-md5">
					<div class="col-sm-12 divide-md5 text-center">						
						<div class="panel">
                              <div class="panel-heading">
							  <br>
                                <h2>Find your luxury villa</h2>
                              </div>
                              <div class="panel-body" style="background-color:#DFDFDF">
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
								<div class="alert alert-danger mensaje_form" style="display: none" id="error">
									<button data-dismiss="alert" class="close" type="button">x</button>
									<strong></strong> <span class="textmensaje">Choose a Location</span>
								</div>								 
                              </div>
                        </div>
					</div>
				</div>
			</div>
		</section>
<!-- busqueda -->
  <?php                        
	//********** Buscar los productos en la tabla villa *********************************************
	$country = $_SESSION['country'];
	$city = $_SESSION['city'];
	$bedrooms = $_SESSION['bedrooms'];
	$bathrooms = $_SESSION['bathrooms'];
    $villaName = $_SESSION['villaName'];

	$variables = $country . $city . $_SESSION['bedrooms'] . $_SESSION['bathrooms'] . $_SESSION['villaName']; // . $_SESSION['propertyType'];
	// todas las busquedas estan ordenadas por el numero de cuartos y de baños
    //echo $_SESSION['villaName'];
	
	if (!empty($country)) {				
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail, imagegallery WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND villadetail.status=0");							
	}	
	
	if ( (!empty($bedrooms)) ) {	
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE quantityroom>= '$bedrooms' AND villadetail.status=0");
		if ($bedrooms == 4 ) {
			$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE quantityroom>= '$bedrooms' AND villadetail.status=0");	
			}
	}		
	
	if ( (!empty($bathrooms)) ) {								
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE quantitybath>='$bathrooms' AND villadetail.status=0");	
		if ($bathrooms == 4 ) {
			$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE quantitybath>='$bathrooms' AND villadetail.status=0");	
			}							
	}
	if ((!empty($country)) and (!empty($city))) {							
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0");
	}						
	if (  (!empty($country)) and (!empty($city)) and (!empty($bedrooms))  ) {	
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0 AND quantityroom>= '$bedrooms' order by quantityroom ASC" );	
		if ($bedrooms == 4 ) {
			$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0 AND quantityroom>= '$bedrooms' order by quantityroom ASC");	
			}
	}		
	if (  (!empty($country)) and (!empty($city)) and (!empty($bathrooms)) ) {							
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0 AND quantitybath>='$bathrooms' order by quantitybath ASC");							
		if ($bathrooms == 4 ) {
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0 AND quantitybath>='$bathrooms' order by quantitybath ASC");
			}							
	} 
	if (  (!empty($country)) and (!empty($city)) and (!empty($bedrooms)) and (!empty($bathrooms)) ) {	
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0 AND quantityroom>= '$bedrooms' AND quantitybath>='$bathrooms' order by quantityroom, quantitybath ASC");
		if ($bedrooms == 4 ) {
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0 AND quantityroom>= '$bedrooms' AND quantitybath>='$bathrooms' order by quantityroom, quantitybath ASC");
			}
		if ($bathrooms == 4 ) {
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0 AND quantityroom>= '$bedrooms' AND quantitybath>='$bathrooms' order by quantityroom, quantitybath ASC");
			}
		if (($bedrooms == 4 ) AND ($bathrooms == 4 )) {
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND villadetail.status=0 AND quantityroom>= '$bedrooms' AND quantitybath>='$bathrooms' order by quantityroom, quantitybath ASC");
			}
	}
	if (!empty($villaName)) {
    	$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail, imagegallery WHERE villadetail.VillaId=villa.VillaId AND villa.Name like % '$country' % AND villadetail.status=0");
    }
	?>
  <!-- fin de busqueda -->
  <?php
		//echo $queryDetail;
		$resultadoDetail=mysql_query($queryDetail,$dbConn);
		$numero_total_filas = mysql_num_rows($resultadoDetail);			
	?>
<!-- .................................... $Contenido .................................... -->
			
    <div class="container-fluid">
	<div class="row">
		<div class="col-md-1">
        <p>&nbsp;</p>
        </div>
		<div class="col-md-10">
                    <div class="form-group col-md-12">
                    Find your luxury villa
<form  method="post" name="formSearch" id="formSearch">
                            <div class="controls">
                                <input type="text" id="nombre" name="nombre" style="width: 20%;"  placeholder="Villa" />	  
                            
                                <button id="search-btn" type="submit" name="submit" class="btn btn-danger"><i class="icon-search"></i> Search </button>
                            </div>
                        </form>
                    </div>
                    
                    <div id="sresults" class="col-md-12">
                      <table width="1200" align="center" class="tablesorter table table-bordered table-hover" id="sTable" style="border:1px solid #ECF0F1">
                        <thead bgcolor="#008CC8">
                            <tr>                    
                               
                                <th width="45%" class="header" style="text-align: center">Picture</th>
                                
                            </tr>
                        </thead>
                        <tbody id="contenido"> 
                        
                      <tr>
                        
                        <td>
                        <div class="col-md-8">                        
                            <div class="portfolio-item img-thumbnail">
                            <?php 
	$numero_filas=1;
	
	//while ($numero_filas <=10) {	?>	   
       <div class="row">
           <div class="col-md-1">
                 &nbsp; 
           </div>
           <!-- iniciar bucle -->
            <?php						
            $x=1;						
            while($dataDetail=mysql_fetch_array($resultadoDetail))
                {								
                $country = $dataDetail['Country'];
                $name = $dataDetail['Name'];
                $pricefrom = $dataDetail['pricefrom'];
                $priceto = $dataDetail['priceto'];
                $villaId = $dataDetail['VillaId'];
                $city = $dataDetail['City'];
                $quantityroom = $dataDetail['quantityroom'];				
                $quantitybath = $dataDetail['quantitybath'];							
                $pathVilla = $dataDetail['PathVilla'];
                // --- Buscar en la tabla imagegallery ------------------
                $queryImage = ("SELECT * FROM imagegallery WHERE VillaId= '$villaId'");
                $resultadoImage=mysql_query($queryImage,$dbConn);
                $dataImage=mysql_fetch_array($resultadoImage);							
                $fullpath = $pathVilla . "/banner.jpg" ;		
                //mysql_free_result($resultadoImage); // Liberamos los registros
                //-- contar dos villas por row Featured Villas -->							
                ?>
		   		<?php if ($x<=2) { ?>
                <?php //if (($x<=2) and ($numero_filas<=10)){ ?>
                            <div class="col-xs-18 col-sm-6 col-md-5">
                                <div class="thumbnail">            
                                    <a href="villa.php?villaId=<?php echo $villaId ?>" class="thumb-info" style="color:#132B49;">
                                    <img class="img-responsive" src="<?php echo $fullpath ?>">
                                    <div class="caption">
                                      <div class="row">
                                    <div style="margin-left: 15px; margin-top: 15px;">
                                        <h3>
                                            <?php echo $name; ?>
                                            </a>
                                        </h3>
                                    </div> 
                                    <div class="col-md-6">
                                        <p><?php echo $quantityroom?> Bedrooms  / <?php echo $quantitybath ?> Bathrooms<br>
                                        <p><?php echo  $city; ?> &nbsp; <?php echo  $country; ?><br>   
                                        Starting at $<?php echo $pricefrom; ?></p>  											
                                    </div>
                                    <div class="col-xs-18 col-sm-6 col-md-5" style="text-align: right;">
                                        <a href="villa.php?villaId=<?php echo $villaId ?>">
                                        <button type="submit" class="btn btn-default">View Villa</button></a>
                                        <a href="goFavorites.php?VillaId=<?php echo $villaId ?>">
                                    <?php
                                    //*********************Buscar si ya existe esa villa en la tabla temporal ***************************
                                    $email = $_SESSION['email'];
                                    $query =  mysql_query("SELECT * FROM tbl_temporal WHERE email='".$email."' AND VillaId = '".$villaId."'");	
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
                                //mysql_free_result($dataTemporal); // Liberamos los registros
                                ?>
                                    </a>                                            
                                </div>
                            </div>
                        </div>
                    </div>
                   </div>           
			 <?php $numero_filas++; $x++; 	             	
             } //($x<=2)
             ?>         
             <?php if ($x==3) { 	  
				  $x=1; 
				  ?>           
				  <div class="col-md-1">
					 &nbsp; 
				  </div>         
                  </div><!-- End row -->  
                  <div class="row">
                  <div class="col-md-1">
                     &nbsp; 
                  </div>  
                  <?php
			} //($x==3)	
			
			} // while
	   ?>
		  <!-- finalizar bucle --> 
          <div class="col-md-1">
             &nbsp; 
          </div>  
      </div><!-- End row -->  
    <?php  // fin del bucle de instrucciones
	//} //($numero_filas <=10)	
    //mysql_free_result($resultado); // Liberamos los registros
    ?>   
                            </div>
                           <p></p>
                        </div>
                        </td>
                   
                       
                        </tr>          
                        <?php 
						//}  //fin del bucle de instrucciones
                       // mysql_free_result($resultado); // Liberamos los registros
                        ?>
                        </tbody>
                        </table>
                       <!-- pager -->
                        <div id="pager" class="pager">
                           <form>
                            <input class="pagedisplay" readonly type="text">
                            <button type="button" class="btn btn-danger first"><i class="fa fa-fast-backward" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-danger prev"><i class="fa fa-backward" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-danger next"><i class="fa fa-forward" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-danger last"><i class="fa fa-fast-forward" aria-hidden="true"></i></button>
                            <select class="styled-select pagesize" style="height:30px; width:auto">
                              <option selected="selected" value="10">10</option>
                              <option value="20">20</option>
                              <option value="30">30</option>
                              <option value="50">50</option>
                            </select>
                          </form>
                      </div>
          </div>  <!--div id="sresults" class="col-md-12"!-->
		</div>
        <div class="col-md-1">
        <p>&nbsp;</p>
        </div>
	</div>
</div>
<?php 
	//mysql_close(); //desconectar();
	include "footer.php"; 
?>