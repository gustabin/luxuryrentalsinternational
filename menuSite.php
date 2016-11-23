<?php 
session_start(); 
require_once('tools/mypathdb.php');  
?>
<style>
/* Círculos de colores numerados */
span.red {
  background: #ED8000;
   border-radius: 0.8em;
  -moz-border-radius: 0.8em;
  -webkit-border-radius: 0.8em;
  color: #ffffff;
  display: inline-block;
  /*font-weight: bold;*/
  line-height: 1.6em;
  /*margin-right: 15px;*/
  text-align: center;
  width: 1.6em; 
}
</style>
    <!-- Start navigation -->
		<div class="navbar navbar-default2 navbar-transparent navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
	<!-- Light and dark logo -->
					<a href="index.php" class="navbar-brand">
						<img class="img-responsive" src="img\logo-light.png" alt="" data-start="opacity: 1;" data-20p="opacity: 0;">
                        <img class="img-responsive" src="img\logo-light.png" alt="" data-start="opacity: 0;" data-20p="opacity: 1;">
						<!--img class="img-responsive" src="img\logo.png" alt="" data-start="opacity: 100;" data-20p="opacity: 1;"!-->
					</a>
                    
                    
                    
				</div>
                <!-- ************** Buscar si hay alguna villa en favorites **************** -->
                <?php 
				$email = $_SESSION['email'];
				$mysql=("SELECT * FROM tbl_temporal WHERE email='".$email."'");
				$resultadoTemporal=mysql_query($mysql,$dbConn);
				$fila=mysql_fetch_array($resultadoTemporal);
				$numero_total_filas = mysql_num_rows($resultadoTemporal);
				mysql_free_result($resultadoTemporal); // Liberamos los registros
				?>
	<!-- Navigation links -->    				
				<div class="collapse navbar-collapse navbar-right" id="navbar-collapse">
					<ul class="nav navbar-nav navbar-right">
                        <li><a href="#" data-start="color: rgb(19, 43, 73);" data-20p="color: rgb(0, 0, 0);"></a></li>
                        <li><a href="index.php" data-start="color: rgb(255, 255, 255);" data-20p="color: rgb(255, 255, 255);">Home</a></li>
						<li><a href="favorites.php" data-start="color: rgb(255, 255, 255);" data-20p="color: rgb(255, 255, 255);">Favorites 
						<?php if ($numero_total_filas>=1) { ?>
                        <span class="red"><?php echo $numero_total_filas ?></span>
                        <?php } ?>
						</a></li>
						<li><a href="vacation.php" data-start="color: rgb(255, 255, 255);" data-20p="color: rgb(255, 255, 255);">Vacation Rentals</a></li>
						<li><a href="homeowners.php" data-start="color: rgb(255, 255, 255);" data-20p="color: rgb(255, 255, 255);">Homeowners</a></li>
						<li><a href="about.php" data-start="color: rgb(255, 255, 255);" data-20p="color: rgb(255, 255, 255);">About Us</a></li>						
						<li><a href="contact.php" data-start="color: rgb(255, 255, 255);" data-20p="color: rgb(255, 255, 255);">Contact</a></li>		
                        <li><a href="http://www.luxuryrentalsinternational.com/SignIn.aspx" data-start="color: rgb(255, 255, 255);" data-20p="color: rgb(255, 255, 255);">Login</a></li>
						<li><a href="#" data-start="color: rgb(255, 255, 255);" data-20p="color: rgb(255, 255, 255);">Sign Up</a></li>				
					</ul>
				</div>
			</div>
		</div>
	<!-- End navigation -->