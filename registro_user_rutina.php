<?php
	session_start();
	include_once ('libreria.php');

	conectarBD();
	
	$nombre = $_POST['idrutina'];
	$documento = $_POST['documento'];
	
	$consultar = consultar("usuario_rutina","documento = ".$documento." AND idRutina = ".$nombre);
	
	
	
	if($consultar -> num_rows > 0)
	{
	
		$_SESSION['error'] = "Esta rutina ya esta registrada";
		$url_relativa="../vista/form_user_ejer.php";
		header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $url_relativa);
	}
	else
	{
	
	$_SESSION['error'] = "";
	
	$valores = array("NULL", $documento,$nombre);
	
	$campos = array('id','documento','idRutina');
	
	insertar('usuario_rutina',$valores,$campos);
	
	$url_relativa="../vista/user_ejer.php";
		header("Location: http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/" . $url_relativa);
	}
?>