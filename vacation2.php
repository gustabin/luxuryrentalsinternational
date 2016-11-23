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
			  window.location.href='vacation2.php';
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
<style>
.form-vertical select {padding:8px; width:200px;}

.form-vertical input, .form-vertical textarea, .form-vertical select  { 
	color:#d45252; 
    border:1px solid #aaa;
    box-shadow: 0px 0px 3px #ccc, 0 10px 15px #eee inset;
    border-radius:2px;
}
</style>

  		<section id="vacation" class="white-bg">
			<div class="container">
				<div class="row divide-md5">
					<div class="col-sm-12 divide-md5 text-center">						
						<div class="panel">
                              <div class="panel-heading">
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
                              </div>
                        </div>
					</div>
				</div>
			</div>
		</section>
			
<!-- Featured Villas -->
	<div class="container">
        <div class="row">
        	<div class="showing">
			<legend><h3>Showing <?php echo $numeroVillas ?> villas of your <?php echo $country ?> search</h3></legend>
			</div>
        </div>
    </div>
      
  <!-- busqueda -->
  <?php                        
	//********** Buscar los productos en la tabla villa *********************************************
	$country = $_SESSION['country'];
	$city = $_SESSION['city'];
	$bedrooms = $_SESSION['bedrooms'];
	$bathrooms = $_SESSION['bathrooms'];
	$variables = $country . $city . $_SESSION['bedrooms'] . $_SESSION['bathrooms'] . $_SESSION['villaName']; // . $_SESSION['propertyType'];
	
	if (!empty($country)) {				
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail, imagegallery WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country'");							
	}	
	
	if ( (!empty($bedrooms)) ) {	
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE quantityroom= '$bedrooms'");	
		if ($bedrooms == 4 ) {
			$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE quantityroom>= '$bedrooms'");	
			}
	}		
	
	if ( (!empty($bathrooms)) ) {								
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE quantitybath='$bathrooms'");	
		if ($bathrooms == 4 ) {
			$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE quantitybath>='$bathrooms'");	
			}							
	}
	if ((!empty($country)) and (!empty($city))) {							
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city'");
	}						
	if (  (!empty($country)) and (!empty($city)) and (!empty($bedrooms))  ) {	
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND quantityroom= '$bedrooms'");	
		if ($bedrooms == 4 ) {
			$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND quantityroom>= '$bedrooms'");	
			}
	}		
	if (  (!empty($country)) and (!empty($city)) and (!empty($bathrooms)) ) {							
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND quantitybath='$bathrooms'");							
		if ($bathrooms == 4 ) {
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND quantitybath>='$bathrooms'");
			}							
	} 
	if (  (!empty($country)) and (!empty($city)) and (!empty($bedrooms)) and (!empty($bathrooms)) ) {	
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND quantityroom= '$bedrooms' AND quantitybath='$bathrooms'");
		if ($bedrooms == 4 ) {
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND quantityroom>= '$bedrooms' AND quantitybath='$bathrooms'");
			}
		if ($bathrooms == 4 ) {
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND quantityroom= '$bedrooms' AND quantitybath>='$bathrooms'");
			}
		if (($bedrooms == 4 ) AND ($bathrooms == 4 )) {
		$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath FROM villa, villadetail WHERE villadetail.VillaId=villa.VillaId AND villadetail.Country='$country' AND City= '$city' AND quantityroom>= '$bedrooms' AND quantitybath>='$bathrooms'");
			}
	}
	?>
  <!-- fun de busqueda -->
