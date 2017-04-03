<?php
session_start(); 
if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) { //=======Redirigir al login===================
	header("Location: login.php");
}
//error_reporting(0);
require_once('tools/mypathdb.php');
	$Id = $_GET ['id'];
	
		
		$queryDetail = ("SELECT * FROM settingbathroom2 WHERE id='$Id'");
		$resultadoDetail=mysql_query($queryDetail,$dbConn);				
		while($dataDetail=mysql_fetch_array($resultadoDetail))
							{								
							$name = $dataDetail['name'];
							$description = $dataDetail['description'];							
							$villaId = $dataDetail['villaid'];						
							}									
		mysql_free_result($resultadoDetail); // Liberamos los registros												
		mysql_close(); //desconectar();

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
                <h2>Do you want to delete this bathroom?</h2><br>
                <h3>Are you sure?</h3><br>                
            </div>
            <div class="modal-footer">	

                <a href = "eliminarBathRoom.php?id=<?php echo $Id ?>"> 
                    <button type="button" class="btn btn-primary" data-dismiss="modal">
                   		Ok
                	</button> 
                </a>	
                <a href = "bathroom.php?id=<?php echo $villaId ?>"> 
                  	<button type="button" class="btn btn-primary" data-dismiss="modal">
                   		Cancel
                	</button> 
                </a>				
            </div>
        </div>						
    </div>					
 </div>