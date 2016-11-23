<?php 
session_start(); 
require_once('tools/mypathdb.php');  
error_reporting(0);
include "header.php"; 
include "menuSiteFavorites.php" 
?>
<style>
.nav a {
    color: black; {   
	
}
</style>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<div>&nbsp;</div>
<body data-spy="scroll" data-target=".navbar" data-offset="61">
<!-- Comernzar desde aqui -->
	<!-- Start Body -->
<?php	
$email = $_SESSION['email'];
$mysql=("SELECT * FROM tbl_temporal WHERE email='".$email."'");
$resultado=mysql_query($mysql,$dbConn);
$fila=mysql_fetch_array($resultado);
	if (empty($fila)) {
?>
	<div class="container">
        <div class="row">
        	<div class="aboutus">
           <img src="img/favorites.jpg"><br><br>
<br><br>
              <h3>
Uh Oh... seems like you haven't added any villa to your favorites. </h3><br>
<p style="text-align: center; font-size:15px; line-height: 28px;">
Whenever you see a villa you like, click on the <span style="background-color: #132b49; border-radius: 4px; width:30px; padding: 10px; color: #FFFFFF;"><i class="fa fa-heart fa-md" aria-hidden="true"></i></span> to save it! <br>
After saving it, you can come back here and see all your Favorite Villas.<br>

If you're not automatically redirected, click <a href="vacation.php" style="color: #F60">here</a> to see more villas. </p>
              <br /><br />
        	</div>
   	  </div>
    </div>
    <?php
	} else {
	?>	
	<!-- Mostrar villas favoritas -->	
    <section id="villasFavoritas">	
     <!--section id="villasFavoritas" style="display: none;"!-->		
        <div class="container-fluid" id="tourpackages-carousel">   
        	<div class="row">
            	<div class="aboutus">
         			<img src="img/favorites.jpg"><br><br>
            	</div>
            </div>
          <div class="row">
           <div class="col-md-1">
                 &nbsp; 
           </div>
            

<?php	
$email = $_SESSION['email'];
$mysql=("SELECT * FROM tbl_temporal WHERE email='".$email."'");

$resultado=mysql_query($mysql,$dbConn);
$x=1;
while($fila=mysql_fetch_array($resultado))
	{
	$VillaId= $fila["VillaId"];
						$queryDetail = ("SELECT villa.VillaId, villa.Name, villa.pricefrom, villa.priceto, villadetail.Country, villadetail.City, villadetail.quantityroom, villadetail.quantitybath, villadetail.PathVilla FROM villa, villadetail, imagegallery WHERE villadetail.VillaId=villa.VillaId AND villa.VillaId=$VillaId");		
						//var_dump($queryDetail);
						//die();			
						$resultadoDetail=mysql_query($queryDetail,$dbConn);
						
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
							mysql_free_result($resultadoImage); // Liberamos los registros
							//-- contar dos villas por row  -->													
							}							
     					?>	
							
		
        <?php if ($x<=2) { ?>
		<div class="col-xs-18 col-sm-6 col-md-5">
          <div class="thumbnail">
            <a href="villa.php?villaId=<?php echo $villaId ?>" class="thumb-info" style="color:#132B49; "><img class="img-responsive" src="<?php echo $fullpath ?>">
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
                        <div class="col-md-6" style="text-align: right;">
                            <a href="villa.php?villaId=<?php echo $villaId ?>"><button type="submit" class="btn btn-default">View Villa</button></a>
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
		mysql_free_result($dataTemporal); // Liberamos los registros
	?>
                            </a>                                            
                        </div>
                    </div>
                </div>
            </div>
          </div>
<?php
		}
$x++; 

if ($x==3) { 	  
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

	}
	mysql_free_result($resultado); // Liberamos los registros
?>
							
                        <div class="col-md-1">
             &nbsp; 
          </div>         
      </div><!-- End row -->      
    </div><!-- End container -->   
    </section>
<!-- End Mostrar villas favoritas -->
    <?php
	}
?>
<!-- End Body -->
<!-- Terminar aqui -->
<!-- Start of LiveChat (www.livechatinc.com) code -->
<script type="text/javascript">
window.__lc = window.__lc || {};
window.__lc.license = 5249191;
(function() {
  var lc = document.createElement('script'); lc.type = 'text/javascript'; lc.async = true;
  lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(lc, s);
})();
</script>
<!-- End of LiveChat code -->
<?php 
	mysql_close(); //desconectar();
	include "footer.php"; 
?>