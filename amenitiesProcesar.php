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
	$villaId = $_POST ['villaId']; //viene oculto
	// ===================Borrar los amenities de esa villa ====================================
	$query=mysql_query("DELETE from villaamenities WHERE villaid='$villaId'");
	// ********* recoger datos del select multiple ***********
	$alsoLike = $_POST ['lstFruits'];
	for ($i=0;$i<count($alsoLike);$i++)    
	{     
	$also= $also . $alsoLike[$i].", ";    
	$amenitiid = $alsoLike[$i];	
	// ===================Insertar en villaamenities ===========================================
	$query = "INSERT INTO villaamenities (amenitiid, villaid) VALUES ('".$amenitiid."','".$villaId."')";
	$ejecutar = mysql_query($query);	
	} 
	mysql_free_result($resultadoDetail); // Liberamos los registros		
	mysql_close();	//cerrar la conexion a la bd	
	$amenities = $also;

	// ===================== Buscar los datos en villadetail =========================================================	
	$queryDetail = "SELECT * FROM villadetail WHERE VillaId='$villaId'";	
	$resultadoDetail=mysql_query($queryDetail,$dbConn);
	while($dataDetail=mysql_fetch_array($resultadoDetail))
			{							
			$sql = "UPDATE villadetail SET amenities='$amenities' WHERE VillaId=$villaId";
			$resultadoSql=mysql_query($sql,$dbConn);
			mysql_fetch_array($resultadoSql);
					
			$data = array("exito" => '1');
			die(json_encode($data));
			}		
	mysql_free_result($resultadoDetail); // Liberamos los registros												
	mysql_close(); //desconectar();			
?>