<?php
session_start(); 
if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) { //=======Redirigir al login===================
	header("Location: login.php");
}
//error_reporting(0);
require_once('tools/mypathdb.php');
	$amenitieId = $_GET ['id'];
?>	
<link href="css/bootstrap.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">

<div class="modal" id="confirmar" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="top: 50px; margin-top: 0px;">
    <div class="modal-dialog" style="margin-top: 0px;">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#99CA3D; color:black;">	
                <h4 class="modal-title" id="myModalLabel">
                   Delete record
                </h4>
            </div>
            <div class="modal-body">
                <h2>Do you want to delete this amenitie?</h2><br>
                <h3>Are you sure?</h3><br>                
            </div>
            <div class="modal-footer">	

                <a href = "eliminarAmenity.php?id=<?php echo $amenitieId ?>"> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                   		Ok
                	</button> 
                </a>	
                <a href = "amenitieslist.php">
                  	<button type="button" class="btn btn-primary" data-dismiss="modal">
                   		Cancel
                	</button> 
                </a>				
            </div>
        </div>						
    </div>					
 </div>