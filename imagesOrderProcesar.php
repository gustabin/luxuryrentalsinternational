<?php
	session_start();  
	error_reporting(0);
	//=======Redirigir al login  ===================
	if (($_SESSION['usuario']<=2) OR (empty($_SESSION['usuario']))) { 	
	$data=array("error" => '1');
		die(json_encode($data));
	}
	// conector de BD 
	require_once('tools/mypathdb.php');    
	$villaId = $_SESSION['villaId'];
		
	// ********* recoger datos del arreglo ***********
	$alsoLike = $_POST ['Order'];
	$array = explode(",", $alsoLike);
	for ($i=0;$i<count($array);$i++)    
	{     
	$elemento= $elemento . $array[$i].", "; 
	//echo $i. "=" .$array[$i]. "\n";	
	} 
	$elementoArray = $elemento;
	
	// --- Buscar en la tabla imagegallery ------------------
	$queryImage = ("SELECT * FROM imagegallery WHERE VillaId='$villaId' ORDER BY DisplayOrder");	
	$resultadoImage=mysql_query($queryImage,$dbConn);	
	$i=0;
	while($dataImage=mysql_fetch_array($resultadoImage))
		{	
		//cargar los datos del arreglo								
		$DisplayOrder = $dataImage['DisplayOrder'];
		$ImageGalleryId = $dataImage['ImageGalleryId'];
		//echo "DisplayOrder> " .$DisplayOrder.  " Array".$array[$i]. "\n";
		
		$actualizarOrden = mysql_query("UPDATE imagegallery SET DisplayOrder='$i' WHERE ImageGalleryId='$array[$i]'");
//
		//echo $actualizarOrden. "\n";
		$imagen=$imagen+1;	
		$i++;
		}		

		//=========================================== Redireccion a otra pagina  =====================================
		//Los datos se han actualizado correctamente.';		
				$data = array("exito" => '1');
				die(json_encode($data));									
				//desconectar();
				mysql_free_result($resultadoImage); // Liberamos los registros		
				mysql_close();	//cerrar la conexion a la bd								
?>