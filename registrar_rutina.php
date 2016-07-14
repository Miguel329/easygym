<?php
	include_once ('libreria.php');

	conectarBD();
	
	$consultar = consultar('rutina','idrutina > 0');
	
	$idrutina = $consultar -> num_rows;
	$idrutina = $idrutina + 1;
	
	$nombre = $_POST['nombre'];
	
	$valores = array($idrutina, $nombre,"");
	
	$campos = array('idrutina','Nombre','duracion');
	
	insertar('rutina',$valores,$campos);
	
	$url_relativa="../vista/lista_rutina.php";
		header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $url_relativa);
?>