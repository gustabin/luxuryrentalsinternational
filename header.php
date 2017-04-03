<?php 
$valor = $_SESSION['valor'];
if ($valor == '1') 
	{
	$index = "active";
	}
if ($valor == '2') 
	{
	$propertylist = "active";
	}
if ($valor == '3') 
	{
	$propertyEditor = "active";
	}
if ($valor == '4') 
	{
	$mapAddress = "active";
	}
if ($valor == '5') 
	{
	$amenities = "active";
	}
if ($valor == '6') 
	{
	$settingRoom = "active";
	}
if ($valor == '7') 
	{
	$uploadImages = "active";
	}
if ($valor == '8') 
	{
	$gallery = "active";
	}
if ($valor == '9') 
	{
	$review = "active";
	}
if ($valor == '10') 
	{
	$lead = "active";
	}
if ($valor == '11') 
	{
	$login = "active";
	}
if ($valor == '12') 
	{
	$customers = "active";
	}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
  <meta charset="utf-8">
  <meta name="robots" content="noindex">
    <!-- Page title -->
    <title>Back end | Luxury Rentals International</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <!-- Vendor styles -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.css" />
    <link rel="stylesheet" href="vendor/metisMenu/dist/metisMenu.css" />
    <link rel="stylesheet" href="vendor/animate.css/animate.css" />
    <link rel="stylesheet" href="vendor/bootstrap/dist/css/bootstrap.css" />

    <!-- App styles -->
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="fonts/pe-icon-7-stroke/css/helper.css" />
    <link rel="stylesheet" href="styles/style.css">
    
  
  <link href="css/jquery-ui.css" rel="stylesheet" type="text/css" media="screen" />
  <link href="css/jquery.ui.datepicker.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.ui.core.css" rel="stylesheet" media="screen" />
  <link href="css/jquery.ui.theme.css" rel="stylesheet" media="screen" />
  

  <!-- .................................... $scripts .................................... -->
  <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery-ui.js"></script>
 
  <script src="js/jquery.min.js"></script>
  <script src="js/modernizr.min.js"></script>
  
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
	rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
	rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
	type="text/javascript"></script>

  <!--script src="js/bootstrap.min.js"></script!-->
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.hoverdir.min.js"></script>
  <script src="js/jquery.isotope.min.js"></script>
  <script src="js/jquery.masonry.min.js"></script>
  <script src="js/jquery.fitvids.min.js"></script>
  <script src="js/jquery.flexslider.min.js"></script>
  <!--script src="<?php// echo INCLUDES ?>js/script.js"></script!--> 

  <script type="text/javascript" language="javascript" src="js/jquery.validate.js"></script>
  <script type="text/javascript" language="javascript" src="js/jquery.ui.datepicker.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.ui.core.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.ui.widget.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/datepiker_lenguaje.js"></script>
  <script type="text/JavaScript" language="javascript" src="js/jquery.maskedinput.js"></script>	
    
  <script type="text/javascript" src="js/jquery.tablesorter.js"></script> 
  <script type="text/javascript" src="js/jquery.tablesorter.pager.js"></script> 
  
  <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />



<script type="text/javascript" language="javascript" src="js/jquery.form.js"></script>
<script type="text/javascript" language="javascript" src="js/si.files.js"></script>  
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>

<body class="landing-page">
  <!-- .................................... $header .................................... -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="http://www.luxuryrentalsinternational.com" class="navbar-brand">LRI</a>
            <div class="brand-desc">
                Back end desktop for LRI 
                <?php
                if (!empty($_SESSION['usuario'])) { //=======Redirigir al login===================
				?>
					<span style="font-size:10px"><?php echo "- ".$_SESSION['nombre'] ." ".$_SESSION['apellido'] ?></span>
				<?php } ?>                
            </div>            
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="<?php echo $index; ?>"><a class="page-scroll" href="index.php">Home</a></li>
                <li class="<?php echo $propertylist; ?>"><a class="page-scroll" page-scroll href="propertylist.php">Property list</a></li>
                <!--li class="<?php //echo $propertyEditor; ?>"><a class="page-scroll" page-scroll href="editVilla.php">Property Editor</a></li!-->
                <!--li class="<?php //echo $mapAddress; ?>"><a class="page-scroll" page-scroll href="editVilla.php#MapAddress">Map Address</a></li!-->
                <li class="<?php echo $amenities; ?>"><a class="page-scroll" page-scroll href="amenitieslist.php">Amenities </a></li>
                <!--li class="<?php //echo $settingRoom;?>"><a class="page-scroll" page-scroll href="#clients">Setting room / bathroom</a></li!-->
                <!--li class="<?php //echo $uploadImages; ?>"><a class="page-scroll" page-scroll href="#contact">Upload images</a></li!-->
                <!--li class="<?php //echo $gallery; ?>"><a class="page-scroll" page-scroll href="#contact">Gallery</a></li!-->
                <li class="<?php echo $review; ?>"><a class="page-scroll" page-scroll href="comment.php">Review</a></li>
                <li class="<?php echo $lead; ?>"><a class="page-scroll" page-scroll href="leads.php">Lead</a></li>
                <li class="<?php echo $customers; ?>"><a class="page-scroll" page-scroll href="customers.php">Customers</a></li>
                <?php
                if (!empty($_SESSION['usuario'])) { //=======Redirigir al login===================
				?>
					<li class="<?php echo $login; ?>"><a class="page-scroll" page-scroll href="logout.php">Logout</a></li>
				<?php } else {?>     
                	<li class="<?php echo $login; ?>"><a class="page-scroll" page-scroll href="login.php">Login</a></li>
                <?php } ?>                    
            </ul>
        </div>
    </div>
</nav>
