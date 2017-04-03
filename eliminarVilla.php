<?php
session_start(); 
//error_reporting(0);
require_once('tools/mypathdb.php');
	$villaId = $_GET ['id'];
	
	// ===================== Buscar los datos en villa ==============================================
	$queryVilla = ("SELECT * FROM villa WHERE VillaId='$villaId'");	
	
	$resultadoVilla=mysql_query($queryVilla,$dbConn);
	while($dataVilla=mysql_fetch_array($resultadoVilla))
		{
			$villaName = $dataVilla['Name'];
		}		
	mysql_free_result($resultadoVilla); // Liberamos los registros	
	
	//mysql_close();	//cerrar la conexion a la bd
	
   //=========================eliminar registro de la tabla villa ============================================
   $query=mysql_query("DELETE from villa WHERE VillaId='$villaId'");
   
   // ===================== Buscar los datos en villadetail ==============================================
	$queryDetail = ("SELECT * FROM villadetail WHERE VillaId='$villaId'");			
	$resultadoDetail=mysql_query($queryDetail,$dbConn);
	while($dataDetail=mysql_fetch_array($resultadoDetail))
		{
			$country=$dataDetail['Country'];
			$city=$dataDetail['City'];							
		}		
	mysql_free_result($resultadoDetail); // Liberamos los registros	
	
	//mysql_close();	//cerrar la conexion a la bd
   
   //=========================eliminar registro de la tabla villadetail ============================================
   $query=mysql_query("DELETE from villadetail WHERE VillaId='$villaId'");
   
   //=========================eliminar registro de la tabla settingprice ============================================
   $query=mysql_query("DELETE from settingprice WHERE villaid='$villaId'");
   
   //=========================eliminar registro de la tabla villaamenities ============================================
   $query=mysql_query("DELETE from villaamenities WHERE villaid='$villaId'");
   
   //=========================eliminar registro de la tabla imagegallery ============================================
   $query=mysql_query("DELETE from imagegallery WHERE VillaId='$villaId'");
   
							
   // ========================borrar directorio y las imagenes de la villa ============================================
   function BorrarDirectorio($directorio) {
	$archivos = scandir($directorio); //hace una lista de archivos del directorio
	$num = count($archivos); //los cuenta
	//Los borramos
	for ($i=0; $i<=$num; $i++) {
	 unlink ($archivos[$i]); 
	}
	//borramos el directorio
	rmdir ($directorio);
	}
	$ruta = $_SERVER['DOCUMENT_ROOT'] . '/go/img/' .  $country . '/' . $city . '/' . $villaName;
	
	//BorrarDirectorio("ruta");
	
	//desconectar();		
	//mysql_close();
	header("Location: propertylist.php")
?>