<?php 
session_start();
error_reporting(0);
	//=======Redirigir al login  ===================
	if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) { //=======Redirigir al login===================
	header("Location: login.php");
	}
require_once('tools/mypathdb.php');
$_SESSION['valor'] = 5; //Activa la opcion del menu actual
include "header.php";
?>

<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("Amenities Villas of Luxury Rentals International");
	});
	
    //FUNCIÓN ASIGNAR VALOR A ICONOS DEL DETALLE DE LA HISTORIA
    function ValorIconos(id) {
        $('#ErrorBoton').hide();
        $("#editar").attr("onclick", "Modificar(" + id + ");");
        $("#eliminar").attr("onclick", "Eliminar(" + id + ");");
    }
		 
	//FUNCIÓN ERROR BOTON
    function Error() {
        $('#ErrorBoton').show();	 
	}
	
	//FUNCIÓN PARA MODIFICAR
    function Modificar(id) {
		window.location.href='editAmenity.php?id=' + id;
    }
	
	//FUNCIÓN PARA ELIMINAR
    function Eliminar(id) {
		window.location.href='confirmarEliminarAmenitie.php?id=' + id;
		//$eliminarId=id;		
		//document.getElementById('confirmar').style.display='block';document.getElementById('fade').style.display='block';
    }

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
<script type="text/javascript">

    //Metodo para cargar los datos personales
    $("body").on('submit', '#formBuscar', function(event) {
		event.preventDefault()
		if ($('#formBuscar').valid()) {
			$.ajax({
				type: "POST",
				url: "buscarAmenity.php",
				dataType: "json",
				data: $(this).serialize(),
				success: function(respuesta) {
					if (respuesta.error == 1) {
						$('#error1').show();
						setTimeout(function() {
						$('#error1').hide();
						}, 2000);
					}
					
					if (respuesta.exito == 1) {
						$('#exito1').show();
						setTimeout(function() {
						$('#exito1').hide();
						window.location.href='amenitieslist.php'; 
					  }, 1000);
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
        Amenities
        <small>List</small>
      </h2>
      <ul class="breadcrumb">      
        <li><span id="titulo"></span></li>
        	<form  method="post" name="formBuscar" id="formBuscar">
        		<div class="controls">
          			<input type="text" id="nombre" name="nombre" style="width: 20%;"  placeholder="Amenity" />	  
        		
           			<button id="search-btn" type="submit" name="submit" class="btn-main"><i class="fa fa-search" aria-hidden="true"></i>
 Search </button>
      		</form>
      				<a href='amenityAdd.php'>
      				<button type="button" class="btn-main"><i class="fa fa-plus" aria-hidden="true"></i>
 Add New </button>
      				</a> 
                    
            	</div>
      </ul>
    </div>
  </section>
 

 
  <!-- .................................... $Contenido .................................... -->
  <section class="section-content section-contact section-color-graylighter" style="padding-top: 0px;">
    <div class="container">
    	    <div id="sresults" class="col-md-12">
   			<table id="sTable" class="tablesorter table table-bordered table-hover" style="border:1px solid #ECF0F1">
      			<thead>
        		<tr style="background:#f5f5f5">
                    <td colspan="9" style="text-align: right">
                        <span class="span_required"id="ErrorBoton" style="display: none; font-size: 15px; float: left">
                            Choose the amenity for edit or delete
                        </span>
                        <span style="margin-right: 10px">   
                            <i class="fa fa-pencil-square-o" aria-hidden="true" onclick="Error();" id="editar" style="cursor: pointer" title="Modificar"></i>
                        </span>
                        <span style="margin-right: 10px">
                            <i class="fa fa-trash" aria-hidden="true" onclick="Error();" id="eliminar" style="cursor: pointer" title="Eliminar"></i>
                        </span>
                    </td>
                </tr>
                <tr>                    
                    <th width="50%" class="header" style="text-align: center">Amenity</th>
					<th width="20%" class="header" style="text-align: center">Category</th>                    
                    <th width="10%" class="header" style="text-align: center">Select</th>
                </tr>
            </thead>
            <tbody id="contenido"> 
<?php
		
		//================================================Recuperar registros tabla amenitie=============================================
		
		if (!empty($_SESSION['amenity'])) 
		{	
			$name = $_SESSION['amenity'];
			$query = ("SELECT * FROM amenitie WHERE description LIKE '%$name%'");
		}
		else
		{
			$query = ("SELECT * FROM amenitie");
		}


		$resultado=mysql_query($query,$dbConn);
        while($data_his=mysql_fetch_array($resultado))
      {
		$description = $data_his['description'];
		$category = $data_his['category'];		
		$amenitieId = $data_his['amenitieid'];  
	    ?>
            <tr>
                <td><?php echo $description;?></td>
                <td><?php echo $category;?></td>                             
                <td style="text-align: center">
                  <input type="radio" name="his_cita" id="his_cita" value="<?php echo $amenitieId ?>" onclick="ValorIconos(this.value)">
                </td>
              </tr>
        <?php } // fin del bucle de instrucciones
mysql_free_result($dataDetail); // Liberamos los registros
?>

            </tbody>
          </table>
           <!-- pager -->
    <div id="pager" class="pager">
      <form>
        <input class="pagedisplay" readonly type="text">
        <button type="button" class="btn-main first"><i class="fa fa-fast-backward" aria-hidden="true"></i></button>
        <button type="button" class="btn-main prev"><i class="fa fa-backward" aria-hidden="true"></i></button>
        <button type="button" class="btn-main next"><i class="fa fa-forward" aria-hidden="true"></i></button>
        <button type="button" class="btn-main last"><i class="fa fa-fast-forward" aria-hidden="true"></i></button>

        <select class="styled-select pagesize" style="height:30px; width:auto">
          <option selected="selected" value="10">10</option>
          <option value="20">20</option>
          <option value="30">30</option>
          <option value="50">50</option>
        </select>
      </form>
    </div>
    </div>
    </div>
  </section>

    <!-- .................................... $footer .................................... -->
  <?php //include "headers/otrofooter.php"; ?>
  
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