<!-- .................................... $Contenido .................................... -->
  <div class="container-fluid">
	<div class="row">
		
		<div class="col-md-12">
        <div id="sresults" class="col-md-12">
                      <table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
                            <thead>
                            <tr>                    
                                <th width="10%" class="header" style="text-align: left">&nbsp;</th>
                                <th width="40%" class="header" style="text-align: left">&nbsp;</th>
                                <th width="40%" class="header" style="text-align: left">&nbsp;</th>
                                <th width="10%" class="header" style="text-align: left">&nbsp;</th>                               
                            </tr>
                        </thead>
                        <tbody id="contenido">                          
                      <tr>
						<td align="justify">
							<div class="col-md-2">
								&nbsp;                               
							</div> 
                        </td>
						
						<!-- iniciar bucle -->
						<?php
						$resultadoDetail=mysql_query($queryDetail,$dbConn);							
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
							// --- Buscar en la tabla imagegallery ------------------
							$queryImage = ("SELECT * FROM imagegallery WHERE VillaId= '$villaId'");
							$resultadoImage=mysql_query($queryImage,$dbConn);
							$dataImage=mysql_fetch_array($resultadoImage);
							$path = $dataImage['Path'];								
							
							mysql_free_result($resultadoImage); // Liberamos los registros
							//-- contar dos villas por row Featured Villas -->							
							?>
					<?php if ($x<=2) { ?>
                        <td align="justify">
                        <div class="thumbnail">
							<img class="img-responsive" src="img/galleryimages/<?php echo $path ?>">
							<div class="caption">
								<div class="row">
									<div style="margin-left: 15px; margin-top: 15px;">
									   <h3><a href="villa.php?villaId=<?php echo $villaId ?>" class="thumb-info" style="color:#132B49; ">
											<?php echo $name; ?>
											</a>
									   </h3>
									</div>
									<div class="col-md-4">
										<p><?php echo $quantityroom?> Bedrooms  / <?php echo $quantitybath ?> Bathrooms<br>
										<p><?php echo  $city; ?> &nbsp; <?php echo  $country; ?><br>
										Starting at $<?php echo number_format($pricefrom, 2, ",", "."); ?></p>                                 
									</div>                            
									<div class="col-md-4" style="text-align: right;">
									<button type="submit" class="btn btn-default"><a href="villa.php?villaId=<?php echo $villaId ?>">View Villa</a></button>
									<button type="submit" class="btn btn-default"><i class="fa fa-heart fa-lg" aria-hidden="true"></i></button>
								</div>
								</div>                    
							</div>
						</div>
                        </td> 
					<?php $x++; } ?>
						
						 <?php if ($x==3) { 	  
						 $x=1; 
					      ?>
							<td align="justify">
								<div class="col-md-2">
									&nbsp;                               
								</div> 
							</td>
						</tr>
						<tr>
						<td align="justify">
							<div class="col-md-2">
								&nbsp;                               
							</div> 
                        </td>
						<?php
							}
							}
							?>
						  
						<!-- finalizar bucle -->

                        
						
						<td align="justify">
							<div class="col-md-2">
								&nbsp;                               
							</div> 
                        </td>                        
                        </tr>          
                        <?php  // fin del bucle de instrucciones
                        mysql_free_result($resultado); // Liberamos los registros
                        ?>
                        </tbody>
                        </table>
                       <!-- pager -->
                        <div id="pager" class="pager">
                           <form>
                            <input class="pagedisplay" readonly type="text">
                            <button type="button" class="btn btn-danger first"><i class="fa fa-backward" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-danger prev"><i class="fa fa-fast-backward" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-danger next"><i class="fa fa-fast-forward" aria-hidden="true"></i></button>
                            <button type="button" class="btn btn-danger last"><i class="fa fa-forward" aria-hidden="true"></i></button>
                            <select class="styled-select pagesize" style="height:30px; width:auto">
                              <option selected="selected" value="4">8</option>
                              <option value="5">10</option>
                              <option value="6">12</option>
                              <option value="10">20</option>
                            </select>
                          </form>
                      </div>
                </div>  <!--div id="sresults" class="col-md-12"!-->

		</div>
	</div>
</div>
<?php 
	mysql_close(); //desconectar();
	include "footer.php"; 
?>