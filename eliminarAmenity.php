<?php
session_start(); 
//error_reporting(0);
require_once('tools/mypathdb.php');
	$amenitieId = $_GET ['id'];
   //=========================eliminar registro de la tabla amenitie ============================================
   $query=mysql_query("DELETE from amenitie WHERE amenitieid='$amenitieId'");
   
   //desconectar();		
   mysql_close();
   header("Location: amenitieslist.php")
?>