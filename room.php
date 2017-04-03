<?php 
session_start();
require_once('tools/mypathdb.php');
error_reporting(0);
$_SESSION['valor'] = 2; //Activa la opcion del menu actual
include "header.php";
$villaId=$_GET["id"];
?>

<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>

<script Language="JavaScript">
	$(document).ready(function() {
		$('#titulo').html("");
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
		//window.location.href='editRoom.php?id=' + id;
		window.location.href='editRoom.php?id=' + id;
		
    }
	
	//FUNCIÓN PARA ELIMINAR
    function Eliminar(id) {
		window.location.href='confirmarEliminarRoom.php?id=' + id;
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
				url: "formBuscarProcesarRoom.php",
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
						window.location.href='room.php?id=<?php echo $villaId;?>'; 
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
        Room
        <small>List of <?php echo $_SESSION['villaName']; ?></small>
      </h2>
       <a href='editVilla.php?id=<?php echo $villaId ?>'>
      	<button type="button" class="btn-main"><i class="fa fa-reply" aria-hidden="true"></i> Back to feature </button>
      </a>      
      <ul class="breadcrumb">      
        <li><span id="titulo"></span></li>
        	<form  method="post" name="formBuscar" id="formBuscar">
        		<div class="controls">
          			<input type="text" id="nombre" name="nombre" style="width: 20%;"  placeholder="Room name" />	  
        		
           			<button id="search-btn" type="submit" name="submit" class="btn-main"><i class="fa fa-search" aria-hidden="true"></i>
 Search </button>
      		</form>

                    <a href="roomAdd.php?id=<?php echo $villaId;?>">
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
                    <td colspan="12" style="text-align: right">
                        <span class="span_required"id="ErrorBoton" style="display: none; font-size: 15px; float: left">
                            Choose the room for edit or delete
                        </span>
                        <span style="margin-right: 10px">   
                            <i class="fa fa-pencil-square-o" aria-hidden="true" onclick="Error();" id="editar" style="cursor: pointer" title="Edit"></i>
                        </span>
                        <span style="margin-right: 10px">
                            <i class="fa fa-trash" aria-hidden="true" onclick="Error();" id="eliminar" style="cursor: pointer" title="Delete"></i>
                        </span>
                    </td>
                </tr>
                <tr>                    
                    <th width="30%" class="header" style="text-align: center">Room</th>
					<th width="50%" class="header" style="text-align: center">Description</th>
                    <th width="1%" class="header" style="text-align: center" title="King">K</th>
                    <th width="1%" class="header" style="text-align: center" title="Queen">Q</th>
                    <th width="1%" class="header" style="text-align: center" title="Twin">T</th>
                    <th width="1%" class="header" style="text-align: center" title="Full">F</th>
                    <th width="1%" class="header" style="text-align: center" title="Rollaways">R</th>
                    <th width="1%" class="header" style="text-align: center" title="Bunk">B</th>
                    <th width="1%" class="header" style="text-align: center" title="Daybed">D</th>
                    <th width="1%" class="header" style="text-align: center" title="Trundles">T</th>
                    <th width="1%" class="header" style="text-align: center" title="Pull Out Sofa">P</th>
                    <th width="10%" class="header" style="text-align: center">Select</th>
                </tr>
            </thead>
            <tbody id="contenido"> 
<?php
		
		//================================================Recuperar registros tabla settingroom ======================================
		
		if (!empty($_SESSION['nombreRoom'])) 
		{	
			$name = $_SESSION['nombreRoom'];
			$query = ("SELECT * FROM settingroom WHERE name LIKE '%$name%' AND villaid='$villaId'");
		}
		else
		{
			$query = ("SELECT * FROM settingroom WHERE villaid='$villaId'");
		}
//var_dump($query);

		$resultado=mysql_query($query,$dbConn);
        while($data_his=mysql_fetch_array($resultado))
      {
		$roomName = $data_his['name'];
		$roomDescription = $data_his['description'];	
		$settingroomId = $data_his['settingroomId'];
		$Id = $data_his['id'];	
	    ?>
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
	//mysql_free_result($resultadoDetail); // Liberamos los registros		
	//mysql_close();	//cerrar la conexion a la bd
?>		
        		<tr>
            		<td><?php echo $roomName;?></td>
                    <td><?php echo $roomDescription;?></td> 
                    <td><?php echo $king;?></td>
                    <td><?php echo $queen;?></td>
                    <td><?php echo $twin;?></td>
                    <td><?php echo $full;?></td>
                    <td><?php echo $rollaways;?></td>
                    <td><?php echo $bunk;?></td>
                    <td><?php echo $daybed;?></td>
                    <td><?php echo $trundles ;?></td>
                    <td><?php echo $pull;?></td>           		
                  	<td style="text-align: center">
                      <input type="radio" name="his_cita" id="his_cita" value="<?php echo $Id ?>" onclick="ValorIconos(this.value)">
                  	</td>
                  </tr>
        <?php 
		 $roomName=0;
         $roomDescription=0;
         $king=0;
         $queen=0;
         $twin=0;
         $full=0;
         $rollaways=0;
         $bunk=0;
         $daybed=0;
         $trundles=0;
         $pull=0;
		} // fin del bucle de instrucciones
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