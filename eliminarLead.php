<?php
session_start(); 
//error_reporting(0);
require_once('tools/mypathdb.php');
	$Id = $_GET ['id'];
	
	//=========================eliminar registro de la tabla tbl_lead ============================================
    $query=mysql_query("DELETE from tbl_lead WHERE Id='$Id'");
	//desconectar();		
	mysql_close();
	header("Location: leads.php")
?>