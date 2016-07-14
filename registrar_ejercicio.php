<?php
	session_start();
	include_once ('libreria.php');

	conectarBD();
	
	$consultar = consultar('ejercicio','idEjercicios > 0');
	
	$idejercicio = $consultar -> num_rows;
	$idejercicio = $idejercicio + 1;
	
	$nombre = $_POST['nombre'];
	$idrutina = $_POST['idrutina'];
	$video = $_POST['video'];
	$permiso = $_POST['permiso'];
	
	list($url,$valor_video) = explode("=",$video);

	
	if($valor_video == "")
	{		
		$_SESSION['video'] = "Esta url NO es valida. Ingrese una url valida";
		$url_relativa="../vista/form_crear_ejercicio.php?idrutina=$idrutina";
		header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $url_relativa);
	}
	else
	{
		$_SESSION['video'] = "";
		$video = "https://www.youtube.com/embed/".$valor_video;
		
		$valores = array($idejercicio, $nombre,$idrutina,$video,$permiso);
	
		$campos = array('idEjercicios','nombreEjercicio','rutina_idrutina','video','Permisos');
		
		insertar('ejercicio',$valores,$campos);
		
		$url_relativa="../vista/listar_ejercicio.php?idrutina=$idrutina";
		header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $url_relativa);	
	}
	
	
?>